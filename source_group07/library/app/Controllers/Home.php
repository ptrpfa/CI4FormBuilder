<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Base view
        return view('welcome_message');
    }
}
