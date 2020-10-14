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
                   @if (1==2)
                   <div class="pick-up">
                       <h3>Pick up from where you left</h3>
                       <div class="task-card">

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
               <div class="interested" style="margin: auto; width: 90%;">
                   <h5>Here is a job you might be interested in!</h5>
                   <div>

                   </div>
               </div>
           </div>
       </div>
       <div class="random">
           
       </div>
    </div>
</div>

@endsection
