@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main dash-home">
       
       
        <div class="greetings">
            <p>Good morning <img src="/images/icons/sunny-icon.png" width="70px" width="70px" alt="morning"> Sammy!</p>
            
        </div>
       
     
      

       <div class="insight">
         
           <div class="card insight-item">
               <p>insight item 1</p>
           </div>
           <div class="card insight-item">
               <p>insight item 2</p>
           </div>
       </div>
       <div class="random">
           
       </div>
    </div>
</div>

@endsection
