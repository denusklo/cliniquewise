<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = User::find(auth()->id());
        $adminRole = Role::where('name', 'patient')->first();
        
        
        if (!$user->roles->contains($adminRole)) {
            $user->roles()->attach($adminRole);
        }
        
        return view('home');
    }
}
