<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Order;
use App\OrderInstructions;
use App\Events\MessageSent;

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

    public function stores(Request $request)
    {
       // return $request->userId;
        $user = $this->getUser($request->userId);
       // return '$request';
            // $message = new Message;
            // $message->userId = $request->userId;
            // $message->message = $request->message;
            // $message->orderId = $request->orderId;
     // $newMessage = $message->save();
     $message1 = array('message'=> $request->message, 'userId'=>$request->userId , 'orderId'=>$request->orderId);
     $message2 = Message::create([
        'userId' => $request->userId,
        'message' => $request->message,
        'orderId' => $request->orderId,
     ]);

     $message3 = Message::create([
        'userId' => 12345,
        'message' => 'i do not know',
        'orderId' => 12344,
     ]);

      //return $message2;

     
      
        broadcast(new MessageSent($user, $message2))->toOthers();
   

      return [$message1, $message3,'it is well'];
       return ['status'=>'ok'];
    }

    public function getUser($refId)
    {
        //return "hahaha";
        return User::whereSysid($refId)->first();
    }

    public function test()
    {
        //$user = $this->getUser(77879909);
        $user = User::whereSysid(77879909)->get();
        $user2 = \Auth::User();
        
        $message3 = Message::create([
            'userId' => 77879909,
            'message' => 'i do not know',
            'orderId' => 12344,
         ]);
    
          //return $message2;
          broadcast(new MessageSent($user, $message3))->toOthers();
         
        
    
          return [$message3,'it is well'];
           return ['status'=>'ok'];
       // event(new MessageSent('hello world', \Auth::User()));
    }
}
