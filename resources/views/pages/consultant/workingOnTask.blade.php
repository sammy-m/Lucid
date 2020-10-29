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

        <div class="files">
            <div class="client-files file-tab" id="clntFls">

                <p>the client has not uploaded any files</p>

            </div>
            <div class="consultant-files file-tab" id="consFls">
                <p>You have not uploaded any file yet.</p>
            </div>
            @if ($task[0]['details']->progressStatus == 'in progress')
            <div class="upload-file">
                <p>Upload a file here.</p>
                {{ Form::open(array('url' => "/consultant/uploadfile/".$task[0]['details']->refId, 'method'=>'post')) }}
            <input type="text" name="order" id="order-hidden" value="{{$task[0]['details']->refId}}" hidden>
                <input type="file" name="fileToUpload" id="fileToUpload" hidden>
                <label for="fileToUpload">
                    <span class="upload-btn" style=""><img src="/images/icons/cloud-upload-outline.svg" alt="upload" height="30px" style="margin-bottom: 5px;">
                    </span>
                    <span class="file-name" id="file-name">No file choosen</span> 
                </label> <span class="upld btn-primary" id="upload-now" style="border-radius: 5px; padding: 3px; cursor: pointer;">Upload</span>
                {{ Form::close() }}
            </div>
            @endif
           
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <h5 style="margin-top: 20px;">Do you wish to mark this work as complete?</h5>
            <div class="action">
                <div class="confirm">
                    <span class="btn btn-primary" id="conf">Confirm</span>
                </div>
                <div class="cancl">
                    <span class="btn btn-warning" id="canc">Cancel</span>
                </div>
            </div>
            </div>
        
        </div>
        @if ($task[0]['details']->progressStatus == 'in progress')
            <div class="complete">
                <span class="btn btn-primary" id="myBtn">Mark Complete</span>
            </div>
        @endif
        

            </div>
            <div class="right-panel">
                <div id="app" style="overflow-y: hidden !important; height:100%">
                    <order-id :id='orderId' id={{$task[0]['details']->refId}}></order-id>
                   <chat-log v-bind:messages="messages" order-id={{$task[0]['details']->refId}}></chat-log>
                   
                   
                   <!--message-composer v-on:messagesent="addMessage" v-bind:messages="messages" messas='vxgdvxgvxdgcvd'></message-composer-->

                </div>
            </div>
        </div>
        <script type="application/javascript" defer>

        window.onload = function(){
            if(`{{$task[0]['details']->progressStatus}}` == 'in progress'){
                //alert("in progress");
                 ///file upload
           var actualBtn = document.getElementById('fileToUpload');
            //console.log(document.getElementById('fileToUpload'));

            var fileChosen = document.getElementById('file-name');

            actualBtn.addEventListener('change', function(){
            fileChosen.textContent = this.files[0].name;
          //  console.log(this.files[0].name);
         // console.log(fileChosen);
            });
            ////uploading a file
            var uploadFile = document.getElementById('upload-now');
            var order = document.getElementById('order-hidden').value;
            
            uploadFile.addEventListener('click', function(){

                var formData = new FormData();
                var consultantFile = actualBtn;
                if (consultantFile.files[0] != undefined || consultantFile.files[0] != null) {
                    console.log('file present');
                    formData.append("file", consultantFile.files[0]);
                    formData.append('order', order);
                        axios.post('/consultant/uploadfile', formData, {
                        headers: {
                        'Content-Type': 'multipart/form-data'
                        }
            }).then(function(resp){
              //  console.log(resp);
                if(resp.status >= 200 && resp.status <= 209){
                    document.getElementById('fileToUpload').value = null;
                    document.getElementById('file-name').textContent = "No file chosen";
                    getFiles();
                }
            })
                }
              
            } );

            }
          

            function getFiles() {
                axios.get('/consultant/getfiles?order='+`{{$task[0]['details']->refId}}` ).then( function(res){
                    console.log(res.data[1]);
                    if (res.data[0].length != 0) {
                        var clientfilesHTML = '<h4>Client\'s Files</h4>';
                    res.data[0].forEach( file => {
                        var splt =  file.split('/');
                       // console.log(splt.length);
                        var flnm = splt[splt.length - 1];
                       // console.log(flnm);
                        var extsplt = flnm.split('.');
                        var ext = extsplt[extsplt.length - 1];
                        //console.log(ext);
                        var Fclass = "";
                        // if(ext == "word" || ext == 'doc' || ext == 'docx'){
                        //     Fclass = "word";
                        // }else if(ext == "pdf"){
                        //     Fclass = "pdf";
                        // } else if(ext ==)
                        clientfilesHTML += `<a href="/file/download?path=`+file+`" class="`+ext+`">`+flnm+`</a> </br>`;
                    });
                    document.getElementById('clntFls').innerHTML = clientfilesHTML;
                        
                    }
                    if (res.data[1].length != 0) {
                        var consultantfilesHTML = '<h4>My Files</h4>';
                    res.data[1].forEach( file => {
                        var splt =  file.split('/');
                       // console.log(splt.length);
                        var flnm = splt[splt.length - 1];
                       // console.log(flnm);
                        var extsplt = flnm.split('.');
                        var ext = extsplt[extsplt.length - 1];
                        //console.log(ext);
                       
                        consultantfilesHTML += `<a href="/file/download?path=`+file+`" class="`+ext+`">`+flnm+`</a> </br>`;
                    });
                    document.getElementById('consFls').innerHTML = consultantfilesHTML;
                                             
                    }
                })
            } getFiles();


                    // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

//button that cancels the modal
var cancBtn = document.getElementById("canc");
//button that completes the task
var complBtn = document.getElementById('conf');

// When the user clicks on the button, open the modal
if(btn != null)btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

cancBtn.onclick = function() {
  modal.style.display = "none";
}

complBtn.onclick = function(){
    var formData = new FormData();
    formData.append('order', `{{$task[0]['details']->refId}}`)
    axios.post('/order/markcomplete', formData, {  headers: {'Content-Type': 'multipart/form-data'}
     }).then(function(res){
    //console.log(res);
    if(res.status >= 200 && res.status <= 209){
     location.reload();
    }
    })
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 

        }



 
        </script>
    </div>
@endsection