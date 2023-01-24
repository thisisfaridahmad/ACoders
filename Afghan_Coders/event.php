<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="keywords" content="Events,learning,Knowledge,Afghan,afghancoders,afghangirlscode,afghan2.0,afghanistan, afghan Developers, events of afghanistan, Coding,Programming, competetion, students, event, afghancoders, AfghanCoders">

        <meta name="author" content="Farid Anwari">
        <meta name="description" content="Events for developers to improve thier skills">

        <link rel="stylesheet" type="text/css" href="style/footer.css"/>
        <link rel="stylesheet" type="text/css" href="style/nav.css"/>
        <link rel="stylesheet" type="text/css" href="style/event.css"/>
        
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

        <link rel="stylesheet" href="fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="fontawesome/css/brands.min.css" />
        <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" />
        <link rel="stylesheet" href="fontawesome/css/regular.min.css" />
        <link rel="stylesheet" href="fontawesome/css/solid.min.css" />
        <link rel="stylesheet" href="fontawesome/css/svg-with-js.min.css" />
        <link rel="stylesheet" href="fontawesome/css/v4-shims.min.css" />
        <link rel="icon" href="logo1.png" type="image/x-icon">

        <title>Events - AfghanCoders</title>
        
        <link rel="icon" href="logo1.png" type="image/x-icon"/>
        <style type="text/css">
        	.ragister::before{
        		position: absolute;
        		content: '';
        		opacity: 0.5;
        		color: black;
        		width: 0;
        		height: 0;
        		right: 0;
        		left: 0;
        		background-color: white;
        	}
        	.ragister:hover::before{
        		width: 20%;
        		height: 100%;
                transform: skew(500deg);
        		right: 0;
        		left: 0;
        		display: block;
        		margin: auto;
        		top: 0;
        		transition: width 1s;
        	}
        </style>
    </head>
    <body>        
        <nav id="nav">
            <div class="header-nav" id="header-nav">
                <a href="event.php" class="event">Events</a>
                <a href="jobs.php" class="jobs">Jobs</a>
                <a href="ketab.php" class="ketab">Ketab</a>
            </div>
            
            <div class="more" id="more">
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a href="event.php" class="event">Events</a>
                        <a href="jobs.php" class="jobs">Jobs</a>
                        <a href="ketab.php" class="ketab">Ketab</a>
                    </div>
                </div>
                <span style="font-size:30px;cursor:pointer;" onclick="openNav()" id="openNav" class="btn">&#9776;</span>
            </div>
            
            <div class="page-title">
                <h2><a href="index.php" style="text-decoration: none;">AfghanCoders</a></h2>
            </div>
        </nav>
        
        <main style="height: 100vh;">
            <h1 class="eventh1" style="margin-top:100px;">Events</h1>
            <div class="event-section">
                <h2 class="name-of-the-event" id="front">Front-End Web Development Course</h2>
                <div class="cost"><p>Free</p></div>
                <a href="#" class="ragister">Join/Enroll</a>
            </div>
            <div class="coming-soon">
                <h2 class="name-of-the-event">More on the way...</h2>
                <p>&star; Follow us on social media to find out more about the events</p>
            </div>
        </main>
        
        <footer>   
            <div class="div-footer">
                
                <h2>AfghanCoders</h2>
                <br><a href="#"><p>Donate</p></a>
                
                <br><a href="#"><p>Blog</p></a>
                
                <br><a href="#"><p>Become our sponser</p></a>
                
                <br><p>Email: contact@afghancoders.com</p>
                
                <br><p class="follow">Follow us on social media
                
                <a href="https://instagram.com/afghancoders/">
                        <span id="instagram-logo" class="fa fa-instagram"></span></a>
                    
                
                <a href="https://facebook.com/afghancodersofficial/">
                        <span id="facebook-logo" class="fa fa-facebook"></span></a>
                    
                
                <a href="https://twitter.com/afghan_coders/">
                        <span id="twitter-logo" class="fa fa-twitter"></span></a>
                
                </p>
                
                <br><p class="all-right">2022-2023 <span class="fa fa-copyright"></span> All rights are reserved</p>
            
            </div>
            
            <img src="logo1.png"/>
        </footer>
        
        <script>
            function scroller() {
                let header = document.getElementById('nav');
                let place = window.scrollY;
                let num = 1;
                if (place >= 0) {
                    var i;
                    for (i = 0; i < 1; i = i + 0.1) {
                        header.style.opacity = i;
                    }
                } else if (place < 0) {
                    header.style.opacity = 0;
                }
            }

            setInterval(scroller, 1);

            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }
            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
        </script>
    </body>
</html>