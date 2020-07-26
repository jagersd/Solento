<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    
</head>
<body>
@if (Route::has('login'))
<div class="top-right links">
    @auth
        <a href="{{ url('/home') }}">Home</a>
    @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
</div>
@endif

<div class="slideshow-container">
    <!-- Full-width images with number and caption text -->
    <div class="siteHeader fade zoom">
        <img src="{{URL::asset('/images/homepage/Forest.jpg')}}" style="width:100%">
        <div class="banner-text fade">Defend your home</div>
    </div>
    
    <div class="siteHeader fade zoom">
        <img src="{{URL::asset('/images/homepage/florian-dreyer-environment.jpg')}}" style="width:100%">
        <div class="banner-text fade">Gather your army</div>
    </div>
    
    <div class="siteHeader fade zoom">
        <img src="{{URL::asset('/images/homepage/andre-pinheiro-zeppelin.jpg')}}" style="width:100%">
        <div class="banner-text fade">Get ready...</div>
    </div>
    <div class="siteHeader fade zoom">
        <img src="{{URL::asset('/images/homepage/dwarven-hammer.jpg')}}" style="width:100%">
        <div class="banner-text fade">...And pick up the hammer</div>
    </div>
</div>

<div class="welcome-section">
    <div class="row">
        <div class="col-2 mobile-center" data-aos="fade-up"></div>
            <div class="col-8">
                <h1>*Welcome to project Solento*</h1>
                <p>In this world of wonderlust and warlords, you get the opportunity to show your prowess as a tactician by leading army you hand picked for purpose.</p>
                <h5>Who is this for?</h5>
                <p>If you like the deckbuilding part of a tradeable card game or simply love to get lost in tweaking numbers, this might just be somethingh you could enjoy on the go, during a break at work of in between classes.</p>
                <p>Aiming to remove the frustrating part of having to spend loads of money getting to that one rare unit or spell to be able to execute your plan, no item will be hid behind a paywall.
                The length and breadth of the game is setting up your perfect army before sending them into battle against another player, after which you can check how you did and reap the rewards.</p>
                <p>Interested in what you read? Continue down this rabbit whole filled with goblins and treasure below or <a href="{{ route('register') }}">sign up</a> straight away</p>
            </div>
        <div class="col-2"></div>
    </div>
</div>

<div class="devider1"></div>

<div class="gameloop welcome-section container-fluid">
    <div class="row flex-column flex-md-row">
        <div class="col-2 responsive">
            <h4>1. Sign up</h4>
            <p>When signed up, requested to select a race. This will not limit you to selecting units from other origins but will have some other implications.</p>
            <p>You will also receive some currency to spash on units, items or other things.</p>
        </div>
        
        <div class="col-2 responsive">
            <h4>2. Gather your stuff</h4>
            <p>You can spend hours going through the multitude of units and items on offer and see how you can collect a well rounded or very specialized group of units</p>
        </div>
        <div class="col-2 responsive">
            <h4>3. Tweak,tinker and gear up</h4>
            <p>Here you will be able to set your outfits formation, assign the correct piece of gear for your plan an choose which units to send out.</p>
        </div>
        <div class="col-2 responsive">
            <h4>4. Battle</h4>
            <p>The battle engine will match you up against another player and work out which strategy has worked out best in this instance.
                You will be updated along the way of course. 
            </p>
        </div>
        <div class="col-1 responsive"><img src="{{URL::asset('/images/homepage/axe1.png')}}" height="200"></div>
        <div class="col-2 responsive">
            <h4>5. Spoils of victory or taste bitter defeat</h4>
            <p>The winner can get rewards in form of curreny, items or even units. The losing end will receive al required information to see wtf happened.</p>
        </div>

        <div class="col-1"></div>
    </div>

</div>

<div class="devider1"></div>

