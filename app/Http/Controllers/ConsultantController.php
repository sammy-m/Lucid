<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Keygen;
use App\User;
use App\Consultants;

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
        
        return redirect()->to('/consultant/dash');
    }
}
