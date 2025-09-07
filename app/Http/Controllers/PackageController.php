<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::with('destinations')->find(1);
        return view('packages.index', compact('package'));
    }

    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }


    public function favourite(Package $package)
    {
        $package->favourite();

        return response()->json([
            'status' => 'added'
        ]);
    }


    public function unfavourite(Package $package)
    {
        $package->unfavourite();

        return response()->json([
            'status' => 'removed'
        ]);
    }

}