@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main" style="background-color: red;">
        <div class=" main-panel available-tasks" style="padding: auto;">
             <h3>available-tasks</h3>
             <table class="main-panel-table">
                 <thead>
                     <tr>
                         <th>Order #</th>
                         <th>Class</th>
                         <th>Project Type</th>
                         <th># of Pages</th>
                         <th>Spacing</th>
                         <th>Deadline</th>
                     </tr>
                 </thead>
                 <tbody>
                     
                 </tbody>
             </table>
             @php
                 
             @endphp

        </div>
        <div class="right-panel">
            
            <div class="right-pane-top ongoing-tasks">
                <h4>Currently Working On:</h4>
            </div>
            <div class=" right-pane-bottom previous-tasks">
                <h4>Previously Completed</h4>
            </div>

        </div>
    </div>
</div>

    
@endsection