<div class="roadmap welcome-section container-flex">
    <div class="row flex-column flex-md-row">
        <div class="col-12">
            <h1>Roadmap</h1>
        </div>
    </div>
    <div class="row flex-column flex-md-row">
        <div class="col-1"></div>
        <div class="col-5 responsive">
            <p>This project started out of interest in an attempt to get familiar with whatever is needed in order to run a web application. It is in far too early of a stage to list the things still need doing (a small warcraft 3 refence for your there :D),
                but there is a lot of stuff I want to get in here which do not necessarily revolve around web tech. If you have a real interest and passion for the fantasy genre, please feel free to let me know that you want to contribute.
                For now, there is not even a front-end past this part except for that is required to test back-end functionality.  
            </p>
        </div>
        <div class="col-5 responsive" >
            <p>Interested to participate? Your expertise is very much appreciated on the following fronts:</p>
            <ul style="list-style:none; padding:0;">
                <li>Fantasy story writing:</li>
                <i>In order to make a browser based game interesting, I'd like to have it backed up with a good story</i>
                <li>Art-work:</li>
                <i>Do you love spending your free time creating art work in this genre? For obvious reasons your passion is very much needed here.</i>
            </ul>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<div class="devider2"></div>

<div class="welcome-section end">
    <div class="row flex-column flex-md-row">
        <div class="col-2"></div>
        <div class="col-8 responsive">
            <h4>Assets used:</h4>
            <p>The art work for this front page is gathered from <a href="https://www.artstation.com/">artstation.com</a> without prior request to the artists. When present, the watermarks have been left in as well as the creators name as part of the file name.</p>
            <p>Going forward, it would be great to have people contributing art directly. Their names will be mentioned whenever the work is displayed.</p>
            <br>
            <h4>For those interested:</h4>
            <p>Tech stack:</p>
            <ul style="list-style:none; padding:0;">Front-end:
                <li>Laravel's Blade template</li>
                <li>Bootstrap</li>
                <li>AOS library</li>
                <li>VUE</li>
            </ul>
            <ul style="list-style:none; padding:0;">Back-end:
                <li>Laravel</li>
                <li>MySQL</li>
            </ul>
        </div>
        <div class="col-2"></div>
    </div>
</div>

</body>
    
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        overflow-x: hidden;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        z-index: 1000;
    }
    
    .links > a {
        color: snow;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .welcome-section{
        font-family: 'Dosis', sans-serif;
        font-size: 17px;
        width: 100%;
        color: #F7F9FB;
        margin-top:1px;
        margin-bottom:1px;
        padding-top:30px;
        background: rgb(22,105,131);
background: linear-gradient(270deg, rgba(22,105,131,1) 0%, rgba(15,70,87,1) 15%, rgba(15,70,87,1) 85%, rgba(22,105,131,1) 100%);
        position: relative;
        min-height: 300px;
        text-align: center;
    }

    .welcome-section i{
        font-size: 15px;
    }

    .devider1{
        background-image: url('/images/homepage/vladimir-krisetskiy-dwarves.jpg');
        min-height: 250px;
        background-attachment:fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .devider2{
        background-image: url('/images/homepage/ekaterina-sidorenko-disign.jpg');
        min-height: 250px;
        background-attachment:fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    


    /* Slideshow container */
    .slideshow-container {
        min-height: 80vh;
        position: relative;
        top:0px;
        margin: auto;
        background-color: black;
        overflow: hidden;
    }

    /* Hide the images by default */
    .siteHeader {
        display: none;
    }

    .banner-text{
        display: block;
        z-index: 20;
        margin-left:500px;
        margin-top:-500px;
        color: white;
        font-size: 50px;
    }

    /* Fading and zooming animation */
    .fade {
    animation-duration: 15s;
    -webkit-animation: fade 15s linear forwards zoom 15s linear forwards;
    animation: fade 15s linear forwards , zoom 15s linear forwards;
    }

    @-webkit-keyframes fade {
    0%,100% {opacity: 0.0;}
    10%,90% {opacity: 0.9;}
    }

    @keyframes fade {
    0%,100% {opacity: 0.0;}
    10%,90% {opacity: 0.9;}
    }

    @-webkit-keyframes zoom{
    0%{transform: scale(1) rotate(0deg);}
    100%{transform: scale(1.2) rotate(0.1deg);}
    }

    @keyframes zoom{
    0%,100%{transform: scale(1) rotate(0deg);}
    100%{transform: scale(1.2) rotate(0.1deg);}
    }

    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
        .siteHeader{
        display: block;
        margin: auto;
        }

        .siteHeader img{
        margin-top:50vh;
        margin-left:-500px;
        position: absolute;
        overflow: hidden;
        min-width: 1080px;  
        min-height: 100vh;
        }

        .welcome-section, .responsive{
            min-width: 100%;
        }
    }

</style>

<script>
//Slideshow script
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("siteHeader");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 14500); // Change image every 2 seconds
}
//End slideshow

</script>

</html>
