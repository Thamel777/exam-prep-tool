<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PastPaper;
use Illuminate\Support\Facades\Storage;

class PaperDownloadController extends Controller
{
    public function download(PastPaper $paper)
    {
        if (!$paper->is_published && !auth()->check()) abort(404);
        $disk = $paper->file_disk;
        $path = $paper->file_path;
        $name = trim(preg_replace('/\s+/','_', "{$paper->title}.pdf"));
        return Storage::disk($disk)->download($path, $name);
    }
}
