<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::simplePaginate(4);

        return view('destinations.index', compact('destinations'));
    }


    public function favourite(Destination $destination)
    {
        $destination->favourite();
    }


    public function unfavourite(Destination $destination)
    {
        $destination->unfavourite();
    }

}