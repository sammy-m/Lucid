@extends('layouts.clientside')

@section('content')
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Francois One' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Overpass' rel='stylesheet'>


<link rel="stylesheet" type="text/css" href={{url('css/landing.css')}}>

<div class="happy-question" id="happy-question">
   <br> <br> <br> <br>
    <div class="svg">
        <svg height='800px' width='700px'> 
            <g>

                    <rect width="698px" height="798px" style="fill:rgba(0, 230, 230, 0.8)"></rect>
                           
            
                            <text x="10%" y="100" font-family='Verdana' font-size='40pt' style="fill:white;">STUCK WITH
                                    <tspan x="10%" y="150">YOUR</tspan>
                                    <tspan x="10%" y="200">HOMEWORK?</tspan>
                                  </text>

                                  <text x="10%" y="250" font-family='fantacy' font-size='14pt' style="fill:white;"> No need to struggle and spend
                                        <tspan x="10%" y="280">sleepless nights doing assignments. </tspan>
                                        <tspan x="10%" y="310">Let professionals work for you!</tspan>
                                       
            
                                    </text>

                                    <a xlink:href="/manage/register" target="_top">
                                    <rect x="10%" y="400" rx="40" ry="100" width="250" height="70"
                                    style="fill:rgb(26, 83, 255);opacity:1" />

                                   
                                        <text x="15%" y="440" font-size='16pt' font-family='Impact, Charcoal, sans-serif' style="fill:white; text-anchor: left">DO MY HOMEWORK</text>
                                      </a>
            

            </g>
           
            
        </svg>
    </div>
</div>
<div class="benefits">
    <div class="title" style="text-align:center;">
        <h3>BENEFITS</h3> 
       
        <svg height="10" width="100">
            <line x1="0" y1="0" x2="100" y2="0" style="stroke:rgb(255,0,0);stroke-width:20">
        </svg>

    </div>
    <div class="row row-blue">
        <div class="col" style="text-align:center;">
                <span>
                        <img src="https://homeworkforme.com/theme/whitelabel7/images/benefits-icons-01.svg" alt="benefits-icon"> <br>
                    </span> <br>
            <h4> <p>100% original</p> </h4>
            <h4> <p>papers</p> </h4>
            <p>Our papers are unique,</p>
            <p>checked for plagiarism and</p>
            <p>custom written just for you.</p>
        </div>
        <div class="col" style="text-align:center;">
                <span>
                        <img src="https://homeworkforme.com/theme/whitelabel7/images/benefits-icons-03.svg" alt="benefits-icon">
                    </span> <br> <br>
                <h4> <p>100%</p> </h4>
                <h4> <p>privacy</p> </h4>
                
                <p>We do not disclose any</p>
                <p>personal information and</p>
                <p>with us everything is safe</p>
                <p>and secure.</p>
        </div>
        <div class="col" style="text-align:center;">
                <span>
                        <img src="https://homeworkforme.com/theme/whitelabel7/images/benefits-icons-02.svg" alt="benefits-icon">
                    </span> <br> <br>
                <h4> <p>Best experts</p> </h4>
                 
                <p>Our homework helpers are</p>
                <p>experienced in many subjects</p>
                <p>and are ready to</p>
                <p>provide homework help</p>
        </div>
        <div class="col" style="text-align:center;">
                <span>
                        <img src="https://homeworkforme.com/theme/whitelabel7/images/benefits-icons-04.svg" alt="benefits-icon">
                    </span> <br> <br>
                <h4> <p>24/7 online</p> </h4>
                <h4> <p>support</p> </h4>
                <p>Give us a call, chat with us</p>
                <p>or send an e-mail -</p>
                <p>we are always ready</p>
                <p>to assist</p>
        </div>
    </div>
</div>

