<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show register form
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory 
     */
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('home');
    }
}
