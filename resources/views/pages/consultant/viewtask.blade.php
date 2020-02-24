@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main">
        <div class="main-panel">
        <h1>Order # {{$task[0]['details']->refId}}</h1>

        <br> <br> <br>
        <h5 style="border-bottom: 1px solid gray; text-align: left !important;">Order #{{$task[0]['details']->refId}} Details</h5>

        <table class="table table-striped" style="text-align: left !important;">
            <tbody>
                <tr>
                    <th span="row">Order Id:</th>
                    <td> {{$task[0]['details']->refId}}</td>
                </tr>
                <tr>
                    <th span="row">Project Class:</th>
                    <td> {{$task[0]['details']->projectPurpose}}</td>
                </tr>
                <tr>
                    <th span="row">Type of Service:</th>
                    <td> {{$task[0]['details']->typeOfService}}</td>
                </tr>
                <tr>
                    <th span="row">Page Count:</th>
                    <td> {{$task[0]['details']->pageCount}}</td>
                </tr>
                <tr>
                    <th span="row">Project Title:</th>
                    <td> {{$task[0]['instructions']->title}}</td>
                </tr>
                <tr>
                    <th span="row">Instructions:</th>
                    <td> {{$task[0]['instructions']->projectSpecification}}</td>
                </tr>
                <tr>
                    <th span="row">Quality Standard:</th>
                    <td> {{$task[0]['details']->writingLevel}}</td>
                </tr>
                <tr>
                    <th span="row">Line Spacing:</th>
                    <td> {{$task[0]['details']->lineSpacing}}</td>
                </tr>
                <tr>
                    <th span="row">Paper Size:</th>
                    <td> {{$task[0]['instructions']->paperSize}}</td>
                </tr>
                <tr>
                    <th span="row">References:</th>
                    <td> {{$task[0]['instructions']->sources}} sources. {{$task[0]['instructions']->citation}} Referencing Style</td>
                </tr>
                <tr>
                    <th span="row">Deadline</th>
                <td> {{$task[0]['instructions']->deadline}} {{$task[0]['instructions']->deadlineHour}}00 Hrs.</td>
                </tr>
                <tr style="text-align: center !important;">
                    <td><a class="btn btn-success" href="/consultant/work/handle/{{$task[0]['details']->refId}}">Handle this Project</a></th>
                    <td> <a class='btn btn-danger' href="/consultant/work">Cancel</a></td>
                </tr>
                
                
            </tbody>
        </table>
        </div>

        <div class="right-panel">

        </div>

    </div>
</div>

    
@endsection 