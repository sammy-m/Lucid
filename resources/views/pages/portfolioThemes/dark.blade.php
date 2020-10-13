<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="black">
<title>Sam | Lucid portfolio</title>
<link rel="icon" href="images/sm-img/icon.png">
<link rel="stylesheet" type="text/css" href="/css/darktheme.css">
<link rel="stylesheet" href="/css/aos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
<!-- MDBootstrap -->
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="/css/style.css">

<script src="/js/aos.min.js"></script>
<script src="/js/darktheme.js"></script>
<script src="/js/long-shadow.js"></script>
	
</head>

<body>
	
			
<div class="container">
	  <nav>
		  <div class="logo">
      <a href="/">  <img src="images/icons/logo.svg" alt="SAM.LOGO" id="logo" height="50"> </a>  
    </div>
		  <div class="nav-container">
			   <div class="colapsible-nav">
				   <div id="menuBtn" class="menu-button">
				   <span class="m-btn-slices"></span>
					<span class="m-btn-slices"></span>
					<span class="m-btn-slices"></span>
					   
				   </div>
			  	<ul id="menuList" class="ml-auto navbar-navs">
					<li class="nav-item"><a class="active-link" id="home" href="#home">Home</a></li>
					<li class="nav-item"> <a id="about" href="#about">About</a></li>
					<li class="nav-item"><a id="work" href="#work">Work</a></li>
					<li class="nav-item"><a id="contacts" href="#contacts">Contacts</a></li>
				</ul>
			  </div>
		  </div>
		</nav>
		<div class="content">
			<div class="landing" id="phome">
				<canvas id="canvas"></canvas>
			  <div class="intro-writeup">
                    <h1 id="greet"></h1>
                    @php
                        $data = json_decode($data);
                    @endphp
              <p style="display: none;" id="nameText">I am {{$data->name}}</p>
					<h2 id="nm"></h2>
              <p>I {{$data->profession}}</p>
				</div>
				
					
				
			</div>
			<div class="about" id="pabout">
				<div class="row">
					<div class="col-md-12 col-lg-6 b-left">
						<div class="sec-header" data-aos="fade-up" data-aos-duration="1000" >
							<h2>Get To Know Me.</h2>
						</div>
						<div class="bio" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                        <p>{{$data->bio}}</p>
						</div>
					</div>
					<div class="col-md-12 col-lg-6 b-right">
					<img src="images/me2.png"  alt="sammy" data-aos="fade-up" data-aos-duration="3000" data-aos-delay="0" width="400">
					</div>
				</div>
				<div class="skills">
					<h2 data-aos="fade-up" data-aos-duration="1000">What I Do.</h2>
					<p data-aos="fade-up" data-aos-duration="1500">I take pride in all that I do. With that in mind, I strive to ensure perfection. Quality, I believe, is not debateable.</p>
			<div class="row">
                @php
                            $skills = json_decode($data->skills);                            
                        @endphp

                        @foreach ($skills as $skill)
                        <div class="col-md-6 col-sm-12 s-mt">
                            <div class="skill" data-aos="fade-up" data-aos-duration="1500">
                                <div class="s-icon sk"></div>
                                <h4>{{$skill->title}}</h4>
                                <p>{{$skill->description}}</p>
                            </div>
                        </div>
                        @endforeach
				{{-- <div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
                        <div class="s-icon sk"></div>
                        <h4>Programing</h4>
						<p>I have immense skills in C, R, Java, PHP, JavaScript, Vue.js, MEARN stack, and Python.</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>Algorithm Design</h4>
						<p>I believe that every pice of program should solve its task in the most efficient way possible</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>Web Design</h4>
						<p>I have great skills in UI, UX, and web immerging technologies such as React, Angular, and Vue.</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>Photoshop</h4>
						<p>Through freelance and graphical design gigs, I have perfected my skills in Adobe Photoshop.</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>Graphic Design</h4>
						<p>Graphical design using tools such as Adobe Illustrator. I consider this as one of my hobbies.</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>Databases</h4>
						<p>Knowledge and experience in SQL, mySQL, and MongoDB. I also have skills in DB indexing and optimization</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>SEO</h4>
						<p>I do SEO optimization as part of my freelance. I also design web applications with Search Indexing in mind.</p>
					</div>
					</div>
				<div class="col-md-6 col-sm-12 s-mt">
					<div class="skill" data-aos="fade-up" data-aos-duration="1500">
						<div class="s-icon sk"></div>
						<h4>Cyber Security</h4>
						<p>I am an enthusiast for cybersecurity. I have knowledge in the security of information systems.</p>
					</div>
					</div> --}}
				</div>
				</div>

			</div>
