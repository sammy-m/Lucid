<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Keygen;
use App\User;
use App\Consultants;
use App\Order;
use App\OrderInstructions;

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

    public function signupForm()
    {
        return view('pages.consultant.signup');
    }

    public function register(Request $request)     
    {
        $this->validate(request(), [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed|string',
            'phone' => 'required|unique:users|min:10|max:13',
        ]);

        $id = $this->generateRandomId();

        // Ensure ID does not exist
        // Generate new one if ID already exists
        while (User::whereSysid($id)->count() > 0) {
            $id = $this->generateRandomId();
        }
            $user = new User;
            $user->sysId = $id;
            $user->name  = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt( $request->password );
            $user->remember_token = $request->_token;
            $user->phone = $request->phone;
            $user->role = 2;
            $user->save(); 

            $consultant = new Consultants;
            $consultant->sysId = $id;
            
            $consultant->email = $request->email;
            $consultant->name = $request->name;
            $consultant->phone = $request->phone;
            $consultant->status = 'pending approval'; 
            $consultant->save();
           
      // $user = User::create(request(['name', 'email', Hash::make('password'),'phone']));
        
       auth()->login($user);
        //return "success";
        
        return redirect()->to('/consultant/dash'); 

       
    }

    protected function generateRandomId(){
        // prefixes the key with a random integer between 1 - 9 (inclusive)
        return Keygen::numeric(7)->prefix(mt_rand(1, 9))->generate(true);
    }

    public function logInCons()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/consultant/dashboard');
    }

    public function home()
    {  // die("wtf");
        if(Auth::check()){
            //die("authed");
            $workingOn = Order::where('progressStatus', 'in progress')->where('writerAssigned', Auth::User()->sysId)->get();
             //die(sizeOf($workingOn));
            if(sizeof($workingOn) > 0){
                die("yeeesss");
                    $currentTasks[] = array('details'=>$workingOn,'instructions'=>OrderInstructions::where('refId', $workingOn->refId)->get());
                
              } else{
                  $currentTasks = null;
              }

              $availableTasks = Order::where('progressStatus','new')->where('paymentStatus', 'paid')->firstOrFail();
              // return sizeof($availableTasks);
              if($availableTasks){
                 // die($availableTasks);
              
                  $tasks[] = array('details'=>$availableTasks,'instructions'=>OrderInstructions::where('refId', $availableTasks->refId)->firstOrFail());
            
            } else{
                $tasks = null;
            }
          //return $currentTasks[0]['details'];
        return view('pages.consultant.home')->with('tasks', $tasks)->with('ongoing', $currentTasks);
         } //else{
        //     die('auth error');
        // }
        return \Redirect::to('/consultant/auth');
    }

    public function work()
    {
       $availableTasks = Order::where('progressStatus','new')->where('paymentStatus', 'paid')->get();
      // return sizeof($availableTasks);
      if(sizeof($availableTasks) > 0){
      foreach($availableTasks as $available){
          $tasks[] = array('details'=>$available,'instructions'=>OrderInstructions::where('refId', $available->refId)->get());
      } 
    } else{
        $tasks = null;
    }
    $ongoingTasks = Order::where('progressStatus', 'in progress')->where('writerAssigned', Auth::User()->sysId)->take(5)->get();
    
    if(sizeof($ongoingTasks) > 0){
        foreach($ongoingTasks as $ongoing){
            $currentTasks[] = array('details'=>$ongoing,'instructions'=>OrderInstructions::where('refId', $ongoing->refId)->get());
        } 
      } else{
          $currentTasks = null;
      }

      $completedTasks = Order::where('progressStatus', 'completed')->where('writerAssigned', Auth::User()->sysId)->take(5)->get();

      if(sizeof($completedTasks) > 0){
          foreach($completedTasks as $complete){
              $endedTasks[] = array('details'=>$complete,'instructions'=>OrderInstructions::where('refId', $complete->refId)->get());
          } 
        } else{
            $endedTasks = null;
        }
   // return $currentTasks;
        return view('pages.consultant.work')->with('tasks', $tasks)->with('ongoing', $currentTasks)->with('complete', $endedTasks);
    }
    public function history()
    {
        $availableTasks = Order::where('progressStatus','new')->where('paymentStatus', 'paid')->get();
      // return sizeof($availableTasks);
      if(sizeof($availableTasks) > 0){
      foreach($availableTasks as $available){
          $tasks[] = array('details'=>$available,'instructions'=>OrderInstructions::where('refId', $available->refId)->take(5)->get());
      } 
    } else{
        $tasks = null;
    }
    $ongoingTasks = Order::where('progressStatus', 'in progress')->where('writerAssigned', Auth::User()->sysId)->take(5)->get();
    
    if(sizeof($ongoingTasks) > 0){
        foreach($ongoingTasks as $ongoing){
            $currentTasks[] = array('details'=>$ongoing,'instructions'=>OrderInstructions::where('refId', $ongoing->refId)->get());
        } 
      } else{
          $currentTasks = null;
      }

      $completedTasks = Order::where('progressStatus', 'completed')->where('writerAssigned', Auth::User()->sysId)->get();

      if(sizeof($completedTasks) > 0){
          foreach($completedTasks as $complete){
              $endedTasks[] = array('details'=>$complete,'instructions'=>OrderInstructions::where('refId', $complete->refId)->get());
          } 
        } else{
            $endedTasks = null;
        }
   // return $currentTasks;
        return view('pages.consultant.history')->with('tasks', $tasks)->with('ongoing', $currentTasks)->with('complete', $endedTasks);
    }
    public function inProgress()
    {
        $availableTasks = Order::where('progressStatus','new')->where('paymentStatus', 'paid')->get();
      // return sizeof($availableTasks);
      if(sizeof($availableTasks) > 0){
      foreach($availableTasks as $available){
          $tasks[] = array('details'=>$available,'instructions'=>OrderInstructions::where('refId', $available->refId)->take(5)->get());
      } 
    } else{
        $tasks = null;
    }
    $ongoingTasks = Order::where('progressStatus', 'in progress')->where('writerAssigned', Auth::User()->sysId)->get();
    
    if(sizeof($ongoingTasks) > 0){
        foreach($ongoingTasks as $ongoing){
            $currentTasks[] = array('details'=>$ongoing,'instructions'=>OrderInstructions::where('refId', $ongoing->refId)->get());
        } 
      } else{
          $currentTasks = null;
      }

      $completedTasks = Order::where('progressStatus', 'completed')->where('writerAssigned', Auth::User()->sysId)->take(5)->get();

      if(sizeof($completedTasks) > 0){
          foreach($completedTasks as $complete){
              $endedTasks[] = array('details'=>$complete,'instructions'=>OrderInstructions::where('refId', $complete->refId)->get());
          } 
        } else{
            $endedTasks = null;
        }
   // return $currentTasks;
        return view('pages.consultant.workInProgress')->with('tasks', $tasks)->with('ongoing', $currentTasks)->with('complete', $endedTasks);
        //return view('pages.consultant.workInProgress');
    }
    public function workOnTask($id)
    {
       $details = Order::whereRefid($id)->first();
       $instructions = OrderInstructions::whereRefid($id)->first();
       $task = array(['details'=>$details, 'instructions'=>$instructions]);
       return view('pages.consultant.workingOnTask')->with('task', $task);
    }
    public function reports()
    {
        $availableTasks =   Order::where('progressStatus','new')->where('paymentStatus', 'paid')->count();
        $myJobs = Order::where('progressStatus', 'in progress')->where('writerAssigned', Auth::User()->sysId)->count();
        $jobsCompleted = Order::where('progressStatus', 'completed')->where('writerAssigned', Auth::User()->sysId)->count();
        return view("pages.consultant.reports")->with('available', $availableTasks)->with('ongoing', $myJobs)->with('completed', $jobsCompleted);
    }
}
