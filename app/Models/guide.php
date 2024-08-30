<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'age',
        'gender',
    ];

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'guide_trip');
    }
}
