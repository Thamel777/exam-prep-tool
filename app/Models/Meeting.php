<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public const PENDING   = 'pending';
    public const APPROVED  = 'approved';
    public const REJECTED  = 'rejected';
    public const CANCELLED = 'cancelled';

    protected $fillable = [
        'user_id','lecturer_id','title','description',
        'scheduled_at','duration_minutes','status',
        'approved_by','approved_at','rejection_reason',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'approved_at'  => 'datetime',
    ];

    public function user()     { return $this->belongsTo(\App\Models\User::class); }
    public function lecturer() { return $this->belongsTo(\App\Models\Lecturer::class); }
    public function approver() { return $this->belongsTo(\App\Models\User::class,'approved_by'); }
}
