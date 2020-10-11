@extends('layouts.clientside')


@section('content')

<link rel="stylesheet" href="{{asset('css/portfolio.css')}}">
<link rel="stylesheet" href="{{asset('css/croppic.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<script type="application/javascript" src="https://kit.fontawesome.com/ea2b59a1e2.js" crossorigin="anonymous"></script>

<div class="content" style="margin-top: 66px;">
    <div class="side-nav" style="">

        <div class="salut">
            <div class="avatar">

            </div>
            <div class="greetings">

            </div>
        </div>

        <div class="sections">
            <div class="section-link"> <a href="#">Theme</a> </div>
            <div class="section-link"> <span><i class="far fa-user"></i></span> <a href="#">About Me</a> </div>
            <div class="section-link"> <span></span> <a href="#">Bio</a> </div>
            <div class="section-link"> <a href="#">Skills & Experience</a> </div>
            <div class="section-link"> <a href="#">Past Projects</a> </div>
            <div class="section-link"> <a href="#">Current Projects</a> </div>
            <div class="section-link"> <a href="#">My Contacts</a> </div>
        </div>


    </div>
    <div class="main" id="apsi" style="">
    <form action="{{ route('storePortfolio')}}" method="POST">
        @csrf
            <div class="guide">
                <p>You are just a few steps to designing your amazing portfolio. <br> With just a few clicks and a little typing, you will have a state of the art portfolio
                    that will woo your next employers or financiers. <br>
                    Lets get started!
                </p>
            </div>
            <div class="theme">
                <div class="guide-min">
                    <p>Lucid is endevored to creating that personalized look and feel of your portfolio. You can select a theme of your liking from the available options.</p>
                </div>
                
                <label for="theme">Pick your prefered theme.</label> <br>
                    <label id="dark">
                        <input type="radio" name="theme" id="dark" value="dark" @if($data->theme == 'dark') checked @endif>
                        <div class="box-preview" id="box-dark"></div>
                        <span>Dark Theme</span>
                    </label> 
                    <label class="light">
                        <input type="radio" name="theme" id="light" value="light"  @if($data->theme == 'light') checked @endif>
                        <div class="box-preview" id="box-light"></div>
                        <span>Light Theme</span>
                    </label>
                    <label class="vibrant">
                        <input type="radio" name="theme" id="vibrant" value="vibrant"  @if($data->theme == 'vibrant') checked @endif>
                        <div class="box-preview" id="box-vibrant"></div>
                        <span>Vibrant Theme</span>
                    </label>
            </div>
           
            <div class="intro">
                <div class="guide-min">
                <p>Welcome your viewers with a greeting! Tell them your name and occupation. You can also provide an image of yourself that will appear</p>
                </div>
                <div class="view-port">
                <div class="intro-greetings">
                    <span class="file-input">
                        <input type="file" name="intro-portrait" id="intro-portrait" class="inp-portrait-image" accept="image/*">
                        <label for="intro-portrait">Upload high quality portrait</label>
                        <input type="hidden" name="landscapePic" id="finalImg" value="">
                    </span>
                    <div class="greetings-text">
                    <p>Hi there! I am</p>
                    <input type="text" name="name" id="name" class="text" placeholder="Enter your name..." value="{{$data->name}}">
                    <div class="occupation">
                        <p>I</p>
                    <input type="text" name="occupation" id="occupation" class="text" placeholder="am an architect working with Doe Company" value="{{$data->profession}}">
                    </div>
                    </div>
                    <div class="greetings-portraits" id="port-views">
                        
                        

                      
                        

                        <div class="img-sizing">
                           <span class="btn" id="z-in">+</span>
                           <span class="btn" id="z-out" >-</span>
                           <span id="clear" class="btn">clear</span>
                        </div>
                    </div>                    
                </div>
                <div id="canvd"></div>
            </div>
                {{-- <div id="imagePre" style="background-image: URL(''); height: 700px; background-repeat: no-repeat; background-size: contain;">

                </div> --}}
            </div>
            <div class="about">
                <div class="svg-wave" style="height: 0px;">
                    <span class="divsep" >
                    <img src="{{asset('/images/svg bg/wavy.svg')}}" alt="">
                    </span>
                </div>
                <div class="bio">
                    <div class="guide-min">
                        <p>A short story about yourself is important in telling the world about yourself. Make it as captivating and interesting as it can be.</p>
                    </div>
                    <textarea name="bio" id="bio-text" cols="30" rows="5" placeholder="Type something about you here...">
                        {{$data->bio}}
                    </textarea>
                   
                </div>

            </div>

            <div class="skills-experience">
                <div class="guide-min">
                    <p>Skills and experience speak a lot about your qualifications and capabilities. Tell people about the experince that you have. Do not shy away from letting
                        people know about your skills either.
                    </p>
                </div>
                
                <div class="carousel">
                    @php
                      $skills = json_decode($data->skills); 
                      $ss = 1; 
                    @endphp

                    <span class="quality-scroll left-arrow" onclick="scrollCarouselQ(event)"><</span>
                    <div class="card-holder" id="skill-holder">

                        @foreach ($skills as $skill)
                        <div class="quality carousel-card" id="card" onclick="clicked(this)">
                            <span class="rm-card" id="rm-card" onclick="removeCard(event)">X</span>
                            
                            <div class="card-title quality-title">
                                
                                <input type="text" name="quality{{$ss}}" id="quality" placeholder="0Type in a quality, skill or experience you posses" value="{{$skill->title}}">
                            </div>

                            <div class="card-detail quality-detail">
                                
                            <textarea name="qualitydescription1" id="quality-description" placeholder="describe the skill or experience"> {{$skill->description}}</textarea>
                            </div>
                            
                        </div>
                        @php
                            ++$ss;
                        @endphp
                        {{-- <script type="application/javascript" defer> stackCards(document.getElementById('card'));</script> --}}
                        @endforeach
                       
                        


                        <span class="add-card" id="add-skill" title="Add a skill" onclick="addskill()">+</span>

                    </div>
                    
                    <span class="quality-scroll right-arrow" onclick="scrollCarouselQ(event)">></span>

                </div>
                
               
            </div>

            <div class="projects">
               
                <div class="past-work-projects">
                    <div class="guide-min">
                        <p>Tell us about the exciting projects and achievements that you have had previously.</p>
                    </div>
                    
                    <div class="carousel">
                        @php
                        $prevWrks = null;
                        $pw = 1;
                         if(property_exists($data, "previousWork")){
                            $prevWrks = json_decode($data->previousWork);
                        }
                         @endphp
                        <span class="project-scroll left-arrow" onclick="scrollCarouselP(event)"><</span>
                        <div class="card-holder" id="project-holder">
                            @foreach ($prevWrks as $pw)
                                <div class="project carousel-card" id="cardpw" onclick="clicked(this)">
                                    <span class="rm-card" id="rm-card" onclick="removeCard(event)">X</span>
                                    
                                    <div class="card-title project-title">
                                        
                                    <input type="text" name="project{{$pw}}" id="project" placeholder="0Type in a past project or work you have done" value="{{$pw->title}}">
                                    </div>

                                    <div class="card-detail project-detail">
                                        
                                    <textarea name="projectdescription1" id="project-description" placeholder="describe the skill or experience">{{$pw->description}}</textarea>
                                    </div>
                                    @php
                                        ++$pw;
                                    @endphp
                                </div>
                            @endforeach
                            

                           


                            <span class="add-card" id="add-skill" title="Add a project" onclick="addproject()">+</span>

                        </div>
                        
                        <span class="project-scroll right-arrow" onclick="scrollCarouselP(event)">></span>

                    </div>
                </div>
                <div class="current-work-projects">
                    <div class="guide-min">
                        <p>Your current work is equally important. Impress people and tell them more about what you have been up to!</p>
                    </div>
                    
                    <div class="carousel">
                        @php
                        $currentWrks = null;
                        $cw = 1;
                            if(property_exists($data, "currentWork")){
                                $currentWrks = json_decode($data->currentWork);
                            }
                        @endphp

                        <span class="cproject-scroll left-arrow" onclick="scrollCarouselCP(event)"><</span>
                        <div class="card-holder" id="cproject-holder">

                            @foreach ($currentWrks as $cWork)
                                <div class="cproject carousel-card" id="cardcw" onclick="clicked(this)">
                                    <span class="rm-card" id="rm-card" onclick="removeCard(event)">X</span>
                                    
                                    <div class="card-title cproject-title">
                                        
                                    <input type="text" name="cproject{{$cw}}" id="cproject" placeholder="0Type in a quality, skill or experience you posses" value="{{$cWork->title}}">
                                    </div>

                                    <div class="card-detail cproject-detail">
                                        
                                    <textarea name="cprojectdescription1" id="cproject-description" placeholder="describe the skill or experience">{{$cWork->description}}</textarea>
                                    </div>
                                    @php
                                        ++$cw;
                                    @endphp
                                </div>
                                {{-- <script type="application/javascript" defer> stackCards(document.getElementById("cardcw"));</script> --}}
                            @endforeach

                            <span class="add-card" id="add-skill" title="Add a current project or work" onclick="addcproject()">+</span>

                        </div>
                        
                        <span class="cproject-scroll right-arrow" onclick="scrollCarouselCP(event)">></span>

                    </div>
                </div>
            </div>

            <div class="contact row" style=" margin: 0px;">
                <div class="message col-md-6">
                    <p>Leave me a message.</p>
                    <div class="email-message">
                        <textarea name="email-message" id="email-message"  rows="10" placeholder="This is is an example of a message input-area where people visiting your portfolio can write a message to you. You will receive this message in your email."   disabled></textarea>
                        <span class=" btn  btn-gradient btn-rounded" >Send</span>
                        
                        
                    </div>
                </div>
                <div class="contacts col-md-6">
                    <div class="email">
                        <label for="email">This is your email.</label>
                    <input type="text" class="text" name="email" id="email" value="{{$data->email}}">
                    </div>
                    <div class="phone">
                        <label for="phone">Provide a phone number that potential employers can use to contact you</label>
                        <input type="text" class="text" name="phone" id="phone" @if(property_exists($data, "phone")) value="{{$data->phone}}" @endif>
                    </div>
                    <div class="social">
                        <div class="linkedin">
                            <label for="linkedin">Provide your LinkedIn URL</label>
                            <input type="text"  class="text" name="linkedin" id="linkedin"  @if(property_exists($data, "linkedin")) value="{{$data->linkedin}}" @endif>
                        </div>
                        <div class="facebook">
                            <label for="facebook">Provide your Facebook URL</label>
                            <input type="text" class="text" name="facebook" id="facebook" @if(property_exists($data, "facebook")) value="{{$data->facebook}}" @endif>
                        </div>
                        <div class="twitter">
                            <label for="twitter">Provide your Twitter URL</label>
                            <input type="text" class="text" name="twitter" id="twitter"  @if(property_exists($data, "twitter")) value="{{$data->twitter}}" @endif>
                        </div>
                        <div class="instagram">
                            <label for="instagram">Provide your Instagram URL</label>
                            <input type="text" class="text" name="instagram" id="instagram" @if(property_exists($data, "instagram")) value="{{$data->instagram}}" @endif>
                        </div>
                    </div>
                </div>
                
           

            </div>
            <div class="finalizing">
                <div class="guide-min">
                    <p>You are almost there! This is the last step in creating your own portfolio. What remains of you is to
                        confirm that all information you have provided is as accurate as you want it to be. Once satisfied, please click the <span>Preview</span> button bellow to have
                    a sneakpeek of how visitors will see your portfolio. You can still edit your details after the preview. </p>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-gradient btn-rounded">Preview</button>
                </div>
                
            </div>
        </form>
    </div>