<div class="good-grades">

    <div class="row">
        <div class="col" >
            <svg width='100%' height="700px" xmlns="http://www.w3.org/2000/svg">
                   
                       <g>

                            <defs>
                                    <pattern id="img1" patternUnits="userSpaceOnUse" width="400" height="auto">
                                      <image xlink:href="/images/backgroundImages/home_first_screen_bg.jpg" x="0" y="0" width="50px" height="50px" />
                                    </pattern>

                                   
                                  </defs>

                <rect width="400" height="500px"  x='150' y="100" style="fill:transparent; stroke:#66a3ff; stroke-width:5px;">

                </rect>

                <rect width="400px" height="500px" x='200' y="70" style="fill=url(#img1); stroke:#66a3ff; stroke-width:5px;">

                    </rect>

                    <image x='200' y="70" xlink:href="/images/backgroundImages/home_prof_essay_img.jpg" height="500px" width="400px" preserveAspectRatio="xMidYMid slice" style=""/>
                
                       </g>
                       
                     
                  
            </svg>

        </div>
        <div class="col" style=" text-align:left;">

                <div class="home_prof_essay_item" style="padding-right:20%; padding-top:100px;">
                        <h1 style="font-family: Archivo Black; color: #3333ff;">DO MY HOMEWORK AND MAKE SURE I GET GOOD GRADES!</h1>
                        <b></b>
                        <p style="font-family: Overpass; color:#4d4d4d; font-size:16pt;">Have you been struggling to complete all of your school or college homework?
                            Now is a good time to speak to homeworkforme.com to find out how we can give you some academic assistance.
                            </p>
            
                        <p style="font-family: Overpass; color:#4d4d4d; font-size:16pt;">We help students all over the world to reach their goals and achieve maximum success at every stage of their education.
                            We guarantee that you won’t be disappointed if you contract one of our professional writers.</p>
                    </div>

        </div>
    </div>
</div>

<div class="testimonials" >
    <div class="picture-heading" style="position:relative;">
            <p id="heading">TESTIMONIALS</p>

            <div class="float-pane" style="height: 500px; width: 75%; background-color: white; position:absolute; top:500px; left:13%;">

                </div>
    </div>
