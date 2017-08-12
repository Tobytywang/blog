<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    //
    public function login(){
      // View::addExtension('html', 'php');
      return view('login');
    }
}
