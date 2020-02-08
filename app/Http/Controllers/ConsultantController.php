<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    //

    public function auth()
    {
        return view('pages.consultant.logIn');
    }

    public function authenticate()
    {
        return redirect()->route('login');
    }
}
