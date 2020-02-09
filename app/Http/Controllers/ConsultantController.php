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

    public function signupForm()
    {
        return view('pages.consultant.signup');
    }

    public function addConsultant(Request $request)     
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
            $user->role = 1;
            $user->save(); 

            $admin = new Admin;
            $admin->sysId = $id;
            
            $admin->email = $request->email;
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            $admin->status = 'pending approval'; 
            $admin->save();
           
      // $user = User::create(request(['name', 'email', Hash::make('password'),'phone']));
        
       auth()->login($user);
        //return "success";
        
        return redirect()->to('/admin/dash'); 

       
    }

    protected function generateRandomId(){
        // prefixes the key with a random integer between 1 - 9 (inclusive)
        return Keygen::numeric(7)->prefix(mt_rand(1, 9))->generate(true);
    }

    public function startSession()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/admin/dash');
    }
}
