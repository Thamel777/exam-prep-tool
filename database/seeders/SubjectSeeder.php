<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seed = [
        // O/L
        ['level'=>'OL','name'=>'Accounting','hero'=>'subjects/acc-course.jpg'],
        ['level'=>'OL','name'=>'Biology','hero'=>'subjects/bio-course.jpg'],
        ['level'=>'OL','name'=>'Business Studies','hero'=>'subjects/bs-course.jpg'],
        ['level'=>'OL','name'=>'Mathematics','hero'=>'subjects/c8d4bfee165592ade90e026b24d25864.jpg'],
        ['level'=>'OL','name'=>'Computer Science','hero'=>'subjects/ict-course.jpg'],
        ['level'=>'OL','name'=>'English','hero'=>'subjects/eng-course.jpg'],

        // A/L
        ['level'=>'AL','name'=>'Accounting','hero'=>'subjects/acc-course.jpg'],
        ['level'=>'AL','name'=>'Biology','hero'=>'subjects/bio-course.jpg'],
        ['level'=>'AL','name'=>'Business Studies','hero'=>'subjects/bs-course.jpg'],
        ['level'=>'AL','name'=>'Mathematics','hero'=>'subjects/c8d4bfee165592ade90e026b24d25864.jpg'],
        ['level'=>'AL','name'=>'Computer Science','hero'=>'subjects/ict-course.jpg'],
        ['level'=>'AL','name'=>'English','hero'=>'subjects/eng-course.jpg'],
    ];

    foreach ($seed as $row) {
        $slug = Str::slug($row['name'].'-'.$row['level']);
        Subject::updateOrCreate(
            ['slug'=>$slug],
            [
                'level'       => $row['level'],
                'name'        => $row['name'],
                'slug'        => $slug,
                'hero_image'  => $row['hero'],   // store relative path
                'description' => null,
            ]
        );
    }
    }
}
