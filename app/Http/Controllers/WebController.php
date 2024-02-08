<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class WebController extends Controller
{
public function index()
{
    $users = User::orderBy('created_at', 'desc')->get();
    $incomeData = 4500; // Pass it as an integer or float without quotes

    // Pass the incomeData variable to the Blade template
    view()->share('income', $incomeData);

    return view('index', ['users' => $users]);
}



public function signIn()
{
    return view('auth.sign-in');
}
}