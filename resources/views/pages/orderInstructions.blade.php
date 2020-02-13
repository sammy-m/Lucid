@extends('layouts.clientside')


@section('content')
<link rel="stylesheet" href={{url('css/orderInstructions.css')}}>
<link rel="stylesheet" href={{url('css/orderDetails.css')}}>

<!-- Timepicker-->
<!--link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"-->
<!--script type='application/javascript' src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script-->
<!-- Timepicker-->



  <!--     

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

       -->

      


<div class="instructions" id="app">
    <h1 style="text-align:center">homework instructions.</h1>
    <form action="/order/instructionss" method="post">
        {{ csrf_field() }}

    <div class="instruction-form">
        <div class="main-form row">
        
        <div class="leefty col-lg-6">
<div class="deadline">

        
                <script type="application/javascript">
 //$(document).ready(function(){ 
                        
                    $(document).ready(function() {
                        var date = new Date();
                        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                        var tomorrow = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));
                        var end = new Date(date.getFullYear(), date.getMonth(), (date.getDate() + 1));
                    $( "#datepicker-11" ).datepicker({
                        format: "dd/mm/yyyy",
                        todayHighlight: true,
                        startDate: today,
                        endDate: end,
                        minDate: date,
                        autoclose: true
                    });
                    $("#datepicker-11").datepicker();
                    $('#datepicker-11').datepicker('setDate', date);

                   // $('.timepicker').timepicker({});
                    
