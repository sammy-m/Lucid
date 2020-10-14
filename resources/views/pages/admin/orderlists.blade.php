@extends('layouts.adminpages')

@section('content')

<link rel="stylesheet" href={{URL('css/adminDash.css')}}>

<div class="platform">
    <div class="fixed-sidenav">
        <a href="/admin/dash">All Orders</a>
        <a href="/admin/dash/ongoing">Ongoing Orders</a>
        <a href="/admin/dash/unallocated">Unallocated Orders</a>
        <a href="/admin/analytics">Analytics</a>
    </div>
    <div class="content-area">
        <div class="heading" style="text-align: center;">
        <h1>{{$heading}}</h1>
        </div>
    
            <table class="table table-striped">
                   
                  
                        
               
                    <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" colspan="2">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">payment</th>   
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

                                if($orders[$i]['orderDetails']->lineSpacing == 'double'){
                                    $ppp = 19;
                                }
                                else {
                                    $ppp = 39;
                                }

                                $price = $orders[$i]['orderDetails']->pageCount * $ppp;

                                if($orders[$i]['orderDetails']->progressStatus == 'completed'){
                                    $status = 'Completed';
                                }
                                else if($orders[$i]['orderDetails']->progressStatus == 'assigned'){
                                    $status = 'In Progress';
                                }
                                else if($orders[$i]['orderDetails']->progressStatus == 'new'){
                                    $status = 'Unallocated';
                                }
                                else {
                                    $status = $orders[$i]['orderDetails']->progressStatus;
                                }

                               
                            echo"<tr>";
                               echo" <td>{$orders[$i]['orderDetails']->refId}</td>";
                                echo "<td colspan='2'>{$orders[$i]['orderInstructions'][0]->title}</td>";
                               
                                echo"<td>$ {$price}</td>";
                                echo"<td>{$status}</td>";
                                if($orders[$i]['orderDetails']->paymentStatus == 'paid'){
                                    echo"<td>Paid</td>";
                                }
                                else if($orders[$i]['orderDetails']->paymentStatus != 'paid'){
                                    echo"<td>Unpaid</td>";
                                }
                                echo"<td><a class=' btn-success' href='/admin/view-order/{$orders[$i]['orderDetails']->refId}'>View</a></td>";
                                
                            echo"</tr>";

                            $i++;
                           }

                          

                        
                            ?>
                            @else
                            <td colspan="7" style="text-align:center; color:orange; font-weight:bold;">you have no orders yet</td>
                            @endif                            
                        </tbody>
                        
                        
                   

                  
                </table>

    </div>
</div>

@endsection