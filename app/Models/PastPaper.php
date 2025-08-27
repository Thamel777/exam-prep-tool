<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    protected $fillable = [
        'subject_id','year','session','type','paper_code','variant','title',
        'file_disk','file_path','file_size','checksum','is_published','uploaded_by','published_at'
    ];
    protected $casts = ['is_published'=>'bool','published_at'=>'datetime'];
    public function subject(){ return $this->belongsTo(\App\Models\Subject::class); }
    public function uploader() { return $this->belongsTo(User::class,'uploaded_by'); }
}