</div>
    <br> <br> <br>  <br> <br> <br>  <br> <br> <br>
    <section class="succeed">
        <div class="row">
            <div class="col" style="text-align:left; width:50%; padding-left:15%; padding-right:1px; margin:0;">
                    <h2 style="font-family: Francois One; font-size:30pt; color:royalblue; text-transform: uppercase;">Do my homework for me and help me succeed</h2>
                    <b></b>
        <p style="font-family: Overpass; color:#4d4d4d; font-size:16pt;">“What happens when you do my homework for me?” This is one of the first questions prospective clients always ask us.
            Many people reach out to us when they are struggling and are unsure how anyone can make things easier for them.
            Our experts are highly trained individuals with a long background in providing support to students,
            so we are able to improve your knowledge and the standard of your assignments by offering you homework help.</p>
        
            </div>
            <div class="col" style=" padding-left:1px;">

                    <svg width='100%' height="700px" xmlns="http://www.w3.org/2000/svg">
                   
                        <g>
 
                             <defs>
                                     <pattern id="img1" patternUnits="userSpaceOnUse" width="400" height="auto">
                                       <image xlink:href="/images/backgroundImages/home_first_screen_bg.jpg" x="0" y="0" width="50px" height="50px" />
                                     </pattern>
 
                                    
                                   </defs>
 
                 <rect width="350" height="450px"  x='85' y="100" style="fill:transparent; stroke:#66a3ff; stroke-width:5px;">
 
                 </rect>
 
                 <rect width="350px" height="450px" x='50' y="70" style="fill=url(#img1); stroke:#66a3ff; stroke-width:5px;">
 
                     </rect>
 
                     <image x='50' y="70" xlink:href="/images/backgroundImages/home_experts_img.jpg" height="450px" width="350px" preserveAspectRatio="xMidYMid slice" style=""/>
                 
                        </g>
                        
                      
                   
             </svg>
 

            </div>
        </div>
    </section>

    <section class="step">
            <div class="steps" >
                    <div class="picture-heading" style="position:relative;">
                            <p id="heading" style="  font-size:120px;
                            color: rgb(0, 153, 204, 0.4);">EASY  STEPS</p>
                            <P style="color: rgb(0, 153, 204, 0.4); font-size:40pt">TO A PERFECT ESSAY</P>
                
                            <div class="float-pane" style="height: 300px; width: 75%; background-color: white; position:absolute; top:600px; left:13%;">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col"><h1>1.</h1></div>
                                                <div class="col"><p>provide your instructions.</p></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                                <div class="row">
                                                        <div class="col"><h1>2.</h1></div>
                                                        <div class="col">let the writer do the job.</div>
                                                    </div>
                                        </div>
                                        <div class="col">
                                                <div class="row">
                                                        <div class="col"><h1>3.</h1></div>
                                                        <div class="col"><p>download your paper.</p></div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>

                

    </section>
    <br> <br> <br>  <br> <br> <br>  <br> <br> <br>

    <section class="last-minute">
            <div class="good-grades">

                    <div class="row">
                        <div class="col" >
                            <svg width='100%' height="700px" xmlns="http://www.w3.org/2000/svg">
                                   
                                       <g>
                
                                            <defs>
                                                    <pattern id="img1" patternUnits="userSpaceOnUse" width="400" height="auto">
                                                      <image xlink:href="/images/backgroundImages/home_first_screen_bg.jpg" x="0" y="0" width="50px" height="50px" />
                                                    </pattern>
                
                                                   
                                                  </defs>
                
                                <rect width="400" height="500px"  x='150' y="100" style="fill:transparent; stroke:#66a3ff; stroke-width:5px;">
                
                                </rect>
                
                                <rect width="400px" height="500px" x='200' y="70" style="fill=url(#img1); stroke:#66a3ff; stroke-width:5px;">
                
                                    </rect>
                
                                    <image x='200' y="70" xlink:href="/images/backgroundImages/home_subject.jpg" height="500px" width="400px" preserveAspectRatio="xMidYMid slice" style=""/>
                                
                                       </g>
                                       
                                     
                                  
                            </svg>
                
                        </div>
                        <div class="col" style=" text-align:left;">
                
                                <div class="home_prof_essay_item" style="padding-right:20%; padding-top:100px;">
                                        <h1 style="font-family: Archivo Black; color: #3333ff; text-transform:capitalize;">Get homework done at the very last minute</h1>
                                        <b></b>
                                        <p style="font-family: Overpass; color:#4d4d4d; font-size:16pt;">“Please do my homework urgently!” We receive a large number of emails with this title in the subject line. We understand how confusing and stressful university can be, so our company has developed a service that allows you to make last-minute orders.
                                            </p>
                            
                                        <p style="font-family: Overpass; color:#4d4d4d; font-size:16pt;">If you leave an assignment too late, or you don’t think you’ll manage to finish it before the deadline, the best thing to do is place an order with our customer services team and we will make sure we prioritise it. You will then receive the completed document in a matter of days.</p>
                                    </div>
                
                        </div>
                    </div>
                </div>
    </section>

    <section class="mwisho-mwisho">
        <div class="mwisho">
            <div class="row">
                <div class="col">
                        <h3 style="margin-right: 0;">Benefit from homework help online</h3>
                        <b></b>
                        <p>We do everything online because we believe it is most beneficial for both the clients and our writers. We want everybody to be able to access cheap academic services, so we have cut down on costs greatly by running a business over the internet.
                            When you say “do my homework” and place an order with our team,
                            we will put you in touch with the person working on your project immediately,
                            meaning that you can send them a message at any time during the collaboration.
                            Don’t worry if you don’t receive an immediate reply, as we may be gathering all
                            of the relevant information before we get back to you. Upon completion, we will
                            send you your document via email; you then have up to ten days to read through the
                            assignment and request any final alterations (if necessary). This service is usually included for free!</p>
                </div>
                <div class="col">
                        <h3 style="margin-right: 0;">Complete my homework for me NOW</h3>
                        <b></b>
                        <p>
                       “So, can you write my homework for me today?” No problem! If you place your order today we will assign you a writer immediately.
                            Please bear in mind that none of our college papers are pre-written, so we will negotiate a deadline with you when you
                            get in touch. If you would like to request a non-urgent assignment, we can probably offer you a cheap deal,
                            as we currently have lots of great discounts to be enjoyed. We include reference and title pages for free,
                            as well as a high-quality plagiarism check. Our customer services team can be reached via phone or email at
                            any time of the day or night, so please don’t hesitate to contact us with any further questions. If you’re ready to succeed,
                            just send us an email saying, “Do my homework for me” – we’ll be in touch in no time!</p>
                </div>
            </div>
        </div>
    </section>

    <footer style="text-align:center;">
            <div class="footer_wrap" style="background-color:#0d0d0d !important;">
                <div class="footer_item">
                   <span style="color:white;">&copy; 2019 DoMyHomework.com. All rights reserved</span>
                </div>
                <div class="footer_item" style="color:white;">
                            <div class="to_blog">
                                Read our <a href="/blog/">blog</a>
                            </div>
                        </div>
                <div class="footer_item">
                    <img src="https://homeworkforme.com/theme/whitelabel7/images/credit-cards-img.png" alt="credit-cards">
                </div>
            </div>
        </footer>
   
    




@endsection