@extends('layouts.consultantpages')

@section('content')

<div class="content">
    <div class="side-nav">
        @include('inc.consultantSidenav')
    </div>
    <div class="main" >
        <div class=" main-panel ongoing-tasks">
             <h3>Currently Working On</h3>

             <table class="main-panel-table table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order #</th>
                        <th scope="col">Class</th>
                        <th scope="col">Project Type</th>
                        <th scope="col"># of Pages</th>
                        <th scope="col">Spacing</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($ongoing != null){
                        foreach ($ongoing as $task ) {
                            echo"<tr>";
                              echo "<td> {$task['details']->refId }</td>";
                          
                              echo "<td> {$task['details']->projectPurpose }</td>";
                           
                              echo "<td> {$task['details']->typeOfService }</td>";
                            
                              echo "<td> {$task['details']->pageCount }</td>";
                           
                              echo "<td> {$task['details']->lineSpacing }</td>";
                           
                              echo "<td> {$task['instructions'][0]->deadline} &nbsp; {$task['instructions'][0]->deadlineHour} 00 Hrs</td>";

                              echo "<td>  <a class='btn-success' href='/consultant/work/task/{$task['details']->refId}'>View</a> </td>";
                            echo"</tr>";

                        }
                    } else{
                        echo"<tr> <td colspan ='6'> Tasks are currently not available. </td> </tr>";
                    }
                    ?>
                    
                    
                </tbody>
            </table>

        </div>
        <div class="right-panel" style="background-color: rgba(128, 128, 128, 0.112)">
            
            <div class="right-pane-top available-tasks">
                <h4>Available Tasks:</h4>
                <table class="main-panel-table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Order #</th>                           
                            <th scope="col">Project Type</th>                            
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($tasks != null){
                            foreach ($tasks as $task ) {
                                echo"<tr>";
                                  echo "<td> {$task['details']->refId }</td>";
                                  echo "<td> {$task['details']->typeOfService }</td>";
                                  echo "<td> {$task['instructions'][0]->deadline} &nbsp; {$task['instructions'][0]->deadlineHour} 00 Hrs</td>";
                                  echo "<td>  <a class='btn-success' href='/consultant/work/task/view/{$task['details']->refId}'>View</a> </td>";
                                echo"</tr>";
   
                            }
                        } else{
                            echo"<tr> <td colspan ='6'> Tasks are currently not available. </td> </tr>";
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>
            <div class=" right-pane-bottom completed-tasks">
                <h4>Previously Completed Tasks:</h4>
                <table class="main-panel-table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Order #</th>                           
                            <th scope="col">Project Type</th>                            
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($complete != null){
                            foreach ($complete as $task ) {
                                echo"<tr>";
                                  echo "<td> {$task['details']->refId }</td>";
                                  echo "<td> {$task['details']->typeOfService }</td>";
                                  echo "<td> {$task['instructions'][0]->deadline} &nbsp; {$task['instructions'][0]->deadlineHour} 00 Hrs</td>";
                                  echo "<td>  <a class='btn-success' href='/consultant/work/task/{$task['details']->refId}'>View</a> </td>";
                                echo"</tr>";
   
                            }
                        } else{
                            echo"<tr> <td colspan ='4'> Tasks are currently not available. </td> </tr>";
                        }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

    
@endsection