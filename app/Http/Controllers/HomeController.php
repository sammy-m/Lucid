<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\OrderInstructions;
use Redirect;

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
        if(Auth::User()->role == 1){
            return redirect()->to('/admin/dash');
        }elseif(Auth::User()->role == 2){
            return redirect()->to('/consultant/dashboard');
        }else if(Auth::User()->role == null){
            return redirect()->to('/manage/dashboard');
        }
        //return view('home');
    }
}
