<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\ChqAccs;
use App\Models\InvAccs;
use App\Models\SavAccs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        User::create
            (['name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            ]);

            auth()->attempt($request->only('email', 'password'));

            SavAccs::create([
                'user_id' => auth()->id(),
                'balance' => 0.0,
            ]);
            InvAccs::create([
                'user_id' => auth()->id(),
                'balance' => 0.0,
            ]);
            ChqAccs::create([
                'user_id' => auth()->id(),
                'balance' => 0.0,
            ]);

            return redirect()->route("dashboard");

    }
}
