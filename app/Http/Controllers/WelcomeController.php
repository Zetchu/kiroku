<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
//        dump('Message from WElcone controller');
        // Business logic goes here

        return view('welcome');
    }
}