<div class="wwm">
	<div class="cta">
		<h2 data-aos="fade-up" data-aos-duration="1000">Want to work with me?</h2>
		<p data-aos="fade-up" data-aos-duration="1500">That is great! It would be a pleasure. Please contact me and share your idea with me.</p> <br>
		<span id="wt" class="dt-button custom-bts" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
		Let's work together!
		</span>
	</div>
</div>
			
<div class="work" id="pwork">
	<div class="recent-work">
        @if (property_exists($data, "previousWork"))
        <h2 data-aos="fade-up" data-aos-duration="1000">Recent Work</h2>
        @endif
		<div class="row tiles">
            @if ($data->previousWork)
                @php
                  $pworks = json_decode($data->previousWork);
                @endphp

                @foreach ($pworks as $pwork)
                <div class="tile tiler" data-aos="fade-up" data-aos-duration="1500">
                    <div class="w-desc wd wdi waves-effect ">
                    <div class="wo-desc">
                    <h4>{{$pwork->title}}</h4>
                    <p>{{$pwork->description}}</p>
                    </div>					
                    </div>
                </div>
                @endforeach               
            @endif

			{{-- <div class="tile tiler" data-aos="fade-up" data-aos-duration="1500">
				<div class="w-desc wd wdi waves-effect ">
				<div class="wo-desc">
					<h4>SEO</h4>
					<p>After entrusting me to manage their Search Engine Optimization, <a href="https://rubikstech.co.ke">RubiksTech</a> now boasts of improved search results. This has boosted thier clientelle by up to 40%.</p>
				</div>					
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
				<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>Project Manager - EUCOSSA</h4>
						<p> I am the former Project Manager for Egerton University Computer Science Students Association (<a href="https://twitter.com/eucossake?lang=en">EUCOSSA</a>). Here, I got to develop and apply teams and project management skills </p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>Software Developer - CoElib</h4>
						<p>Working at <a href="https://coelib.org/">CoElib</a> nurtured my skills in team-work and rubust systems development. At CoElib, I undertook various software projects as well as Business Training by <a href="#">QPoint</a>.</p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>Product Designer - DetaWald</h4>
						<p> I was part of a larger team at <a href="https://detawald.org/">DetaWald</a> that consulted for various clients and helped them design their products while offering advice on all matters IT. </p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>Graphic Design</h4>
						<p>I have participated in and freelanced in numerous graphical design works through which I have gained substancial skills in Adobe Photoshop and Adobe Illustrator. </p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>StartUp - Lucid</h4>
						<p>Lucid is a startup that empowers corporate individuals through easy, fast, and cost efficient design of state of the art online portfolios. <br>
						 <strong> <small>E.T.A: 15 July 2020</small></strong></p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>Software Development</h4>
						<p> While still a student at Egerton University,I consulted with the Directorate of University Welfare and developed their complaint ticketing and follow-up system.</p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>StartUp - Gadgeteers</h4>
						<p><a href="#">Gadgeteers</a>, as a brand, is a community of people who love tech gadgets, computing and gaming devices, phones etc. Gadgeteers is a tech-hub that connects these people while providing gadgets at friendly prices.</p>
					</div>
				
				</div>
			</div>
			<div class="tile" data-aos="fade-up" data-aos-duration="1500">
			<div class="w-desc wd wdi waves-effect">
					<div class="wo-desc">
						<h4>StartUp - UrbanFit</h4>
						<p><a href="#">UrbanFit</a> is an E-commerce platform that specializes in clotheware and general fasion for all sexes and ages. <br>
							<strong><small>E.T.A : 1 Nov 2020</small></strong> </p>
					</div>
				
				</div>
			</div> --}}
		</div>
    </div>
    @if (property_exists($data, "currentWork"))
	<div class="current-work">
            <h2 data-aos="fade-up" data-aos-duration="1000">Current Work</h2>
            <div class="row tiles">
                
                    @php
                        $cworks = json_decode($data->currentWork);
                    @endphp

                    @foreach ($cworks as $cwork)
                    <div class="tile tiler" data-aos="fade-up" data-aos-duration="1500">
                        <div class="w-desc wd wdi waves-effect ">
                        <div class="wo-desc">
                        <h4>{{$cwork->title}}</h4>
                        <p>{{$cwork->description}}</p>
                        </div>					
                        </div>
                    </div>
                    @endforeach             
        </div>
    </div>
    @endif
			<div class="contact" id="pcontacts">
				<div class="call-cont">
				<h2 data-aos="fade-up" data-aos-duration="1000">Get Intouch</h2>
				<p data-aos="fade-up" data-aos-duration="1500">I am always open to ideas, suggestions, invitations or any communication. Write me a message.</p>
				</div>
				<div class="contact-form">
				<form action="#">
					<div class="row">
					<div class="col-sm-12 col-md-4 mt-30">
						<input data-aos="fade-up" data-aos-duration="1500" type="text" name="name" placeholder="Name">
					</div>
					<div class="col-sm-12 col-md-4 mt-30">
						<input data-aos="fade-up" data-aos-duration="1500" type="email" name="email" placeholder="Email">
					</div>
					<div class="col-sm-12 col-md-4 mt-30">
						<input data-aos="fade-up" data-aos-duration="1500" type="phone" name="phone" placeholder="Phone Number">
					</div>
					<div class="col-sm-12 col-lg-12 mt-30">
						<input data-aos="fade-up" data-aos-duration="1500" type="text" name="subject" placeholder="Subject">
					</div>
					<div class="col-sm-12 col-lg-12 mt-30">
						<textarea data-aos="fade-up" data-aos-duration="1500" name="message"  cols="30" rows="10" placeholder="Message"></textarea>
					</div>
					</div>	
					<span class="dt-button custom-bt custom-bts" data-aos="fade-up" data-aos-duration="1500"><span>Send Message</span></span>
				
				</form>
				</div>
			</div>
			
		</div>
	<div class="footer">
		<div class="footer-logo" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0">
			<h2>LUCID</h2>
		</div>
		<div class="copy">
			<p data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">Copy Right &copy; By Sam 2020 &#124; All Rights Reserved </p>
		</div>
		<div class="social">
            @if ($data->linkedin)
                <a href="https://{{$data->linkedin}}" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                    <img src="/images/icons/linkedin.svg" alt="LinkedIn" width="15px">
                </a>
            @endif
            
            {{-- @if ($data->github)
                <a href="{{$data->github}}" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                    <img src="/images/icons/github.svg" alt="GitHub" width="15px">
                </a>   
            @endif --}}
            @if ($data->email)
                <a href="https://{{$data->theme}}" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                    <img src="/images/icons/envelope.svg" alt="Email" width="15px">
                </a>
            @endif
            @if ($data->facebook)
                <a href="https://{{$data->facebook}}" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                    <img src="/images/icons/facebook.svg" alt="Facebook" width="15px">
                </a>                
            @endif
            @if ($data->instagram)
                <a href="https://{{$data->instagram}}" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="0">
                    <img src="/images/icons/instagram.svg" alt="instagram" width="15px">
                </a>
            @endif
			
			
		</div>
	</div>
	</div>
	<script type="application/javascript" defer>
	var portraithm = new Image();
	portraithm.src = "{{$data->portrait}}"
	var hmP = document.getElementById("phome");
	
	hmP.style.backgroundImage = "url('"+portraithm.src+"')";
	console.log(hmP.style);
	</script>
	<script src="/js/ls.js"></script>
	

  <!-- MDB core JavaScript -->
 
	
</body>
	
</html>