/*
                    $('#timepicker-11').timepicker({
                        timeFormat: 'h:mm p',
                        interval: 60,
                        minTime: '10',
                        maxTime: '6:00pm',
                        defaultTime: '11',
                        startTime: '10:00',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: true
                    }); */



                 });
                
                </script> 

                <script type="application/javascript">
                

                    $(document).ready(function(){
                     //   $('.timepicker').timepicker({});

                //$('#timepicker-11').datetimepicker();
           
                    });


                
                </script>
    <h6 style="text-align:left"><strong>Project Deadline.</strong></h6>
    <div class="row times">
        <div class="col-xs-8 ded-date">
                <input class="date form-control @error('deadline') is-invalid @enderror" type="text" id="datepicker-11" name="deadline">
                @error('deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
       
        <div class="col-xs-4 ded-time">
                <select class="browser-default custom-select @error('deadlineHour') is-invalid @enderror" name="deadlineHour">
                   
                    <option value="08">8 AM</option>
                    <option value="09">9 AM</option>
                    <option selected value="10">10 AM</option>
                    <option value="11">11 AM</option>
                    <option value="12">12 PM</option>
                    <option value="13">1 PM</option>
                    <option value="14">2 PM</option>
                    <option value="15">3 PM</option>
                    <option value="16">4 PM</option>
                    <option value="17">5 PM</option>
                    <option value="18">6 PM</option>
                    <option value="19">7 PM</option>
                    <option value="20">8 PM</option>
                    <option value="21">9 PM</option>
                    <option value="22">10 PM</option>
                    <option value="23">11 PM</option>
                    <option value="00">12 AM</option>
                    <option value="01">1 AM</option>
                    <option value="02">2 AM</option>
                    <option value="03">3 AM</option>
                    <option value="04">4 AM</option>
                    <option value="05">5 AM</option>
                    <option value="06">6 AM</option>
                    <option value="07">7 AM</option>
                    
                </select>
                @error('deadlineHour')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
               
               
        </div>

        
        
    
</div>
    
    
    <div class="subject">
            <h6 style="text-align:left"><strong>Subject:</strong></h6>
            <input class="form-control @error('subject') is-invalid @enderror" type="text" placeholder="eg. Chemistry, Literature, Economics e.t.c" name="subject">
            @error('subject')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!-- Material input -->
    <!--div class="md-form">
        <input type="text" id="form1" class="form-control @error('subject') is-invalid @enderror" name="subject" onchange="this.setAttribute('value', this.value);"/>
        @error('subject')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
        <label for="form1" style="overflow:hidden">Subject <small>eg. Chemistry, Literature, Economics e.t.c</small></label>
    </div-->
    
            
    </div>

    <div class="format-citation">
        <div class="row">
            <div class="col-sm-7">
                <h6 style="text-align:left"><strong>Formatting & Citation Style</strong></h6>
                    <select class="browser-default custom-select @error('citation') is-invalid @enderror" name="citation">
                            <option selected></option>
                            <option value="None">None</option>
                            <option value="MLA">MLA</option>
                            <option value="HAVARD">HAVARD</option>
                            <option value="APA">APA</option>
                            <option value="AMA">AMA</option>
                            <option value="Turabian">Turabian</option>
                            <option value="ASA">ASA</option>
                            <option value="Chicago">Chicago</option>
                            <option value="Other">Other(Not listed)</option>
                          </select>
                          @error('citation')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                         @enderror   

            </div>
            <div class="col-sm-5 count">
                    <h6 style="text-align:left"><strong>Number of Sources</strong></h6>
                    <!--div class="def-number-input number-input safari_only">
                            <label class="btn btn-outline-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><span>-</span></label>
                            <input class="quantity" min="0" value="0" name="sources" type="number">
                            <label class="btn btn-outline-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><span>+</span></label>
                          </div-->
                    <div class="numberinput def-number-input number-input safari_only">
                    <label onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <div class="one box2" id="b1" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">
                                <span>-</span>
                            </div>
                        </label>
                    
                        
                            <input class="quantity" min="0" value="0" name="sources" type="number" readonly="true">
                        
                    
                    <label onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">
                        <div class="one box2" id="b3" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <span>+</span>
                        </div>
                    </label>
                    <!--label class="btn btn-outline-danger"  onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"><span>-</span></label>
                    <input class="quantity" min="1" value="1" name="pagecount" type="number">
                    <label class="btn btn-outline-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"><span>+</span></label-->
                    </div>

            </div>
        </div>
    </div>
    <br>
    <div class="paper-size">
        <!--h6 style="text-align:left"><strong>Paper Size</strong></h6-->
        <label for="paperSize" style="text-align:left"><strong>Paper Size</strong></label> 
        <div style="background-color:inherit; text-align:left">
                <label>
                        <input type='radio' name="paperSize" value="US Letter Size">
                        <div class="one box2" id="b1">
                            <span>Us Letter Size</span>
                        </div>
                    </label>
                    <label>
                        <input type='radio' name="paperSize" value="British/European" checked>
                        <div class="2 box2" id="b2">
                            <span>A4 (British/European)</span>
                        </div>
                    </label>
        </div>
                       
                
    </div>

        </div>
        <div class="righty col-lg-6">
            <div class="p-title" style="text-align:left">
                <!--h3>Project Title.</h3-->
                <label for="title"><strong>Project Title:</strong></label>
                <input class="form-control" type="text" placeholder="leave empty for the writer to come up with one" name="title">
            </div> <br>
            <div class="detailed-instruction">
                    <div class="form-group green-border-focus" style="text-align:left">
                            
                            <!--H5>Detailed Project Description</H5-->
                            <label for="projectSpecification"><strong>Detailed Project Specification</strong></label>
                            <textarea class="form-control @error('projectSpecification') is-invalid @enderror" id="exampleFormControlTextarea5" rows="7" name="projectSpecification"></textarea>
                            @error('projectSpecification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror    
                    </div>

            </div>

        </div>
       

        <script type="application/javascript">

           // $(function() {
            //$( "#datepicker-1" ).datepicker();
         //});
        
        </script>  
   
    </div>
    <div style="text-align:center">
            <button type="submit">preview Order</button>
        </div>
    </div><!-- instruction form-->
    
</form>
</div>

<script type="application/javascript">
       // window.addEventListener('load', function() {    alert($);})
</script>



@endsection