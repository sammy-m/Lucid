<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="Homework help, Do my homework for me, cheap online homework assistance, studyref, complete my essay, write my essay, solve my homework, best online homework, cheap online essay, cheap online homework, do my homework for me cheap">
    <meta name="description" content="Get your homework, essay or project done by professionals. &quot;Can you do my homework for me?” - Yes, we can! Save big with Studyref">

    <title>{{ config('app.name', 'LucidPortfolio') }}| My Online Portfolio</title>
    <!-- opengraphics -->
    <meta property="og:title" content="Do My Homework Essay for Me| Online Homework Guide" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Get your homework, essay or project done by professionals. &quot;Can you do my homework for me?” - Yes, we can! Save big with Studyref" />
    <meta property="og:url" content="https://www.studyref.com" />
    <meta property="og:image" content="https://www.studyref.com/images/backgroundImages/hwkfm.jpeg" />
    <meta property="og:image:alt" content="studyref homework help" />


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="{{ asset('images/logo/studyref favicon.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>






        @include('inc.clientnav') 

        <div class="my-container" id="app">
                @yield('content')
        </div>
               
           
       <!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5d8ca81a6c1dde20ed039773/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> --}}
    <!--End of Tawk.to Script-->
    <script type="application/javascript">
        var input = document.getElementById('intro-portrait');
    var label = input.nextElementSibling; 
    var labelVal = label.innerHTML;
    //console.log(labelVal);
    input.addEventListener('change', function(e){
        var fileName = '';
        fileName = e.target.value.split(' \ ').pop();
        console.log('haha');
        

    });
    function log(){
        console.log('bs bs');
        
    }
    </script>
    </body>
    </html>
    