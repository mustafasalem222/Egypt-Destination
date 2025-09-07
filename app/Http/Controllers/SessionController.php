<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
        ;
    }
    public function store(StoreSessionRequest $request)
    {
        $request->authenticate();

        return redirect('/');
    }
    //

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}