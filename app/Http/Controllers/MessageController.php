<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Order;
use App\OrderInstructions;

class MessageController extends Controller
{
    //
    public function fetch($id)
    {
        $order_details = Order::whereRefid($id)->first();
        $order_instructions = OrderInstructions::whereRefid($id)->first();
        $messages = Message::where('orderId', $id)->get();
        $strMsg;
        $userId = \Auth::User()->sysId;
        $userName = \Auth::User()->name;

       $messages;
      // return (User::where('sysId', 94223043)->get())[0]->name;

        foreach ( $messages as $msg) {
            $strMsg[] = array('message'=> $msg->message, 'user'=> (User::where('sysId', $msg->userId)->get())[0]->name, 'userId'=> $msg->userId, 'orderId' => $msg->orderId);
        }

        //$order = array($order_details, $order_instructions, $messages);

       

        return array($strMsg, $userId, $userName);

    }

    public function store(Request $request)
    {
       // return $request;
       $message = new Message;
       $message->userId = $request->userId;
       $message->message = $request->message;
       $message->orderId = $request->orderId;
       $message->save();
       return ['status'=>'ok'];
    }
}
