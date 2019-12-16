<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\OrderInstructions;
use Keygen;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientauthController extends Controller
{
    public function orderRegister()
    {
        return view('pages.orderRegister');
    }

    public function orderwRegistering(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed|string',
            'phone' => 'required|unique:users|min:10|max:13',
        ]);

        $sysId = $this->generateRandomId();
        while (User::whereSysid($sysId)->count() > 0) {
            $sysId = $this->generateRandomId();
        }

            $user = new User;
            $user->name  = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt( $request->password );
            $user->remember_token = $request->_token;
            $user->phone = $request->phone;
            $user->sysId = $sysId;
            $user->save(); 
           
      // $user = User::create(request(['name', 'email', Hash::make('password'),'phone']));
        
       auth()->login($user);
       //return ($request);
        
        return redirect()->to('/order/details');

       
    }

    public function orderLogin()
    {
        return view('pages.orderLogin');
    }

    public function startSession()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/order/details');
    }
    protected function generateRandomId(){
        // prefixes the key with a random integer between 1 - 9 (inclusive)
        return Keygen::numeric(7)->prefix(mt_rand(1, 9))->generate(true);
    }
}
