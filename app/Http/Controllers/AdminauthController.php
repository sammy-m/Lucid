<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admin;
use Keygen;

class AdminauthController extends Controller
{
    public function register()
    {
        return view('pages.admin.register');
    }

    public function adminRegistering(Request $request)
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

    public function adminStore()    
    {
       // $admin = new Admin;
        // $newAdmin = Auth::User();
        /*$admin->name = $newAdmin->name;
        $admin->email = $newAdmin->email;
        $admin->phone = $newAdmin->phone;
        $admin->userId = $newAdmin->id;
        $admin->status = 'pending approval';
        $admin->save();*/
       // return $newAdmin;

        return "saved";

        return redirect()->to('/admin/dash');
    }

    public function loginForm()
    {
        return view('pages.admin.login');
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
