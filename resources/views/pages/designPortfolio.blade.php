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
                            <input type="file" name="intro-portrait" id="intro-portrait" class="inp-portrait-image">
                            <label for="intro-portrait">Upload high quality portrait</label>
                        </div>
                        <script type="application/javascript">
                        /*    var input = document.getElementById('intro-portrait');
                            var label = input.nextElementSibling; 
                            var labelVal = label.innerHTML;

                           
                            //console.log(input);
                            function filename(){
                                console.log('bs bs');
                                var fileName = '';
                                console.log(input.file);
                                
                                if('files' in input){
                                    console.log('yes'+ input.files.length);
                                     
                                } else{
                                    console.log('no');
                                    
                                }
                                
                                console.log(input.files[0]);
                                
                                
                            }*/
                            var inputs = document.querySelectorAll( '.inp-portrait-image' );
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
                                        console.log(img.name);
                                        reader.onloadend = function () {
                                            $('#port-view').css('background-image', 'url("' + reader.result + '")');
                                         }
                                         reader.readAsDataURL(img);

                                    }
                                    
                                        fileName = e.target.value.split( '\\' ).pop();

                                    if( fileName )
                                        label.innerHTML = fileName;
                                    else
                                        label.innerHTML = labelVal;
                                });
                            });
                            
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
<script src="{{asset('js/croppic.min.js')}}"></script>




@endsection