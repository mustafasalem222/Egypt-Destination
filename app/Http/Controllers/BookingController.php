<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function pending(Package $package)
    {
        $package->booking()->create([
            'user_id' => Auth::user()->id,
            'amount_paid' => 0
        ]);
        return view('booking.booking', compact('package'));
    }

    public function book(Package $package)
    {
        if ($package->booking->where('payment_status', 'pending')->isNotEmpty()) {
            $package->booking()->where('payment_status', 'pending')->delete();
        }

        $package->booking()->create([
            'user_id' => Auth::user()->id,
            'amount_paid' => $package->price,
            'payment_status' => 'paid'
        ]);

        return redirect('/dashboard');
    }
}