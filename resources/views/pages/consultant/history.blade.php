@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main" style="background-color: red;">
        <div class=" main-panel history-tasks">
             <h3>Previous Tasks</h3>

        </div>
        <div class="right-panel">
            
            <div class="right-pane-top available-tasks">
                <h4>Available Tasks:</h4>
            </div>
            <div class=" right-pane-bottom ongoing-tasks">
                <h4>Currently Working On:</h4>
            </div>

        </div>
    </div>
</div>

    
@endsection