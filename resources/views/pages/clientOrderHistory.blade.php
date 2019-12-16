@extends('layouts.clientside')

<link rel="stylesheet" href={{URL('css/clientOrderHistory.css')}}>

@section('content')
<div class="row history">
    <div class="main-hist">
      <h5 style="border-bottom: 1px solid grey"><strong>Order History</strong></h5>

      <div class="breadcrumbs">
            <p> <a href="#">Dashboard</a> &nbsp; &frasl; <a href="#">My Orders</a> &nbsp; &frasl; Order #0788898 </p>
      </div>

      <div class="orders">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" colspan="2">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>                                
                        </tr>
                    </thead>
                    
                            <tbody>
                                @if($orders != null)
                                    <?php
                                    $len = sizeof($orders);
                                    $i=0; 
                                     while( $i<$len) {
                                         $ppp; $price; $status;
     
                                         if($orders[$i]['orderDetails'][0]->lineSpacing == 'double'){
                                             $ppp = 19;
                                         }
                                         else {
                                             $ppp = 39;
                                         }
     
                                         $price = $orders[$i]['orderDetails'][0]->pageCount * $ppp;
     
                                         if($orders[$i]['orderDetails'][0]->progressStatus != 'complete'){
                                             $status = 'In progress';
                                         }
                                         else {
                                             $status = 'Completed';
                                         }
     
                                        
                                     echo"<tr>";
                                        
                                        echo" <td>{$orders[$i]['orderDetails'][0]->refId}</td>";
                                         echo "<td colspan='2'>{$orders[$i]['orderInstructions']->title}</td>";
                                        
                                         echo"<td>$ {$price}</td>";
                                         echo"<td>{$status}</td>";
                                         if($orders[$i]['orderDetails'][0]->paymentStatus == 'paid'){
                                             echo"<td><a class='btn-success' href='/dashboard/myorders/{$orders[$i]['orderDetails'][0]->refId}'>View<a></td>";
                                         }
                                         else if($orders[$i]['orderDetails'][0]->paymentStatus != 'paid'){
                                             echo"<td>Pay</td>";
                                         }
                                         
                                         
                                     echo"</tr>";
     
                                     $i++;
                                    }
     
                                    ?>
                                    @else

                                    <tr>
                                            
                                        <td colspan="6" style="text-align:center; color:orange; font-weight:bold;">you have no orders yet</td>
                                       
                                    </tr>

                                    @endif

                                    <!--tr>
                                        <td>787484</td>
                                        <td colspan="2">Hong Kong</td>
                                        <td>$356</td>
                                        <td>Pending</td>
                                        <td>Complete</td>
                                    </tr>
                                    <tr>
                                        <td>787484</td>
                                        <td colspan="2">Hong Kong</td>
                                        <td>$356</td>
                                        <td>Pending</td>
                                        <td>Complete</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>787484</td>
                                        <td colspan="2">Hong Kong hshahxbhxbjxhjbhxshb hhbshbhb hioauxh</td>
                                        <td>$356</td>
                                        <td>Pending</td>
                                        <td>Complete</td>
                                    </tr-->
                                </tbody>
                   
                    
                </table>

      </div>
    </div>

    <div class="guide-float-right">
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