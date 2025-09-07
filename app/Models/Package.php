<?php

namespace App\Models;

use App\Favouritable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory, Favouritable;


    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
}