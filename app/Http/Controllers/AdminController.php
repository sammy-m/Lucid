<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Order;
use App\OrderInstructions;

use Keygen;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function dashBoard()
    {
        $orders = OrderInstructions::all();
        if(sizeof($orders) != 0){
        foreach ($orders as $orderInstructions){
        $orderDetails = Order::whereRefid($orderInstructions->refId)->get();
        $clientOrders[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
        }
       //return $clientOrders;
       // return $clientOrders[1]['orderDetails'][0]->refId;
        
        return view('pages.admin.dashboard')->with('orders', $clientOrders);
        } else{
            $clientOrders = null;
            return view('pages.admin.dashboard')->with('orders', $clientOrders);
        }
    }
    public function ongoing()
    {
        $orders = Order::whereProgressstatus('in progress')->get();
        //die($orders);
        if(sizeof($orders) != 0){
        foreach ($orders as $orderDetails){
        $orderInstructions = OrderInstructions::whereRefid($orderDetails->refId)->get();
        $clientOrders[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
        }
       //return $clientOrders;
       // return $clientOrders[1]['orderDetails'][0]->refId;
        
        return view('pages.admin.orderlists')->with('orders', $clientOrders)->with('heading', 'Jobs In Progress');
        } else{
            $clientOrders = null;
            return view('pages.admin.orderlists')->with('orders', $clientOrders)->with('heading', 'Jobs In Progress');
        }
    }
    public function unallocated()
    {
        $orders = Order::whereProgressstatus('new')->get();
        //die($orders);
        if(sizeof($orders) != 0){
        foreach ($orders as $orderDetails){
        $orderInstructions = OrderInstructions::whereRefid($orderDetails->refId)->get();
        $clientOrders[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
        }
       //return $clientOrders;
       // return $clientOrders[1]['orderDetails'][0]->refId;
        
        return view('pages.admin.orderlists')->with('orders', $clientOrders)->with('heading', 'Unallocated Orders');
        } else{
            $clientOrders = null;
            return view('pages.admin.orderlists')->with('orders', $clientOrders)->with('heading', 'Unallocated Orders');
        }
    }
    public function completed()
    {
        $orders = Order::whereProgressstatus('completed')->get();
        //die($orders);
        if(sizeof($orders) != 0){
        foreach ($orders as $orderDetails){
        $orderInstructions = OrderInstructions::whereRefid($orderDetails->refId)->get();
        $clientOrders[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
        }
       //return $clientOrders;
       // return $clientOrders[1]['orderDetails'][0]->refId;
        
        return view('pages.admin.orderlists')->with('orders', $clientOrders)->with('heading', 'Completed Orders');
        } else{
            $clientOrders = null;
            return view('pages.admin.orderlists')->with('orders', $clientOrders)->with('heading', 'Completed Orders');
        }
    }
    public function analytics()
    {
        return view('pages.admin.analytics');
    }
}
