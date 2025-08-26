<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Rimas Essa',
                'slug' => 'rimas-essa',
                'title' => 'ACCA Affiliate',
                'subject' => 'Accounting',
                'photo_path' => 'lecturers/689e5b2971577d707becb97405ede951.jpg',
                'bio' => 'Lecturer/Director. (Short bio here; you can paste the full text later.)',
            ],
            [
                'name' => 'Sahla Mansoor',
                'slug' => 'sahla-mansoor',
                'title' => 'ACCA',
                'subject' => 'Mathematics',
                'photo_path' => 'lecturers/4489ba241c9d7e0c1da1978d2e7f9d55.jpg',
                'bio' => 'World prize winner for Mathematics (Edexcel).',
            ],
            [
                'name' => 'Shakeel Laleel',
                'slug' => 'shakeel-laleel',
                'title' => 'Bachelor of Medicine and Surgery',
                'subject' => 'Biology',
                'photo_path' => 'lecturers/1efa6eb23b8179f35f1920fcf47ca2b9.jpg',
                'bio' => 'Biology lecturer.',
            ],
            [
                'name' => 'Michelle Thomasz',
                'slug' => 'michelle-thomasz',
                'title' => 'BA in Education (USA), Graduate English Teacher',
                'subject' => 'English',
                'photo_path' => 'lecturers/2345f10bb948c5665ef91f6773b3e455.jpg',
                'bio' => 'English Language Lecturer.',
            ],
            [
                'name' => 'Sameer Anis',
                'slug' => 'sameer-anis',
                'title' => 'PGD in Business Administration (UoW)',
                'subject' => 'Business Studies',
                'photo_path' => 'lecturers/d524813536b71639999ba12bdb3621a8.jpg',
                'bio' => 'Lecturer/Director.',
            ],
            [
                'name' => 'Sandamali Ekanayake',
                'slug' => 'sandamali-ekanayake',
                'title' => 'BSc(Hons) in Computing and Information Systems',
                'subject' => 'Computer Science',
                'photo_path' => 'lecturers/bf9b9eff4d46d7eb96b60cb09c0cc7e3.jpg',
                'bio' => 'Computer Science Lecturer.',
            ],
        ];

        foreach ($data as $row) {
            Lecturer::updateOrCreate(['name' => $row['name']], $row);
        }
    }
}
