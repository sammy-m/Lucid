@extends('layouts.clientside')

<link rel="stylesheet" href={{URL('css/clientOrderInstance.css')}}>

@section('content')

<div class="row" >
    <div class="main-dash">

        <div class="breadcrumbs">
            <p> <a href="/manage/dashboard">Dashboard</a> &nbsp; &frasl; <a href="/dashboard/orderhist">My Orders</a> &nbsp; &frasl; Order #{{$thisOrder[0]['orderDetails']->refId}} </p>
        </div>

        <div>
            <p>put radios here for page navigations</p>
        </div>

        <div class="title">
            <h6><strong>Order #{{$thisOrder[0]['orderDetails']->refId}} Details</strong></h6>
            
        </div>
        <br>
        <div class="details">
            <table class="table table-striped">
                <tr>
                    <td>Order ID:</td>
                    <td>{{$thisOrder[0]['orderDetails']->refId}}</td>                    
                </tr>
                <tr>
                    <td>Writer preference:</td>
                    <td>{{$thisOrder[0]['orderDetails']->writerPreference}}</td>                    
                </tr>
                <tr>
                    <td>Project purpose:</td>
                    <td>{{$thisOrder[0]['orderDetails']->projectPurpose}}</td>                    
                </tr>
                <tr>
                    <td>Due date:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->deadline}}</td>                    
                </tr>
                <tr>
                    <td>Type of service:</td>
                    <td>{{$thisOrder[0]['orderDetails']->typeOfService}}</td>                    
                </tr>
                <tr>
                    <td>Pages:</td>
                    <td>{{$thisOrder[0]['orderDetails']->pageCount}}</td>                    
                </tr>
                <tr>
                    <td>Project title:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->title}}</td>                    
                </tr>
                <tr>
                    <td>Additional instructions:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->projectSpecification}}</td>                    
                </tr>
                <tr>
                    <td>Spacing:</td>
                    <td>{{$thisOrder[0]['orderDetails']->lineSpacing}}</td>                    
                </tr>
                <tr>
                    <td>Writing level:</td>
                    <td>{{$thisOrder[0]['orderDetails']->writingLevel}}</td>                    
                </tr>
                <tr>
                    <td>References:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->sources}}</td>                    
                </tr>
                                   
                

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