@extends('layouts.clientside')

<link rel="stylesheet" href={{URL('css/clientDashboard.css')}}>

@section('content')


@if ($message = Session::get('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> <p>{!! $message !!}</p></strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!--div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div-->
    <?php Session::forget('success');?>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> <p>{!! $message !!}</p></strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php Session::forget('error');?>
    @endif


<div class="dash row">
    <div class="main-dash">
        <div class="salut">
            <h3>Dashboard: &nbsp; Welcome {{$name}}.</h3>
        </div>
        <div class="recent">
            <div class="card">
                <div class="card-header">
                    Recent orders:
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        @if($orders != null)
                         
                      
                            
                   
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
                                    
                                   

                                    
                                    
                                 <?php
                               $len = sizeof($orders);
                               $i=0; 
                                while($i<3 && $i<$len) {
                                    $ppp; $price; $status;

                                    if($orders[$i]['orderDetails'][0]->lineSpacing == 'double'){
                                        $ppp = 19;
                                    }
                                    else {
                                        $ppp = 39;
                                    }

                                    $price = $orders[$i]['orderDetails'][0]->pageCount * $ppp;

                                    if($orders[$i]['orderDetails'][0]->progressStatus != 'completed'){
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
                                        echo"<td><a class=' btn-success' href='/dashboard/myorders/{$orders[$i]['orderDetails'][0]->refId}'>View</a></td>";
                                    }
                                    else if($orders[$i]['orderDetails'][0]->paymentStatus != 'paid'){
                                        echo"<td>Pay</td>";
                                    }

                                    
                                echo"</tr>";

                                $i++;
                               }

                              

                            
                                ?>
                                <!--tr>
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

                            @else 
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
                                <tr>
                                    
                                    <td colspan="6" style="text-align:center; color:orange; font-weight:bold;">you have no orders yet</td>
                                   
                                </tr>
                            </tbody>

                            @endif
                            

                       
                        <!--thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" colspan="2">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                            </tr>
                        </tbody-->

                      
                    </table>

                    <div class="row actions">
                        <a href="/order/details" class="btn btn-primary">New Order</a>
                        <a href="/dashboard/orderhist">Order History</a>
                    </div>
                </div>
            </div>

        </div> <br>
        <div class="new-message-files row">
            <div class="card messages">
                <div class="card-header">
                        <img style="width:25px;" src="https://img.icons8.com/ios-filled/50/000000/reddit-inbox.png"> New Messages
                </div>
                <div class="card-body" style="min-height:100px">
                    <p><img style="width:15px;" src="https://img.icons8.com/metro/26/000000/maintenance.png">Under maintenance. Please contact <a href = "mailto: support@lucid.com">support@lucid.com</a></p>
                        <br>
                    <p>No New Messages</p>
                </div>

            </div>
            <div class="card files">
                <div class="card-header">
                        <img style="width:20px;" src="https://img.icons8.com/material-sharp/24/000000/file.png"> &nbsp; New-files
                </div>
                <div class="card-body" style="min-height:100px">
                        <p><img style="width:15px;" src="https://img.icons8.com/metro/26/000000/maintenance.png">Under maintenance. Please contact <a href = "mailto: support@lucid.com">support@lucid.com</a></p>
                        <br>
                    <p>No New Files</p>
                        
                    </div>

            </div>
        </div>

    </div>

    <div class="guide-float-right">
        <div class="title">
            <h6><strong>Files</strong></h6>
        </div>
        <div>
            <p>To upload a new file or check for incoming files, click on the 'Files' tab. If the file
                is too big to upload, you can simply email it to support@lucid.com
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