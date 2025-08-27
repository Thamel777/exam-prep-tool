<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PastPaper;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PaperController extends Controller
{
    public function index(Request $request)
    {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        $level = $request->get('level'); // optional filter
        $subjectId = $request->get('subject_id');

        $papers = PastPaper::with('subject')
            ->when($level, fn($q)=>$q->whereHas('subject', fn($qq)=>$qq->where('level',$level)))
            ->when($subjectId, fn($q,$sid)=>$q->where('subject_id',$sid))
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        $subjects = Subject::orderBy('level')->orderBy('name')->get();
        return view('admin.papers.index', compact('papers','subjects','level','subjectId'));
    }

    public function create()
    {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        $subjects = Subject::orderBy('level')->orderBy('name')->get();
        return view('admin.papers.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        $data = $request->validate([
            'subject_id' => ['required','exists:subjects,id'],
            'year'       => ['required','integer','min:1990','max:2100'],
            'session'    => ['required','in:Feb/Mar,May/Jun,Oct/Nov,OnDemand'],
            'type'       => ['required','in:QP,MS,ER,Specimen,Insert,Syllabus,Notes'],
            'paper_code' => ['nullable','string','max:20'],
            'variant'    => ['nullable','string','max:20'],
            'title'      => ['required','string','max:180'],
            'is_published' => ['nullable','boolean'],
            'file'       => ['required','file','mimes:pdf','max:40960'], // 40MB
        ]);

        $subject = Subject::findOrFail($data['subject_id']);

        $disk = 'public';
        $slugSubject = Str::slug($subject->name);
        $filename = Str::slug(($data['paper_code'] ?? $subject->name).'_'.$data['session'].'_'.$data['year'].'_'.$data['type'].($data['variant']?('_'.$data['variant']):'')) . '.pdf';
        $dir = "papers/{$subject->level}/{$slugSubject}/{$data['year']}";
        $path = $request->file('file')->storeAs($dir, $filename, $disk);

        $paper = PastPaper::create([
            ...$data,
            'file_disk'    => $disk,
            'file_path'    => $path,
            'file_size'    => Storage::disk($disk)->size($path),
            'checksum'     => hash_file('sha256', Storage::disk($disk)->path($path)),
            'uploaded_by'  => auth()->id(),
            'published_at' => ($data['is_published'] ?? false) ? now() : null,
            'is_published' => (bool)($data['is_published'] ?? false),
        ]);

        return redirect()->route('admin.papers.index')->with('notice','Paper uploaded.');
    }

    public function edit(PastPaper $paper)
    {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        $subjects = Subject::orderBy('level')->orderBy('name')->get();
        return view('admin.papers.edit', compact('paper','subjects'));
    }

    public function update(Request $request, PastPaper $paper)
    {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        $data = $request->validate([
            'subject_id' => ['required','exists:subjects,id'],
            'year'       => ['required','integer','min:1990','max:2100'],
            'session'    => ['required','in:Feb/Mar,May/Jun,Oct/Nov,OnDemand'],
            'type'       => ['required','in:QP,MS,ER,Specimen,Insert,Syllabus,Notes'],
            'paper_code' => ['nullable','string','max:20'],
            'variant'    => ['nullable','string','max:20'],
            'title'      => ['required','string','max:180'],
            'is_published' => ['nullable','boolean'],
            'file'       => ['nullable','file','mimes:pdf','max:40960'],
        ]);

        $paper->fill([
            ...$data,
            'is_published' => (bool)($data['is_published'] ?? false),
            'published_at' => ($data['is_published'] ?? false) ? ($paper->published_at ?? now()) : null,
        ]);

        if ($request->hasFile('file')) {
            $disk = $paper->file_disk;
            if (Storage::disk($disk)->exists($paper->file_path)) {
                Storage::disk($disk)->delete($paper->file_path);
            }
            $subject = Subject::findOrFail($data['subject_id']);
            $slugSubject = Str::slug($subject->name);
            $filename = Str::slug(($data['paper_code'] ?? $subject->name).'_'.$data['session'].'_'.$data['year'].'_'.$data['type'].($data['variant']?('_'.$data['variant']):'')) . '.pdf';
            $dir = "papers/{$subject->level}/{$slugSubject}/{$data['year']}";
            $path = $request->file('file')->storeAs($dir, $filename, $paper->file_disk);

            $paper->file_path = $path;
            $paper->file_size = Storage::disk($paper->file_disk)->size($path);
            $paper->checksum  = hash_file('sha256', Storage::disk($paper->file_disk)->path($path));
        }

        $paper->save();

        return redirect()->route('admin.papers.index')->with('notice','Paper updated.');
    }

    public function destroy(PastPaper $paper)
    {
        if (! auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        $disk = $paper->file_disk;
        $path = $paper->file_path;
        $paper->delete();
        Storage::disk($disk)->delete($path);
        return back()->with('notice','Paper deleted.');
    }
}
