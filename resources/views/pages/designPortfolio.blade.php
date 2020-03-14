@extends('layouts.clientside')


@section('content')

<link rel="stylesheet" href="{{asset('css/portfolio.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<script src="https://kit.fontawesome.com/ea2b59a1e2.js" crossorigin="anonymous"></script>

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
    <div class="main" style="background-color: yellow;">
        <form action="" method="POST">
            <div class="guide">
                <p>You are just a few steps to designing your amazing portfolio. <br> With just a few clicks and a little typing, you will have a state of the art portfolio
                    that will woo your next employers or financiers. <br>
                    Lets get started!
                </p>
            </div>
            <div class="theme">
                <p>Lucid is endevored to creating that personalized look and feel of your portfolio. You can select a theme of your liking from the available options.</p>
                <label for="theme">Pick your prefered theme.</label> <br>
                    <label>
                        <input type="radio" name="theme" id="dark" value="dark">
                        <div class="box-preview" id="box-dark"></div>
                        <span>Dark Theme</span>
                    </label> 
                    <label>
                        <input type="radio" name="theme" id="light" value="light">
                        <div class="box-preview" id="box-light"></div>
                        <span>Light Theme</span>
                    </label>
                    <label>
                        <input type="radio" name="theme" id="vibrant" value="vibrant">
                        <div class="box-preview" id="box-vibrant"></div>
                        <span>Vibrant Theme</span>
                    </label>
            </div>
            <div class="about">
                <div class="intro">
                    <p>As a welcoming salutation, please provide your name and occupation.</p>
                    <div class="intro-greetings">
                        <p>Hi! I am</p>
                        <input type="text" name="name" id="name" placeholder="Enter your name...">
                        <div class="occupation">
                            <p>I</p>
                            <input type="text" name="occupation" id="occupation" placeholder="am an architect working with Doe Company">
                        </div>
                    </div>
                </div>
                <div class="bio">
                    <label for="bio">Write a brief description (Bio) of yourself</label>
                    <input type="text" name="bio" id="bio" placeholder="Type your Bio...">
                </div>
                <div class="skills-experience">
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