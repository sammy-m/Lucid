<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Portfolio;
use App\User;

class PortfolioController extends Controller
{
    public function designPortfolio()
    {
        return view('pages.designPortfolio');
    }

    public function savePortfolio(Request $request)
    {
        //echo $request;
        $this->validate($request,[
            'name'=> 'required',
            'occupation'=> 'required',

        ]);
        $data =  json_encode(['theme'=>$request->theme, 'portrait'=>$request->landscapePic, 'name' => $request->name, 
        'profession' => $request->occupation, 'bio' => $request->bio, 'skills'=>'', 'previousWork'=>'',
        'currentWork'=>'','email'=>$request->email, 'phone'=>$request->phone, 'linkedin'=>$request->linkedin, 'facebook'=>$request->facebook,
        'twitter'=>$request->twitter, 'instragram'=>$request->instagram]);

        $portfolio = new Portfolio();
        $portfolio->client = Auth::User()->sysId;
        $portfolio->paymentId = 'none';
        $portfolio->subscriptionType = 'none';
        $portfolio->activeTill = $yesterday;

        $thisUser = Auth::User()->sysId; //the sysId of the client

        Storage::put('users/'.$thisUser.'/portconf.txt', $data);

        echo $data;

    }
}
