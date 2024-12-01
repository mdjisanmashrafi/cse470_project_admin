<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Your admin dashboard view
    }
}

