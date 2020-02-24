<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\OrderInstructions;
use Redirect;


class OrdersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showOrder($id)
    {
       // return $id;
        $orderInstructions = OrderInstructions::whereRefid($id)->firstorfail();

        
        $orderDetails = Order::whereRefid($orderInstructions->refId)->firstorfail();
       
        if($orderDetails == null){
            //return 'hello';
           return \Redirect::to('/manage/dashboard')->withErrors('order does not exist');
        }
        $clientOrder[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
      // return $clientOrder;

        return view('pages.clientOrderInstance')->with('thisOrder', $clientOrder);
    }

    
    public function adminShowOrder($id)
    {
       // return $id;
        $orderInstructions = OrderInstructions::whereRefid($id)->firstorfail();

        
        $orderDetails = Order::whereRefid($orderInstructions->refId)->firstorfail();
       
        if($orderDetails == null){
            //return 'hello';
           return \Redirect::to('/manage/dashboard')->withErrors('order does not exist');
        }
        $clientOrder[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
      // return $clientOrder;

        return view('pages.admin.adminOrderInstance')->with('thisOrder', $clientOrder);
    }

    public function assignTask(Request $request)
    {
        $this->validate($request, [
            'writer'=>'required',
            'refId'=>'required'
        ]);
        $refId = $request->refId;
        $orderDetails = Order::whereRefid($refId)->first();
        $orderDetails->writerAssigned = $request->writer;
        $orderDetails->adminAssigned = Auth::User()->sysId;
        $orderDetails->progressStatus = 'assigned';
        $orderDetails->save();

        return \Redirect::to('/admin/view-order/'. $refId);
    }

    public function consultantView($id)
    {
       $details = Order::whereRefid($id)->first();
       $instructions = OrderInstructions::whereRefid($id)->first();
       $task = array(['details'=>$details, 'instructions'=>$instructions]);

       //return $task;

        return view('pages.consultant.viewtask')->with('task', $task);

    }
    public function adoptOrder($id)
    {
        $order = Order::whereRefid($id)->first();
        $instructions = OrderInstructions::whereRefid($id)->first();
        $task = array(['details'=>$order, 'instructions'=>$instructions]);

        $order->progressStatus = 'in progress';
        $order->writerAssigned = Auth::User()->sysId;
        $order->save();

        return redirect()->action('ConsultantController@workOnTask',[$id]);

    }

    
}
