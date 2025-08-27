<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'name', 'title', 'subject', 'photo_path', 'bio',
    ];
}
