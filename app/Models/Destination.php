<?php

namespace App\Models;

use App\Favouritable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    /** @use HasFactory<\Database\Factories\DestinationFactory> */
    use HasFactory, Favouritable;


    public function packages()
    {
        return $this->belongsToMany(Package::class);
    }



}