</div>

<script type="application/javascript" defer>
                     
    var zooomOut1;
    var board, canvasArea,canvImg, finalImg;
    var ctx = ctx2 = null;
  window.onload = ()=>{

      ////stacking cards automatically
      var skillact = document.getElementById("card");
        skillact.classList.add("active");
        if(skillact){stackCards(skillact);}
        var cwact = document.getElementById("cardcw");
        cwact.classList.add("active");
         if(cwact){stackCards(cwact);}
        var pwact = document.getElementById("cardpw");
        pwact.classList.add("active");
         if(pwact){stackCards(pwact);}

      
        var inputs = document.querySelectorAll( '.inp-portrait-image' );
        //var ctx = null;
        
        canvImg = new Image();
        var canvImg2 = new Image();
        canvImg2.src ="http://lucid.test/images/themes/portfolio%20dark%20theme.jpg";

        var  initImg = new Image();
        initImg.src = "{{$data->portrait}}";
       
        
        var canvasArea = document.getElementById('canvd');
        var board = document.createElement('canvas');
        //console.log(canvasArea);
        
        board.width = canvasArea.clientWidth;
        board.height= 500;
        board.draggable = false;
        ctx2 = board.getContext('2d');
        ctx = board.getContext('2d');
        canvasArea.appendChild(board);
        //console.log(board);
        
        ctx.drawImage(initImg,0,0);
        transformations(ctx);

        //lastX and lastY are the last points to be touched. default set to the middle of canvas
        var lastX = board.width/2;
        var lastY = board.height/2;

        
        
        Array.prototype.forEach.call( inputs, function( input )
        {
           

            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;

            var fileName = '';
            input.addEventListener( 'change', function( e )
            {
              /* 
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else */

                if(this.files){
                    var img = this.files[0];
                    var reader = new FileReader();
                    var readerCanv = new FileReader();
                    var bd = board;
                    //console.log(img.name);
                    reader.readAsDataURL(img);
                    readerCanv.readAsDataURL(img);
                    //var canvImg = new Image();
                    
                    ctx.mozCurrentTransform = [1,0,0,1,0,0]; 
                    canvasArea.appendChild(bd); 
                    

                   readerCanv.onloadend = ()=>{
                       var file;
                        canvImg.src = readerCanv.result;
                   
                    redraw();
                    
                       
                     
                            
                       
                        
                  
                  /* tutaangalia baadaye   
                    ctx.canvas.toBlob((blob) => {
                     file = new File([blob], fileName, {
                        type: 'image/jpeg',
                        lastModified: Date.now()
                    }
                   
                    );
                }, 'image/jpeg', 1);*/
               // console.log(ctx); 
                       
                    }
                    
                   
                    reader.onloadend = () => {
                        $('#port-view').css('background-image', 'url("' + reader.result + '")');
                       
                     }
                  

                }
                
                    fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                    label.innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
        });

        document.getElementById('z-in').addEventListener('click', function(e){
           
            Zoom(1);
        }); 
        document.getElementById('z-out').addEventListener('click', function(e){
           
            Zoom(-1);
            
        }); 
        document.getElementById('clear').addEventListener('click', ()=>{
            alert("width: "+board.width+" Height: "+board.height);
           ctx2.clearRect(0,0, 400,200);
        });
        var dragPoint; var dragged;
        board.addEventListener('mousedown', (evt)=>{
            lastX = evt.offsetX;
            lastY = evt.offsetY;
           
            
            dragPoint = ctx.transformPoint(lastX,lastY);
            
            
            dragged = false;
            

        }, false );
        board.addEventListener('mousemove', (e)=>{
            //remove user selection on the canvas area
        document.body.style.mozUserSelect = document.body.style.webkitUserSelect = document.body.style.userSelect = "none";
        
            lastX = e.offsetX;
            lastY = e.offsetY;

            dragged = true;

            if(dragPoint){
               var point = ctx.transformPoint(lastX,lastY);
               console.log(point.x+" "+point.y);
                ctx.translate(point.x-dragPoint.x, point.y-dragPoint.y);
               
                
                redraw();
            }
            
        }, false );
        board.addEventListener('mouseup', (e)=>{

             //return user selection on the canvas area
        document.body.style.mozUserSelect = document.body.style.webkitUserSelect = document.body.style.userSelect = "auto";
        
            dragPoint = null;
            if (!dragged){
                Zoom(e.shiftKey ? -1 : 1);
            }

        }, true );
        //set the scale factor to 10%
        var scaleFactor = 1.1;

        function Zoom(dir){
           // alert(dir);
            var pt = ctx.transformPoint(lastX, lastY);
            //shift the img to the right
            ctx.translate(pt.x, pt.y);
            //scale the image
            var factor = Math.pow(scaleFactor,dir);
            ctx.scale(factor, factor);
            //shift the img to the left
            ctx.translate(-pt.x, -pt.y);
            

            redraw();
        }
       
        
        

            function redraw(){
                 finalImg = new Image();
                finalImg.src =  board.toDataURL('image/jpeg', 1.0);
               /* console.log(finalImg.width+" "+finalImg.height);
                console.log(board.width+" "+finalImg.height); */

                var imagedatainput = document.getElementById('finalImg');
                imagedatainput.value = finalImg.src;
                
               // console.log(imagedatainput);
                
                   

                var pt1 = ctx.transformPoint(0,0);
                var pt2 = ctx.transformPoint(board.width,board.height);
               // alert(pt2.x+" "+pt2.y);
                ctx.clearRect(pt1.x, pt1.y, pt2.x-pt1.x, pt2.y-pt1.y);
                ctx.save();
                //restore transformation matrix to normal
                ctx.setTransform(1,0,0,1,0,0);

                ctx.clearRect(0,0,board.width,board.height);

                ctx.restore();
                if(canvImg.src == ""){
                    var userImg = new Image();
                    userImg.src = "{{$data->portrait}}"
                    ctx.drawImage(userImg, 0,0);
                } else{
                    ctx.drawImage(canvImg, 0,0);
                }
                
                
               // ctx.drawImage(finalImg, 0,0);
                var filen, fnImg;

               

              
                
               // $('#imagePre').css('background-image', 'url("' + finalsrc + '")');
              
               // finalImg.src =  board.toDataURL('image/jpeg', 1.0);
               
                $('#imagePre').css('background-image', 'url("' + finalImg.src + '")');
               


                
                  

               
              

           
        }

        function initdraw(){
               var  initImg = new Image();
                initImg.src = "{{$data->portrait}}"; //{{"$data->portrait"}}; //board.toDataURL('image/jpeg', 1.0);
               /* console.log(finalImg.width+" "+finalImg.height);
                console.log(board.width+" "+finalImg.height); */

                var imagedatainput = document.getElementById('finalImg');
                imagedatainput.value = initImg.src;
                
             // alert("{{$data->portrait}}");
                        var trImg = document.getElementById('trImg');
                        trImg.src = "{{$data->portrait}}";
                   

                var pt1 = ctx.transformPoint(0,0);
                var pt2 = ctx.transformPoint(board.width,board.height);
               // alert(pt2.x+" "+pt2.y);
                ctx.clearRect(pt1.x, pt1.y, pt2.x-pt1.x, pt2.y-pt1.y);
                ctx.save();
                //restore transformation matrix to normal
                ctx.setTransform(1,0,0,1,0,0);

                ctx.clearRect(0,0,board.width,board.height);

                ctx.restore();
                
                ctx.drawImage(initImg, 0,0);
                var filen, fnImg;

               

              
                
               // $('#imagePre').css('background-image', 'url("' + finalsrc + '")');
              
               // finalImg.src =  board.toDataURL('image/jpeg', 1.0);
               
                $('#imagePre').css('background-image', 'url("' + initImg.src + '")');
           
        }
        //initdraw();
            

            
            
        }
        function zooomOut(){
            alert('okay');
        }
       
        function transformations(ctx){
            
           
            var transMatrix = new DOMMatrix();
            var savedTransformations = [];

           ctx.getTransform = ()=>{
               return transMatrix;
           }

           var saveTransform = ctx.save;
           ctx.save = function(){
               //alert("saved");
               savedTransformations.push(transMatrix.translate(0,0));
               
              return saveTransform.call(ctx);

           }

           var restore = ctx.restore;
           ctx.restore = ()=>{
               transMatrix = savedTransformations.pop();
              // alert("restored");
              // return transMatrix;
              return restore.call(ctx);
               
           }

           var scale = ctx.scale;
           ctx.scale = (px,py)=>{
               //alert('scale');
            transMatrix = transMatrix.scaleNonUniform(px,py);
            return scale.call(ctx, px, py);
           }
           var translate = ctx.translate;
           ctx.translate = (dx, dy)=>{

                transMatrix = transMatrix.translate(dx, dy);
                return translate.call(ctx,dx,dy);
           }

           //var setTrans = 1;//ctx.setTransformation;
           var setTransform =  ctx.setTransform;
            ctx.setTransform = function (a,b,c,d,e,f) {
               
               transMatrix.a = a;
               transMatrix.b = b;
               transMatrix.c = c;
               transMatrix.d = d;
               transMatrix.e = e;
               transMatrix.f = f;

            return setTransform.call(ctx,a,b,c,d,e,f);                                   
           }

           var pt = new DOMPoint();
           var transformPoint = ctx.transformPoint;
           ctx.transformPoint = (px, py)=>{
               
               pt.x = px;
               pt.y = py;
               
               return pt.matrixTransform(transMatrix.inverse());
           }
            

        }

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////* Carousel cards dynamics*/

var s=p=cp=2;
//*add skill funcvtion*/
function addskill(){
            //alert('hihiho');
            var noOfCards = document.querySelectorAll('.quality', '.carousel-card').length;
            
            if(noOfCards <= 20){
           
            var cardHolder = document.getElementById("skill-holder");

            var divCard = document.createElement('DIV');
            divCard.classList.add('quality', 'carousel-card');
            divCard.id = 'card';
            divCard.onclick = function () {
                clicked(divCard);
            }
            divCard.innerHTML = ` <span class="rm-card" id="rm-card" onclick="removeCard(event)">X</span>
                                <div class="card-title quality-title">
                                    
                                    <input type="text" name="quality`+s+`" id="quality" placeholder="Type in a quality, skill or experience you posses">
                                </div>

                                <div class="card-detail quality-detail">
                                    
                                    <textarea name="qualitydescription`+s+`" id="quality-description" placeholder="describe the skill or experience"></textarea>
                                </div>`;
                               
                     
                                
            //cardHolder.innerHTML += newCard;
            divCard.classList.add('active');
            cardHolder.appendChild(divCard);
            stackCards(divCard);
            ++s;
            var projects = document.querySelectorAll('.quality', '.carousel-card');
           inputNames(projects, 'quality');
            }
            
        }
        function addproject(){
            //alert('hihiho');
            var noOfCards = document.querySelectorAll('.project', '.carousel-card').length;
            
            if(noOfCards <= 20){            
            var cardHolder = document.getElementById("project-holder");

            var divCard = document.createElement('DIV');
            divCard.classList.add('project', 'carousel-card');
            divCard.id = 'card';
            divCard.onclick = function () {
                clicked(divCard);
            }
            divCard.innerHTML = ` <span class="rm-card" id="rm-card" onclick="removeCard(event)">X</span>
                                <div class="card-title project-title">
                                    
                                    <input type="text" name="project`+p+`" id="project" placeholder="Type in a project or work you have handled in the past">
                                </div>

                                <div class="card-detail project-detail">
                                    
                                    <textarea name="projectdescription`+p+`" id="cproject-description" placeholder="describe the work or project"></textarea>
                                </div>`;
                               
                                ++p;                   
            //cardHolder.innerHTML += newCard;
            divCard.classList.add('active');
            cardHolder.appendChild(divCard);
            stackCards(divCard);
           var projects = document.querySelectorAll('.project', '.carousel-card');
           inputNames(projects, 'projects');    
            }       
            
        }
        function addcproject(){
            //alert('hihiho');
            var noOfCards = document.querySelectorAll('.cproject', '.carousel-card').length;
            
            if(noOfCards <= 20){
            var cardHolder = document.getElementById("cproject-holder");

            var divCard = document.createElement('DIV');
            divCard.classList.add('cproject', 'carousel-card');
            divCard.id = 'card';
            divCard.onclick = function () {
                clicked(divCard);
            }
            divCard.innerHTML = ` <span class="rm-card" id="rm-card" onclick="removeCard(event)">X</span>
                                <div class="card-title cproject-title">
                                    
                                    <input type="text" name="cproject`+cp+`" id="cproject" placeholder="Type in your current project or work">
                                </div>

                                <div class="card-detail cproject-detail">
                                    
                                    <textarea name="cprojectdescription`+cp+`" id="cproject-description" placeholder="describe the work or project"></textarea>
                                </div>`;
                               
                                
            //cardHolder.innerHTML += newCard;
            divCard.classList.add('active');
            cardHolder.appendChild(divCard);
            console.log('cproject'+cp);
            stackCards(divCard);
            ++cp;
            var projects = document.querySelectorAll('.cproject', '.carousel-card');
           inputNames(projects, 'cproject');
            }
            
        }

        function inputNames(cards, type) {
            console.log(type);
            var i = 1;
            cards.forEach(card => {
                card.children[1].children[0].name = type+i;
                card.children[2].children[0].name = type+'description'+i;

                // console.log(card.children[1].children[0].name);
                // console.log(card.children[2].children[0].name);
                i++;
                
            });
            
        }
function removeCard( e){
    
    e.stopPropagation();
    
    //console.log(e.target.parentElement);
    
    var cardType;
    if(e.target.parentElement.classList.contains('quality')){
        cardType = 'quality';
    }else if(e.target.parentElement.classList.contains('project')){
        cardType = 'project';
    }else{
        cardType = 'cproject';
    }
    
    
    var cards = document.getElementsByClassName(cardType);
    var wasActive = false;
   // alert(`.${cardType}`);
    var actives =document.querySelectorAll(`.active.${cardType}`);
   
    
    var newActive = actives[0];
    
    
    if(e.target.parentElement.classList.contains('active')){
        wasActive = true;
    }
    
    var freeIndex = Array.prototype.indexOf.call(cards, e.target.parentElement); 
    
    
    e.target.parentElement.remove();
    cards = document.getElementsByClassName(cardType);
    if(wasActive){
       
        if(cards[freeIndex] != null){
            var cardss = document.getElementsByClassName(cardType);
            
            newActive = cardss[freeIndex];
            
            newActive.classList.add('active');
            newActive.classList.remove('left-stack');
            newActive.classList.remove('right-stack');
           
            }else{    
                newActive = cards[freeIndex - 1];
               
            newActive.classList.add('active');
            newActive.classList.remove('left-stack');
            newActive.classList.remove('right-stack');
            } 
    }
    
    stackCards(newActive);

    var clanOfCards = document.querySelectorAll(`.${cardType}`, '.carousel-card');
    inputNames(clanOfCards, cardType);
    
}

function scrollCarouselQ(e){
    var cards = document.getElementsByClassName('quality');
    var actives =document.querySelectorAll('.active.quality');
    var currentActive = actives[0];
    var newActive;
    var ActiveIndex = Array.prototype.indexOf.call(cards, currentActive); 
    var lastIndex = cards.length - 1;

    if(e.target.classList.contains('right-arrow')){
    var newActiveIndex = ActiveIndex+1;

        if(cards[newActiveIndex] != null){
                var cardss = document.getElementsByClassName('quality');
            
                newActive = cardss[newActiveIndex];
                
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
            
                }else{    
                    newActive = cards[0];
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
                } 

    } else{
        var newActiveIndex = ActiveIndex-1;

        if(cards[newActiveIndex] != null){
                var cardss = document.getElementsByClassName('quality');
            
                newActive = cardss[newActiveIndex];
                
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
            
                }else{    
                    newActive = cards[lastIndex];
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
                } 

    }
            stackCards(newActive);
}

function scrollCarouselP(e){
    var cards = document.getElementsByClassName('project');
    var actives =document.querySelectorAll('.active.project');
    var currentActive = actives[0];
    var newActive;
    var ActiveIndex = Array.prototype.indexOf.call(cards, currentActive); 
    var lastIndex = cards.length - 1;

    if(e.target.classList.contains('right-arrow')){
    var newActiveIndex = ActiveIndex+1;

        if(cards[newActiveIndex] != null){
                var cardss = document.getElementsByClassName('project');
            
                newActive = cardss[newActiveIndex];
                
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
            
                }else{    
                    newActive = cards[0];
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
                } 

    } else{
        var newActiveIndex = ActiveIndex-1;

        if(cards[newActiveIndex] != null){
                var cardss = document.getElementsByClassName('project');
            
                newActive = cardss[newActiveIndex];
                
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
            
                }else{    
                    newActive = cards[lastIndex];
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
                } 

    }
            stackCards(newActive);
}

function scrollCarouselCP(e){
    var cards = document.getElementsByClassName('cproject');
    var actives =document.querySelectorAll('.cproject.active');    
    var currentActive = actives[0];
    var newActive;
    var ActiveIndex = Array.prototype.indexOf.call(cards, currentActive); 
    var lastIndex = cards.length - 1;

    if(e.target.classList.contains('right-arrow')){
    var newActiveIndex = ActiveIndex+1;

        if(cards[newActiveIndex] != null){
           
                var cardss = document.getElementsByClassName('cproject');                
                newActive = cardss[newActiveIndex];                
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
            
                }else{  
                      
                    newActive = cards[0];
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
                } 

    } else{
        var newActiveIndex = ActiveIndex-1;

        if(cards[newActiveIndex] != null){
                var cardss = document.getElementsByClassName('cproject');            
                newActive = cardss[newActiveIndex];                
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');            
                }else{    
                    newActive = cards[lastIndex];
                newActive.classList.add('active');
                newActive.classList.remove('left-stack');
                newActive.classList.remove('right-stack');
                } 
    }
    console.log('new active '+newActive);
    console.log(newActive);    
            stackCards(newActive);
}


///this is for new created cards
    document.querySelectorAll(".card-holders").forEach(holder=>{
        holder.addEventListener('click', ()=>{
            document.querySelectorAll('.carousel-card').forEach(card=>{
                    card.addEventListener('click', (e)=>{
                        //console.log(e);
                        var thisCard;
                        if(e.target.id == 'card'){
                            thisCard = e.target;
                            deactivateCard(e,thisCard);
                            e.target.classList.remove('left-stack', 'right-stack');
                            e.target.classList.add('active');                           
                            
                        } else{
                            if(e.target.parentElement.id == "card"){
                                thisCard = e.target.parentElement;
                                deactivateCard(e,thisCard);
                                thisCard.classList.remove('left-stack', 'right-stack');
                                thisCard.classList.add('active');                                
                            }else if(e.target.parentElement.id != "card"){
                                thisCard = e.target.parentElement.parentElement;
                                deactivateCard(e,thisCard);
                                thisCard.classList.remove('left-stack', 'right-stack');
                                thisCard.classList.add('active');                                
                            }
                        }
                        stackCards(thisCard);
                    }, false);
                });
        });
    });

function clicked(e) {

    //console.log(e.classList.contains('active'));    
    var thisCard = e;

            if(!thisCard.classList.contains('active')){
            deactivateCard(thisCard);
            thisCard.classList.remove('left-stack', 'right-stack');
            thisCard.classList.add('active');
            stackCards(thisCard);
            }   
   // stackCards(thisCard); */   
}


    function deactivateCard(thisCard){
           // alert('called');
            //console.log(e);
            
            if(thisCard.classList.contains('quality')){
               // alert('quality card');
                var cards = document.getElementsByClassName('quality');
               var index = Array.prototype.indexOf.call(cards, thisCard);
                Array.prototype.forEach.call(cards, card => {
                
                    if(card.classList.contains('active')){
                        card.classList.remove('active');
                    }
                    //console.log(card); 
                    
                    
                });
            }else if (thisCard.classList.contains('project')){
                //alert('projects card');
            }
            //var cards = document.getElementsByClassName('carousel-')
        }

        // window.onload(()=>{
        //     alert('its okay');
        // });

    function stackCards(card){
        var activeCard;
        var cardType;
        if(card.classList.contains('quality')){
            cardType = 'quality';
        }else if(card.classList.contains('project')){
            cardType = 'project';
        }else{
            cardType = 'cproject';
        }
        if(card.classList.contains('active')){
            activeCard = card;
        }else{
            activeCard = document.querySelectorAll('.active', '.quality', `.${cardType}`)[0];
        }
        let cards = document.getElementsByClassName(cardType);
        console.log('the card');
        
        console.log(activeCard.children[1].firstElementChild);
        console.log(activeCard.children[2].firstElementChild);
        
        //console.log(cards);
        
        var length = cards.length;
        var NonActive = length - 1; //lenght of cards not active
        var activeIndex = Array.prototype.indexOf.call(cards, activeCard); //index of active cards
        console.log(activeIndex+" active index");
        
        var noLeftcards = Math.trunc(NonActive/2); //number of cards on the left
        var noRightcards = NonActive - noLeftcards; //number of cards on the right
        var arrayR = cardsOnRight.call(); //an array of card indexes on the right
        var arrayL = cardsOnLeft.call();//an array of card indexes on the left

        
        function cardsOnRight() {
            var i = 1;
            var j = activeIndex + 1;
            arrayR = [];
            while(i<=noRightcards){

                if(j < length){
                    arrayR.push(j);
                }else{
                    arrayR.push(j-length);
                }
                
                
                ++j;
                ++i;
            }

            return arrayR;
        }
        function cardsOnLeft() {
            var i = noLeftcards;
            var j = activeIndex - 1;
            arrayL = [];
            while(i > 0){
                if(j>=0){
                    arrayL.push(j);
                } else{
                    arrayL.push(j + length);
                }
               
                --j;
                --i;
            }
            return arrayL;
        }
       // console.log(arrayL);
       // console.log(arrayR);
        cardsOnRight();
        cardsOnLeft();
        //arrayR.reverse();
        var sl = sr = maxscale = 0.8;
        var tl = tr = 10;
        var zr = zl = 20;
        var minscale = 0.5;
        var scalediff = maxscale - minscale;
        var scalefactor = scalediff/noRightcards;
        arrayL.forEach(card => {
            cards[card].classList.remove('right-stack');
            if(cards[card].classList.contains('active')){
                
            }
            cards[card].classList.remove('active');
            cards[card].classList.add('left-stack');
            cards[card].style.transform = 'scale('+sl+','+sl+') translateX('+-tl+'px)';
            cards[card].style.zIndex = ''+zl+'';
            sl = sl - scalefactor;
           // cards[card].style.transform = 'translateX('+-tl+'px)';
            tl += 40;
            --zl;
            //console.log(cards[card]);
            
           // console.log(tl+' the left translate');
            
        });
        arrayR.forEach(card => {
            cards[card].classList.remove('left-stack');
            cards[card].classList.remove('active');
            cards[card].classList.add('right-stack');
            cards[card].style.transform = 'scale('+sr+','+sr+') translateX('+tr+'px)';
            cards[card].style.zIndex = ''+zr+'';
            sr = sr - scalefactor;
           // cards[card].style.transform = 'translateX('+tr+')';
            tr += 40;
            --zr;
            console.log(cards[card]);
            
            console.log(tr+' the right translate');
        });

        console.log(arrayL); console.log(arrayR);
        
        


    }

    window.onloadeddata = function () {
        
    }

   

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        
        
    </script>





@endsection