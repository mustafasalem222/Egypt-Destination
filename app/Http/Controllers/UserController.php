<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $bookings = Booking::with('package')->where('user_id', $user->id)->get();

        return view('dashboard', compact(['user', 'bookings']));
    }
}