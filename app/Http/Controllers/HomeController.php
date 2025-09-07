<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $destinations = Destination::latest()->take(4)->get();
        $packages = Package::take(3)->get();
        return view('home', compact(['destinations', 'packages']));
    }
}