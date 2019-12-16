@extends('layouts.clientside')

@section('content')

<link rel="stylesheet" href={{url('css/orderPreview.css')}}>

<div class="review row"> <!--display flex for the float right-->
    <div class="this-order col-md-8">
            <form  method="POST" id="payment-form"  action="/pay/with/paypal">
                {{ csrf_field() }}
       
        <hr>
        <div class="row">
            <div class="col-sm-7 details">
            <h5>ORDER NO: {{$refId}}</h5>
                <h5>Project Details.</h5>
                <hr>
                <div class="info">

                        <table class="table table-borderless">
                               
                                <tbody>
                                  <tr id="one">
                                   
                                    <td>Type of Service:</td>
                                  <td>{{$orderData['typeofservice']}}</td>
                                   </tr>
                                  <tr>
                                    <td id="one">Project purpose:</td>
                                    <td>{{$orderData['purpose']}}</td>
                                  </tr>
                                  <tr>
                                    <td>Project type:</td>
                                    <td>{{$orderData['typeofproject']}}</td>
                                  </tr>
                                  <tr>
                                    <td>Line Spacing:</td>
                                    <td>{{$orderData['spacing']}}</td>
                                    </tr>
                                </tbody>
                              </table>

                    <!--p>Type of Service: &nbsp; &nbsp; Writing</p>
                    <p>Project purpose: &nbsp; &nbsp; School</p>
                    <p>Project type: &nbsp; &nbsp; Article Writing</p>
                    <p>Line Spacing: &nbsp; &nbsp; Double</p-->
                </div>

                <h5>Specification &amp; Deadline:</h5>
                <hr>
                <div class="specs">

                        <table class="table table-borderless">
                        
                        <tbody>
                            <tr>
                                <td>Page Count:</td>
                            <td>{{$orderData['pagecount']}}</td>
                            </tr>
                            <tr>
                                <td>Formatting &amp; Citation:</td>
                                <td>{{$instructionData['citation']}}</td>
                            </tr>
                            <tr>
                                <td>Project Deadline:</td>
                                <td>{{$instructionData['deadline']}} {{$instructionData['deadlineHour']}}:00 HRS GMT +4</td>
                            </tr>
                            <tr>
                                <td>Price per Page:</td>
                                <td>${{$ppp}} USD</td>
                            </tr>
                        </tbody>
                        </table>
                    <!--p>Page Count: &nbsp; &nbsp; 4</p>
                    <p>Formatting &amp; Citation: &nbsp; &nbsp; MLA</p>
                    <p>Project Deadline: &nbsp; &nbsp; 2019-08-30 14:00 GMT +4</p>
                    <p>Price per Page: &nbsp; &nbsp; $33.0</p-->
                </div>
            </div>
            <div class="col-sm-5 summary">
                    <div class="table price" style="background-color: rgb(255,255,0,0.8); margin-top: 30px; padding: 10px; border-radius: 5px;">
                            <h5>Summary</h5>
                            <br>
                            <label class="w3-text-blue"><b>Order Total (USD)</b></label>
                            <input class="w3-input w3-border" name="amount" type="text" style="width:80px !important;" value="{{$totalPrice}}" readonly> 
                            <p>VAT: &nbsp; &nbsp; $0</p>
            
                            
                                
                                
                                      
                               
            
                        </div>
                        <div class="payment">
                             <p>Delivered in <b>09:28:41</b> or less</p>
                             <br>
                             <h5>Payment method:</h5>
                             
                             <div class="paypal" style=" text-align:center;">
                                    <img src="https://img.icons8.com/color/64/000000/paypal.png">
                             </div>
                        </div>
            </div>
           
        </div>

        <div class="row"> <!--display flex for the two to appear inline-->
            <hr>
            <a href="/order/details" class="btn btn-warning"><img src="https://img.icons8.com/windows/32/000000/circled-left-2.png"> Back to Details</a>
            <a href="/order/instructions" class="btn btn-warning"><img src="https://img.icons8.com/windows/32/000000/circled-left-2.png"> Back to Instructions</a>

            <!--button class="btn btn-success">Checkout ></button-->
            <button class="btn btn-success"><img style="width:30px" src="https://img.icons8.com/color/48/000000/paypal.png">Pay with PayPal <img style="width:20px" src="https://img.icons8.com/metro/26/000000/forward.png"></button></p>
        
        </div>
    </form>
    </div>
    <div class="col-md-4 right-float guide-float-right">
        
            <div class="title">
                <h6><strong>Files</strong></h6>
            </div>
            <div>
                <p>To upload a new file or check for incoming files, click on the 'Files' tab. If the file
                    is too big to upload, you can simply email it to support@studyref.com
                </p>
            </div>
            <div class="title">
                <h6><strong>Messages.</strong></h6>
            </div>
            <div>
                <p>To communicate with your writer or speak to a support representative, use the 'Messages' tab.
                    ask questions, get updates, control the order progress and more.
                </p>
            </div>
    
            <div class="title">
                <h6><strong>Get more, pay less</strong> </h6>
            </div>
            <div>
                <p>Save big as you receive premium quality results.</p>
            </div>
        
    </div>

</div>

@endsection