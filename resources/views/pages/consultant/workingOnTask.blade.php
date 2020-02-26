@extends('layouts.consultantpages')

@section('content')
    <div class="content">
        <div class="side-nav">
            @include('inc.consultantSidenav')
        </div>
        <div class="main">
            <div class="main-panel">

                <br> <br> <br>
        <h5 style="border-bottom: 1px solid gray; text-align: left !important;">Order #{{$task[0]['details']->refId}} Details</h5>

        <table class="table table-striped" style="text-align: left !important;" title="my table">
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
                
                
                
            </tbody>
        </table>

            </div>
            <div class="right-panel">
                <div id="app">

                   <chat-log v-bind:messages="messages"></chat-log>
                   
                   <message-composer v-on:messagesent="addMessage"></message-composer>

                </div>
            </div>
        </div>
    </div>
@endsection