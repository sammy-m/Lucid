<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Portfolio;
use App\User;
use Carbon\Carbon;

class PortfolioController extends Controller
{
    public function designPortfolio()
    {
        return view('pages.designPortfolio');
    }

    public function savePortfolio(Request $request)
    {
       // die($request) ;
        $this->validate($request,[
            'name'=> 'required',
            'occupation'=> 'required',

        ]);
        $i = $j = $k = 1;
        $skillsArray = $projArray = $cprojArray = [];
        while($i <= 20){
            if($request->{'quality'.$i} != null && $request->{'qualitydescription'.$i} != null ){
            $skillsArray[$i] = ['title' => $request->{'quality'.$i}, 'description'=> $request->{'qualitydescription'.$i}];
            ++$i;
            } else{
            break;
            }
        }

        while($j <= 20){
            if($request->{'project'.$j} != null && $request->{'projectdescription'.$j} != null ){
            $projArray[$j] = ['title' => $request->{'project'.$j}, 'description'=> $request->{'projectdescription'.$j}];
            ++$j;
            } else{
            break;
            }
        }

        while($k <= 20){
            if($request->{'cproject'.$k} != null && $request->{'cprojectdescription'.$k} != null ){
            $cprojArray[$k] = ['title' => $request->{'cproject'.$k}, 'description'=> $request->{'cprojectdescription'.$k}];
            ++$k;
            } else{
            break;
            }
        }

        $skills = json_encode($skillsArray);
        $projects = json_encode($projArray);
        $cprojects = json_encode($cprojArray);
       // die($projects);
        $data =  json_encode(['theme'=>$request->theme, 'portrait'=>$request->landscapePic, 'name' => $request->name, 
        'profession' => $request->occupation, 'bio' => $request->bio, 'skills'=>$skills, 'previousWork'=>$projects,
        'currentWork'=>$cprojects,'email'=>$request->email, 'phone'=>$request->phone, 'linkedin'=>$request->linkedin, 'facebook'=>$request->facebook,
        'twitter'=>$request->twitter, 'instagram'=>$request->instagram]);

        $yesterday = Carbon::yesterday();
        $myPortfolio = Portfolio::where('client', Auth::User()->sysId)->first();
        
        if($myPortfolio != null){
            $myPortfolio->paymentId = 'none';
            $myPortfolio->subscriptionType = 'none';
            $myPortfolio->activeTill = $yesterday;
            $myPortfolio->save();

        } else{
            $portfolio = new Portfolio();
            $portfolio->client = Auth::User()->sysId;
            $portfolio->paymentId = 'none';
            $portfolio->subscriptionType = 'none';
            $portfolio->activeTill = $yesterday;
            $portfolio->save();  
        }

        $thisUser = Auth::User()->sysId; //the sysId of the client

        Storage::put('users/'.$thisUser.'/portconf.txt', $data);

       //return json_decode($data)->skills;
       return redirect("/portfolio/preview/");

    }
    public function previewPortfolio(Request $request){
        $thisUser = Auth::User()->sysId;
       $dataFile  = Storage::get('users/'.$thisUser.'/portconf.txt');
       $json = $dataFile; //json_decode($dataFile);
     // print_r($json);
      
      //return $json->theme;
      return view('pages.previewPortfolio')->with($thisUser);
    }

    public function editPortfolio(Request $request, $sysID)
    {
        // $thisUser = Auth::User()->sysId;
        $dataFile  = Storage::get('users/'.$sysID.'/portconf.txt');
        
        $json = json_decode($dataFile);
       // $json = $dataFile;
       // die($json->theme);
        
            return view('pages.editPortfolio')->with('data', $json);
        
     
    }

    public function showPortfolio(Request $request, $urlSys)
    {
       
       // $thisUser = Auth::User()->sysId;
        $dataFile  = Storage::get('users/'.$urlSys.'/portconf.txt');
        
        $json = json_decode($dataFile);
       // $json = $dataFile;
       // die($json->theme);
        if ($json->theme == "dark") {
            return view('pages.portfolioThemes.dark')->with('data',$dataFile);
        } elseif ($json->theme == "light") {
            return view('pages.portfolioThemes.dark')->with('data', $json);
        }elseif ($json->theme == "vibrant") {
            return view('pages.portfolioThemes.dark')->with('data', $json);
        }
      // print_r($json);
       
       //return $json->theme;
       return view('pages.showPortfolio')->with('data', $json);  
    }
}
