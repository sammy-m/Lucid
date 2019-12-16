<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use URL;
use Session;

use App\Order;
use App\OrderInstructions;
use Carbon\Carbon;


class paymentController extends Controller
{
    //
    private $_api_context;
    public function __construct(){
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request){
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/
        //getting orderRefId from session
        $orderRefId = $request->session()->get('refId');
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($orderRefId);
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } 
        catch (\PayPal\Exception\PPConnectionException $ex){
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('/order/preview');
            } else {
                \Session::put('error', 'Some error occured, sorry for the inconvenience');
                return Redirect::to('/order/preview');
            }
        }
        foreach ($payment->getLinks() as $link){
            if ($link->getRel() == 'approval_url'){
                $redirect_url = $link->getHref();
                break;
            }
        }/** add payment ID to session **/
       // Session::put('paypal_payment_id', $payment->getId());   ///let me try stn bellow here
       $request->session()->put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)){
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
       
       // return $request->session()->all();
        /** Get the payment ID before session clear **/
        $payment_id = $request->session()->get('paypal_payment_id');
        /** clear the session payment ID **/
       // $request->session()->forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))){
            \Session::put('error', 'Payment failed');
            return Redirect::to('/order/preview');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        //return $request->session()->all();
        if ($result->getState() == 'approved'){
            \Session::put('success', 'Payment success');
           $this->persistOrder('success');
            return Redirect::to('/manage/dashboard');
        }
        \Session::put('error', 'Payment failed');
        $this->persistOrder('fail');
        return Redirect::to('/manage/dashboard');
    }

    protected function persistOrder($status){
        $order = new Order;
        $orderInstr = new OrderInstructions;
        $refId = \Session::get('refId');
       // return $result=[$status, $refId];
        $dateDeadline = Carbon::parse(\Session::get('orderInstructions.deadline'))->format('Y-m-d');
        $order->projectPurpose = \Session::get('order.purpose');
        $order->typeOfService = \Session::get('order.typeofservice');
        $order->writingLevel = \Session::get('order.levels');
        $order->projectType = \Session::get('order.typeofproject');
        $order->pageCount = \Session::get('order.pagecount');
        $order->lineSpacing = \Session::get('order.spacing');
        $order->spelling = \Session::get('order.spell');
        $order->writerPreference = \Session::get('order.writer');
        $order->progressStatus = 'new';
        
        switch($status){
             case 'success':
             $order->paymentStatus = 'paid';
             break;
             
             case 'fail':
             $order->paymentStatus = 'unpaid';
             break;
        }
        $order->refId = \Session::get('refId');
        $order->save();

        $orderInstr->refId = \Session::get('refId');
        $orderInstr->deadline = Carbon::parse(\Session::get('orderInstructions.deadline'))->format('Y-m-d');
        $orderInstr->deadlineHour = \Session::get('orderInstructions.deadlineHour');
        $orderInstr->subject = \Session::get('orderInstructions.subject');
        $orderInstr->title = \Session::get('orderInstructions.title');
        $orderInstr->citation = \Session::get('orderInstructions.citation');
        $orderInstr->sources = \Session::get('orderInstructions.sources');
        $orderInstr->paperSize = \Session::get('orderInstructions.paperSize');
        $orderInstr->projectSpecification = \Session::get('orderInstructions.projectSpecification');
        $orderInstr->client = \Auth::User()->sysId;
        $orderInstr->save();

        //delete values from session
        /** clear the session payment ID **/
       \Session::forget(['paypal_payment_id', 'refId', 'order', 'orderInstructions']);
     } 
}

   
