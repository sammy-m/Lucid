<?php
 
namespace App\Http\Controllers; //

use Illuminate\Http\Request; //
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\OrderInstructions;
use Keygen;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;


class PagesController extends Controller //
{
   // use RegistersUsers;

    public function __construct()
   {
       $this->middleware('auth');
   }
    //
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

    public function orderDetails(Request $request)
    {
        $order = $request->session()->get('order');
        return view('pages.orderDetails')->with('order',$order);
    }

    public function postOrderDetails(Request $request)
    {
       
      $validatedData = $request->validate([
            'purpose' => 'required',
            'typeofservice' => 'required',
            'levels' => 'required',
            'typeofproject' => 'required',
            'pagecount' => 'required|numeric',
            'spacing' => 'required',
            'spell' => 'required',
            'writer' => 'required',
        ]);

      /*  $rules = [
            'purpose' => 'required',
            'typeofservice' => 'required',
            'levels' => 'required',
            'typeofproject' => 'required',
            'pagecount' => 'required|numeric',
            'spacing' => 'required',
            'spell' => 'required',
            'writer' => 'required',
        ];

        $this->validate($request, $rules);*/
        
        if(empty($request->session()->get('order'))){
            $order = new Order();
            $order->fill($validatedData);
           // return $order; //test
            $request->session()->put('order', $order);
           // return 'success1';
        }else{
            $order = $request->session()->get('order');
            $order->fill($validatedData);
           // return $order; //test
            $request->session()->put('order', $order);
            //return 'success2';
        }
     
       return redirect('/order/instructions'); 
    }

    public function orderInstructions(Request $request)
    {
        $order = $request->session()->get('order');
        if($order == null){
            return redirect()->to('/order/details');
        }
        //return $order; //test
       // return session()->all();
        return view('pages.orderInstructions')->with('order', $order);
    }

    public function postOrderInstructions(Request $request)
    {
       
        /*$validatedData = $request->validate([
            'deadline' => 'required',
            'deadlineHour' => 'required',
            'subject'=>'required',
            'citation'=>'required',
            'sources'=>'required|numeric',
            'paperSize'=>'required',
            'projectSpecification'=>'required',
        ]);*/

        //return $validatedData;
     // return $request;

      // $order = $request->session()->get('order');
      

      //  if(!isset($order->deadline) || !isset($order->deadlineHour) || !isset($order->subject) || !isset($order->citation) || !isset($order->projectSpecifications)){

            $validatedData = $request->validate([
                'deadline' => 'required',
                'deadlineHour' => 'required',
                'subject'=>'required',
                'citation'=>'required',
                'sources'=>'required|numeric',
                'paperSize'=>'required',
                'title'=>'nullable',
                'projectSpecification'=>'required',
            ]); 
           // return $validatedData;
            if($request->title == null){
                $validatedData['title'] = "writer's choice";
               
            }
          //  return $validatedData; //test

         /*   $order->deadline = $validatedData->deadline;
            $order->deadlineHour = $validatedData->deadlineHour;
            $order->subject = $validatedData->subject;
            $order->citation = $validatedData->citation;
            $order->sources = $validatedData->sources;
            $order->paperSize = $validatedData->paperSize;
            $order->projectSpecification =$validatedData->projectSpecification;
            $order->title = $request->title; */
           
            $request->session()->put('orderInstructions', $validatedData);
        //}

       // return $request; 

   /*     if(empty($request->session()->get('order'))){
            $order = new orderInstructions();
            $order->fill($validatedData);
            $request->session()->put('order', $order);
           // return 'success1';
        }else{
            $order = $request->session()->get('order');
            $order->fill($validatedData);
            $request->session()->put('order', $order);
            //return 'success2';
        } */
       

        //generating a unique refId for orders
        $refId = $this->generateRandomId();

        // Ensure ID does not exist
        // Generate new one if ID already exists
        while (Order::whereRefid($refId)->count() > 0) {
            $refId = $this->generateRandomId();
        }

        $request->session()->put('refId', $refId);


       return redirect('/order/preview'); 

    }

    protected function generateRandomId(){
        // prefixes the key with a random integer between 1 - 9 (inclusive)
        return Keygen::numeric(7)->prefix(mt_rand(1, 9))->generate(true);
    }

    public function previewOrder(Request  $request)
    {
       // return $request->session()->all();
       $SessionOrder = $request->session()->get('order');
       $SessionInst = $request->session()->get('orderInstructions');
       $refId = $request->session()->get('refId');
        //return $allData;

        if($SessionOrder == null){
            return redirect()->to('/order/details');
        } elseif($SessionInst == null){
            return redirect('/order/instructions');
        } 

       $spacing = $SessionOrder->spacing;
       $totalPages = $SessionOrder->pagecount;
       $ppp;
       

       if($spacing == 'double'){
            $ppp = 19;

       } else{
           $ppp = 39;
       }
       $totalPrice = $ppp * $totalPages;

        //$order = $request->session()->get('order');
        return view('pages.orderPreview')->with('orderData', $SessionOrder)->with('instructionData', $SessionInst)->with('ppp', $ppp)->with('totalPrice',$totalPrice)->with('refId', $refId); //->with('order', $order);
      // return $order;
    }
    
}
