<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use App\OrderInstructions;

class ClientsController extends Controller
{
    //
    public function dashboard()
    {
        $name = Auth::User()->name;
        $id = Auth::User()->sysId;
       // return $id;
        //$clientOrders;
        $orders = OrderInstructions::whereClient($id)->get();

        if(sizeof($orders) != 0){
           
            foreach ($orders as $orderInstructions){
                $orderDetails = Order::whereRefid($orderInstructions->refId)->get();
                $clientOrders[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
                }
                return view('pages.clientDashboard')->with('name', $name)->with('orders', $clientOrders);
        } else{
           
            $clientOrders = null;
            /*if($clientOrders == null){
                return 'they are null';
            }
            else{
                return 'they are not null';
            }*/
           
          return view('pages.clientDashboard')->with('name', $name)->with('orders', $clientOrders);
        }
        

       // return $clientOrders;
       // return $clientOrders[1]['orderDetails'][0]->refId;
       
    }

    public function history()
    {
        $name = Auth::User()->name;
        $id = Auth::User()->sysId;
       // return $id;
        //$clientOrders;
        $orders = OrderInstructions::whereClient($id)->get();

        if(sizeof($orders) != 0){

        foreach ($orders as $orderInstructions){
        $orderDetails = Order::whereRefid($orderInstructions->refId)->get();
        $clientOrders[] = array('orderDetails'=> $orderDetails, 'orderInstructions'=> $orderInstructions);
        }
        return view('pages.clientOrderHistory')->with('name', $name)->with('orders', $clientOrders);
        }else{
           
            $clientOrders = null;
            return view('pages.clientOrderHistory')->with('name', $name)->with('orders', $clientOrders);
        }
    }
}
