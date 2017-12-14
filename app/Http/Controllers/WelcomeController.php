<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
	#Displays home page
    public function index()
    {
    	return view('welcome');
    }   
} #EoC
