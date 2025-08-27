<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['level','name','slug','hero_image','description'];

    public function papers() { return $this->hasMany(PastPaper::class); }

    // ← this is required
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
