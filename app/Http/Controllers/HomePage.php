<?php

namespace App\Http\Controllers;

class HomePage extends Controller
{
    /**
     * Shows the logged in user's home page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function __invoke()
    {
        return view('home');
    }
}
