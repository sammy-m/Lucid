@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main" style="background-color: red;">
        <div class=" main-panel ongoing-tasks">
             <h3>Currently Working On</h3>

        </div>
        <div class="right-panel">
            
            <div class="right-pane-top available-tasks">
                <h4>Available Tasks:</h4>
            </div>
            <div class=" right-pane-bottom completed-tasks">
                <h4>Previously Completed Tasks:</h4>
            </div>

        </div>
    </div>
</div>

    
@endsection