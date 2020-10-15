@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main dash-home">
       
       
        <div class="greetings">
        <p>Hello <img src="/images/icons/sunny-icon.png" width="70px" width="70px" alt="morning"> <br>{{Auth::User()->name}}!</p>
            
        </div>
       
     
      

       <div class="insight">
         
           <div class="card insight-item" style="text-align: center;">
               
               <div class="working-on" style="min-height: 100%; display: flex;">
                   @if ($ongoing != null)
                   <div class="pick-up" style="margin: auto; width: 90%;">
                       <h3>Pick up from where you left</h3>
                       <div class="task-card">
                       <p>Order #{{$ongoing[0]['details']->refId }} &nbsp; <a class="btn btn-success" href="/consultant/work/task/{{$ongoing[0]['details']->refId }}">RESUME</a></p>
                       </div>
                   </div>
                       
                   @else
                       <div class="work-prompt" style="margin: auto; width: 90%;">
                           <p>You do not have any ongoing work</p>
                           <p>click <a href="/consultant/work"><span class="btn btn-primary">here</span></a> to find work!</p>
                       </div>
                   @endif
               </div>
           </div>
           <div class="card insight-item" style="display: flex; text-align: center;">
            @if ($tasks != null)
            <div class="interested" style="margin: auto; width: 90%;">
                <h4>Here is a job you might be interested in!</h4>
                <div class="task-card">
                 <p>Order #{{$tasks[0]['details']->refId }} &nbsp; <a class="btn btn-primary" href="/consultant/work/task/view/{{$tasks[0]['details']->refId }}">VIEW</a></p>
                </div>
            </div>
            @else
                <div class="check-later" style="margin: auto; width: 90%;">
                    <h4>No jobs currently available</h4>
                    <p>Check in later for more Jobs</p>
                </div>
            @endif
              
           </div>
       </div>
       <div class="random">
           
       </div>
    </div>
</div>

@endsection
