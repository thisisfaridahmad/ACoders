<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale = 1.0" />        
        <meta name="author" content="Farid Ahmad Anwari">
        <meta name="keywords" content="Books for developers, programming books, free books, books, python, html,css, javascript, download free developer books, books for developer, books for afghan developers">
        <meta name="description" content="We find and post the most helpful books for developers here you can download it for free">
        
        
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

        <link rel="stylesheet" href="fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="fontawesome/css/brands.min.css" />
        <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" />
        <link rel="stylesheet" href="fontawesome/css/regular.min.css" />
        <link rel="stylesheet" href="fontawesome/css/solid.min.css" />
        <link rel="stylesheet" href="fontawesome/css/svg-with-js.min.css" />
        <link rel="stylesheet" href="fontawesome/css/v4-shims.min.css" />

        
        <title>Ketab - AfghanCoder</title>
        
        <link rel="stylesheet" type="text/css" href="style/nav.css"/>
        <link rel="stylesheet" type="text/css" href="style/footer.css"/>
        <link href="style/books.css" type="text/css" rel="stylesheet">

        <link href="logo1.png" type="image/x-icon" rel="icon">
        <style type="text/css">
        	.search-div{
        		position: relative;
        		width: 70%;
        		display: block;
        		margin: auto;
        	}
        	.search{
                position: relative;
        		width: 80%;
        		padding: 10px;
        		border-radius: 5px 0px 0px 5px;
        		border: 1px solid rgba(0,0,0,0.4);
        		cursor: auto;
        	}
        	.search-button{
        		overflow: hidden;
                position: relative;
        		cursor: pointer;
        		width: 20%;
        		float: right;
        		padding: 10px;
        		color: white;
        		background-color: black;
        		border-radius: 0px 5px 5px 0px;
        		border: 1px solid black;
                background-image: url(image/search.svg);
        	}
        	.search-button::before{
        		position: absolute;
        		content: '';
        		opacity: 0.5;
        		color: black;
        		width: 0;
        		height: 0;
        		right: 0;
        		left: 0;
        		top: 0;
        		background-color: white;
        	}
        	.search-button:hover::before{
        		width: 40%;
                margin: auto;
        		height: 100%;
        		transform: skew(400deg);
        		transition: width 1s;
        	}
            footer{
                text-align: initial;
                background: #252525;
            }
            @media screen and (min-width: 670px){
                main{
                    margin-bottom: 200px;
                }
            }
            .plus{
                position: absolute;
                top: 50%;
                right: 0;
                left: 0;
                font-size: 1.3em;
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
                <h2><a href="index.php" style="text-decoration: none;color:black;">AfghanCoders</a></h2>
            </div>
        </nav>
        <br><br><br><br><br><br><br><br><br>
        <div class="search-div">
        	<input type="text" name="search" class="search" id="search" placeholder="Search the books you are looking for here">
        	<button class="search-button"><span class="fa fa-search" style="color:white;"></span> Search</button>

        </div>    
        <main>
            <div class="books">
                <p>Post your Books here</p>
                <a href="" class="download">Post</a>
                <span class="plus fa fa-plus"></span>
            </div>
            <div class="books">
                <p>All of Windows's commands</p>
                <a href="https://afghancoders.com/books/ws-commands.pdf" target="_Blank" class="download" download>Download</a>
            </div>
            <div class="books">
                <p>Learn Python: Exploring Data using python 3</p>
                <a href="https://afghancoders.com/books/pythonlearn.pdf" target="_Blank" class="download" download>Download</a>
            </div>
            <div class="books">
                <p>SEO ebook tutorial</p>
                <a href="https://afghancoders.com/books/introduction-to-seo-ebook.pdf" target="_Blank" class="download" download>Download</a>
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