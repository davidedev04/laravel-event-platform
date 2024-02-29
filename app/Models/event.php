<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
