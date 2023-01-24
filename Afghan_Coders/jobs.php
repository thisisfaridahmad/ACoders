<?php

session_start();

if(isset($_POST['submit-job'])){
    $title = $_POST['title'];
    $org = $_POST['org'];
    $desc = $_POST['desc'];
    
    require "files/dbh.inc.php";

    if(empty($title) || empty($org) || empty($desc)){
        header("Location: jobs.php?e=emp");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $title)) {
        header("Location: jobs.php?e=title");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $org)){
        header('Location: jobs.php?e=org');
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$desc)){
        header("Location: jobs.php?e=desc");
        exit();
    }
    else{
        $sql = "INSERT INTO jobs(title, organization, description) VALUES(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: jobs.php?e=s");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"sss", $title,$org,$desc);
            mysqli_stmt_execute($stmt);
            
            $_SESSION['ID'] = $row['ID'];
            header("Location: jobs.php?msg=s");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
        <link rel="icon" href="logo1.png" type="image/x-icon">
        
        <meta name="author" content="Farid Ahmad Anwari">
        <meta name="keywords" content="Jobs,jobs,job,develpoer job, afghanistan freelancer, programming job, website, template, jobs in afghanistan, programming jobs in afghanistan"> 
        <meta name="description" content="We find jobs for afghan developer in here you can find the most recent and relateable developer jobs in here">
        
        <link rel="stylesheet" type="text/css" href="style/nav.css"/>
        <link rel="stylesheet" type="text/css" href="style/footer.css"/>
        <link rel="stylesheet" type="text/css" href="style/jobs.css"/>
        
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

        <link rel="stylesheet" href="fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="fontawesome/css/brands.min.css" />
        <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" />
        <link rel="stylesheet" href="fontawesome/css/regular.min.css" />
        <link rel="stylesheet" href="fontawesome/css/solid.min.css" />
        <link rel="stylesheet" href="fontawesome/css/svg-with-js.min.css" />
        <link rel="stylesheet" href="fontawesome/css/v4-shims.min.css" />
        <link rel="icon" href="logo1.png" type="image/x-icon">

        <title>Jobs - AfghanCoders</title>
        
        <style type="text/css">
        	.postButton{
        		position: relative;
        		margin: auto;
        		width: 100px;
        		height:50px;
        		padding: 0;
        		display: block;
        		margin-top: 30px;
        		border: none;
        		background-color: black;
        		color: white;
        		border-radius: 5px; 
        		box-shadow: 0px 50px 50px 0px rgba(0,0,0,0.3);
        		cursor: pointer;
        		overflow: hidden;
        	}
        	.postButton::before{
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
        	.postButton:hover::before{
        		width: 70%;
                margin: auto;
        		height: 100%;
        		transform: skew(400deg);
        		transition: width 1s;
        	}
            footer{
                text-align: initial;
            }
            @media and screen (max-width: 500px){
                
            }
            body{
                margin: 0;
            }
            .success{
                background: lightgreen;
                padding: 10px;
                width: 50%;
                display: block;
                margin: auto;
                border-radius: 5px;
                box-shadow: 0 0 10px 5px rgba(0,0,0,0.1);
                position: relative;
            }
            #close{
                position: absolute;
                right: 20px;
                color: white;
                font-size: 1.1em;
            }
            #msg, #msg-org{
                color: red;
                font-family: sans-serif;
                margin: auto;
                display: block;
                margin-left: 40px;
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
        <br><br><br><br><br><br><br>
        <main>
            <div class="div-btn">
                <h2>Share your jobs here.</h2>
                
            <?php
            if(isset($_GET['msg'])){
                echo "<div class='success' id='success'><p>We have recived your job please wait for approval, Thanks <span class='fa fa-hand-peace'></span><span class='fa fa-close' id='close'></span></p></div>";
            }
            ?>
            	<button class="postButton" onclick="jobSection()">Post a job</button>
            </div>
            <section class="add-job" id="add-job">
                <form class="job-form" method="post" action="#" enctype="multipart/form-data">
                    <br>
                    <span class="close fa fa-close" id="closeFormBtn"></span>
                    <center>
                        <input type="text" class="title" id="title" name="title" placeholder="Title" onfocusout="checkTitle()">
                        <input type="text" class="org" id="org" name="org" onfocusout="checkOrg()" placeholder="Organization">
                    </center>
                    <p id="msg"></p>
                    <p id="msg-org"></p>
                    <textarea class="desc-text" id="desc" rows="10" name="desc" placeholder="Description"></textarea>
                    
                    <input type="submit" class="submit" id="submit" name="submit-job" value="Share"><br>
                </form>
            </section>
        </main>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
            
            function checkTitle(){
                let title = document.getElementById('title').value;
                
                if (title < 10){
                    let p = document.getElementById('msg');
                    p.innerHTML = "Your title should be at least 10 charachters";
                }
            }
            
            function checkOrg(){
                let org = document.getElementById('org').value;
                
                if(org < 30){
                    let p = document.getElementById('msg-org');
                    p.innerHTML = "Your organization name has to be at least 30 charachter";
                }
            }
            
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
            
            function jobSection(){
                let form = document.getElementById('add-job');
                let span = document.getElementById('closeFormBtn');
                
                
                form.style.display = 'block';
                
                span.onclick = function(){
                    form.style.display = 'none';
                }
            }
        </script>
    </body>
</html>