<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminWelcomeController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
}
