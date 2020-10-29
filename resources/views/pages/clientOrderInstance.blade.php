@extends('layouts.clientside')

<link rel="stylesheet" href={{URL('css/clientOrderInstance.css')}}>

@section('content')

<div class="row" >
    <div class="main-dash">

        <div class="breadcrumbs">
            <p> <a href="/manage/dashboard">Dashboard</a> &nbsp; &frasl; <a href="/dashboard/orderhist">My Orders</a> &nbsp; &frasl; Order #{{$thisOrder[0]['orderDetails']->refId}} </p>
        </div>

        <div>
            <p>put radios here for page navigations</p>
        </div>

        <div class="title">
            <h6><strong>Order #{{$thisOrder[0]['orderDetails']->refId}} Details</strong></h6>
            
        </div>
        <br>
        <div class="details">
            <table class="table table-striped">
                <tr>
                    <td>Order ID:</td>
                    <td>{{$thisOrder[0]['orderDetails']->refId}}</td>                    
                </tr>
                <tr>
                    <td>Writer preference:</td>
                    <td>{{$thisOrder[0]['orderDetails']->writerPreference}}</td>                    
                </tr>
                <tr>
                    <td>Project purpose:</td>
                    <td>{{$thisOrder[0]['orderDetails']->projectPurpose}}</td>                    
                </tr>
                <tr>
                    <td>Due date:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->deadline}}</td>                    
                </tr>
                <tr>
                    <td>Type of service:</td>
                    <td>{{$thisOrder[0]['orderDetails']->typeOfService}}</td>                    
                </tr>
                <tr>
                    <td>Pages:</td>
                    <td>{{$thisOrder[0]['orderDetails']->pageCount}}</td>                    
                </tr>
                <tr>
                    <td>Project title:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->title}}</td>                    
                </tr>
                <tr>
                    <td>Additional instructions:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->projectSpecification}}</td>                    
                </tr>
                <tr>
                    <td>Spacing:</td>
                    <td>{{$thisOrder[0]['orderDetails']->lineSpacing}}</td>                    
                </tr>
                <tr>
                    <td>Writing level:</td>
                    <td>{{$thisOrder[0]['orderDetails']->writingLevel}}</td>                    
                </tr>
                <tr>
                    <td>References:</td>
                    <td>{{$thisOrder[0]['orderInstructions']->sources}}</td>                    
                </tr>
                                   
                

            </table>

            <div class="files" style="text-align: center">
                <div class="client-files file-tab" id="clntFls">
    
                    <p>You have not uploaded any files</p>
    
                </div>
                <div class="consultant-files file-tab" id="consFls">
                    <p>The consultant has not uploaded any file yet.</p>
                </div>
                @if ($thisOrder[0]['orderDetails']->progressStatus == "in progress")
                <div class="upload-file">
                    <p>Upload a file here.</p>
                    {{ Form::open(array('url' => "", 'method'=>'post')) }}
                <input type="text" name="order" id="order-hidden" value="{{$thisOrder[0]['orderDetails']->refId}}" hidden>
                    <input type="file" name="fileToUpload" id="fileToUpload" hidden>
                    <label for="fileToUpload">
                        <span class="upload-btn" style=""><img src="/images/icons/cloud-upload-outline.svg" alt="upload" height="30px" style="margin-top: 2px;">
                        </span>
                        <span class="file-name" id="file-name">No file choosen</span> 
                    </label> <span class="upld btn-primary" id="upload-now" style="border-radius: 5px; padding: 3px; cursor: pointer;">Upload</span>
                    {{ Form::close() }}
                </div>
                @endif

               
            </div>


            <div class="guidelines">
                <div class="title">
                    <h6><strong>Files</strong></h6>
                </div>
                <div>
                    <p>To upload a new file or check for incoming files, click on the 'Files' tab. If the file
                        is too big to upload, you can simply email it to support@studyref.com
                    </p>
                </div>
                <div class="title">
                    <h6><strong>Messages.</strong></h6>
                </div>
                <div>
                    <p>To communicate with your writer or speak to a support representative, use the 'Messages' tab.
                        ask questions, get updates, control the order progress and more.
                    </p>
                </div>
        
                <div class="title">
                    <h6><strong>Get more, pay less</strong> </h6>
                </div>
                <div>
                    <p>Save big as you receive premium quality results.</p>
                </div>
            </div>

        </div>

        {{-- <div class="messages-tab">
            <div id="app" style="overflow-y: hidden !important; height:100%">
                
            </div>
        </div> --}}

    </div>

    <div class="guide-float-right">
        <div id="app">
            <order-id :id='orderId' id={{$thisOrder[0]['orderDetails']->refId}}></order-id>
           <chat-log v-bind:messages="messages" order-id={{$thisOrder[0]['orderDetails']->refId}}></chat-log>
           
           
           <!--message-composer v-on:messagesent="addMessage" v-bind:messages="messages" messas='vxgdvxgvxdgcvd'></message-composer-->

        </div>

    </div>

    
</div>
<script type="application/javascript" defer>

    window.onload = function(){
        if(`{{$thisOrder[0]['orderDetails']->progressStatus}}` == 'in progress'){
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
                    axios.post('/client/uploadfile', formData, {
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
        } //end if

        function getFiles() {
            axios.get('/consultant/getfiles?order='+`{{$thisOrder[0]['orderDetails']->refId}}` ).then( function(res){
                console.log(res.data[1]);
                if (res.data[0].length != 0) {
                    var clientfilesHTML = '<h4>My Files</h4>';
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
                    var consultantfilesHTML = '<h4>Consultant\'s Files</h4>';
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

    }

    </script>


@endsection