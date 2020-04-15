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
    <div class="main" style="">
        <form action="" method="POST">
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
                        <input type="radio" name="theme" id="dark" value="dark">
                        <div class="box-preview" id="box-dark"></div>
                        <span>Dark Theme</span>
                    </label> 
                    <label class="light">
                        <input type="radio" name="theme" id="light" value="light">
                        <div class="box-preview" id="box-light"></div>
                        <span>Light Theme</span>
                    </label>
                    <label class="vibrant">
                        <input type="radio" name="theme" id="vibrant" value="vibrant">
                        <div class="box-preview" id="box-vibrant"></div>
                        <span>Vibrant Theme</span>
                    </label>
            </div>
            <div class="about">
                <div class="svg-wave" style="height: 82px;">
                    <span class="divsep" >
                    <img src="{{asset('/images/svg bg/wavy.svg')}}" alt="">
                    </span>
                </div>
                <div class="intro">
                    <div class="guide-min">
                    <p>Welcome your viewers with a greeting! Tell them your name and occupation. You can also provide an image of yourself that will appear</p>
                    </div>
                    <div class="intro-greetings">
                        <div class="greetings-text">
                        <p>Hi! I am</p>
                        <input type="text" name="name" id="name" placeholder="Enter your name...">
                        <div class="occupation">
                            <p>I</p>
                            <input type="text" name="occupation" id="occupation"  placeholder="am an architect working with Doe Company">
                        </div>
                        </div>
                        <div class="greetings-portrait" id="port-view">
                            <input type="file" name="intro-portrait" id="intro-portrait" class="inp-portrait-image" accept="image/*">
                            <label for="intro-portrait">Upload high quality portrait</label>
                            <div id="canvd"></div>

                            <div class="img-sizing">
                               <span class="btn" id="z-in">+</span>
                               <span class="btn" id="z-out" >-</span>
                               <span id="clear" class="btn">clear</span>
                            </div>
                        </div>
                        
                        
                        <script type="application/javascript" defer>
                        var zooomOut1;
                        var board, canvasArea,canvImg;
                        var ctx = ctx2 = null;
                      window.onload = ()=>{
                            var inputs = document.querySelectorAll( '.inp-portrait-image' );
                            //var ctx = null;
                            
                            canvImg = new Image();
                            var canvImg2 = new Image();
                            canvImg2.src ="http://lucid.test/images/themes/portfolio%20dark%20theme.jpg";
                            var five=5, two=2;
                            //console.log(document.getElementById('canvd') +'yass');
                           /* var canvasArea = document.getElementById('canvd');
                            var board = document.createElement('canvas');
                            canvasArea.appendChild(board);*/
                            var canvasArea = document.getElementById('canvd');
                            var board = document.createElement('canvas');
                            board.width = 700;
                            board.height= 350;
                            board.draggable = false;
                            ctx2 = board.getContext('2d');
                            ctx = board.getContext('2d');
                            canvasArea.appendChild(board);
                            console.log(board);
                            
                            ctx.drawImage(canvImg2,0,0);
                            transformations(ctx);

                            //lastX and lastY are the last points to be touched. default set to the middle of canvas
                            var lastX = board.width/2;
                            var lastY = board.height/2;

                            //remove user selection on the canvas area
                            document.body.style.mozUserSelect = document.body.style.webkitUserSelect = document.body.style.userSelect = "none";
                            
                            
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
                                        //console.log(board);
                                        
                                        
                                    
                                        
                                        //ctx.drawImage(canvImg, 0, 0);
                                       
                                       // console.log(five+two);
                                       
                                        
                                        
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
                                    var pt1 = ctx.transformPoint(0,0);
                                    var pt2 = ctx.transformPoint(board.width,board.height);
                                   // alert(pt2.x+" "+pt2.y);
                                    ctx.clearRect(pt1.x, pt1.y, pt2.x-pt1.x, pt2.y-pt1.y);
                                    ctx.save();
                                    //restore transformation matrix to normal
                                    ctx.setTransform(1,0,0,1,0,0);

                                    ctx.clearRect(0,0,board.width,board.height);

                                    ctx.restore();
                                    
                                    ctx.drawImage(canvImg, 0,0);

                               
                            }
                                

                                
                                
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
                                   //alert(a+' '+b+' '+c+' '+d+' '+e+' '+f);
                                   //console.log(transMatrix);
                                   
                                   transMatrix.a = a;
                                   transMatrix.b = b;
                                   transMatrix.c = c;
                                   transMatrix.d = d;
                                   transMatrix.e = e;
                                   transMatrix.f = f;
                                   //console.log(transMatrix);

                                return setTransform.call(ctx,a,b,c,d,e,f);
                                   
                               }

                               var pt = new DOMPoint();
                               var transformPoint = ctx.transformPoint;
                               ctx.transformPoint = (px, py)=>{
                                   
                                   
                                   
                                   pt.x = px;
                                   pt.y = py;
                                   //transMatrix.m11 = 0;
                                  
                                   

                                   return pt.matrixTransform(transMatrix.inverse());

                               }
                                

                            }

                            
                            
                        </script>
                   
                        
                    </div>
                </div>
                <div class="bio">
                    <div class="guide-min">
                        <p>A short story about yourself is important in telling the world about yourself. Make it as captivating and interesting as it can be.</p>
                    </div>
                    
                    <label for="bio">Write a brief description (Bio) of yourself</label>
                    <input type="text" name="bio" id="bio" placeholder="Type your Bio...">
                </div>
                <div class="skills-experience">
                    <div class="guide-min">
                        <p>Skills and experience speak a lot about your qualifications and capabilities. Tell people about the experince that you have. Do not shy away from letting
                            people know about your skills either.
                        </p>
                    </div>
                    
                    <span><</span>
                    <div class="quality">
                        <label for="quality">skill / Experience</label>
                        <input type="text" name="quality" id="quality" placeholder="Type in a quality, skill or experience you posses">
                        <label for="quality-description">Describe the skill/experience</label>
                        <input type="text" name="quality description" id="quality-description">
                    </div>
                    <span>></span>
                </div>
            </div>

            <div class="projects">
                <div class="past-work-projects">
                    <div class="guide-min">
                        <p>Tell us about the exciting projects and achievements that you have had previously.</p>
                    </div>
                    
                    <span><</span>
                    <div class="past-activity">
                        <label for="past-project">Type a project you have done in the past</label>
                        <input type="text" name="past-project" id="past-project" placeholder="project">
                        <label for="past-project-description">Tell people more about the project</label>
                        <input type="text" name="past-project-description" placeholder="tell us more about this project...">
                    </div>
                    <span>></span>
                </div>
                <div class="current-work-projects">
                    <div class="guide-min">
                        <p>Your current work is equally important. Impress people and tell them more about what you have been up to!</p>
                    </div>
                    
                    <span><</span>
                    <div class="current-activity">
                        <label for="current-project">Type a project you are currently handling</label>
                        <input type="text" name="current-project" id="current-project" placeholder="project">
                        <label for="current-project-description">Tell people more about this project</label>
                        <input type="text" name="current-project-description" placeholder="tell us more about this project...">
                    </div>
                    <span>></span>
                </div>
            </div>

            <div class="contact row" style="background-color: red; margin: 0px;">
                <div class="message col-md-6">
                    <p>Leave me a message.</p>
                    <div class="email-message">
                        
                    </div>
                </div>
                <div class="contacts col-md-6">
                    <div class="email">
                        <label for="email">This is your email.</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="phone">
                        <label for="phone">Provide a phone number that portental employers can use to contact you</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                    <div class="social">
                        <div class="linkedin">
                            <label for="linkedin">Provide your LinkedIn URL</label>
                            <input type="text" name="linkedin" id="linkedin">
                        </div>
                        <div class="facebook">
                            <label for="facebook">Provide your Facebook URL</label>
                            <input type="text" name="facebook" id="facebook">
                        </div>
                        <div class="twitter">
                            <label for="twitter">Provide your Twitter URL</label>
                            <input type="text" name="twitter" id="twitter">
                        </div>
                        <div class="instagram">
                            <label for="instagram">Provide your Instagram URL</label>
                            <input type="text" name="instagram" id="instagram">
                        </div>
                    </div>
                </div>
                
                

            </div>
        </form>
    </div>

</div>





@endsection