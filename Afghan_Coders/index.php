<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    require "files/dbh.inc.php";

    if(empty($name) || empty($email) || empty($msg)){
        header("Location: index.php?e=emp");
        exit();
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: index.php?e=nechar");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?e=echar");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: index.php?e=nchar");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $subject)){
        header('Location: index.php?e=schar');
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$msg)){
        header("Location: index.php?e=mchar");
        exit();
    }else{
        $sql = "INSERT INTO contact(name, subject, message, email_address) VALUES(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: index.php?e=s");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ssss", $name,$subject,$msg,$email);
            mysqli_stmt_execute($stmt);
            
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['name'] = $row['Name'];
            header("Location: index.php?msg=s");
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
        <meta name="author" content="Farid Anwari">
        <meta name="description" content="Home for Afghan Developers">
        <meta name="keywords" content="Home,AfghanCoders,Developers,Afghan2.0,Programming,html,css,javascript,Afghanistan,#AfghanGirlsCode">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="style/nav.css"/>
        <link rel="stylesheet" type="text/css" href="style/penguin.css"/>
        <link rel="stylesheet" type="text/css" href="style/main_style.css"/>
        <link rel="stylesheet" type="text/css" href="style/footer.css"/>
        
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

        <link rel="stylesheet" href="fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="fontawesome/css/brands.min.css" />
        <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css" />
        <link rel="stylesheet" href="fontawesome/css/regular.min.css" />
        <link rel="stylesheet" href="fontawesome/css/solid.min.css" />
        <link rel="stylesheet" href="fontawesome/css/svg-with-js.min.css" />
        <link rel="stylesheet" href="fontawesome/css/v4-shims.min.css" />
        <link rel="icon" href="logo1.png" type="image/x-icon">
        
        
        <title>AfghanCoders - Home for Afghan Developers</title>
        
        <style>
            
            *{
                font-family: sans-serif;
                transition: 0.6s;
                margin: 0;
                box-sizing: border-box;
            }
            a{
                color: black;
            }
            header{
                position: absolute;
                top: 80px;
                left: 50px;
            }
            header a{
                color: white;
                position: absolute;
                text-decoration: none;
                background: #252525;
                padding: 20px 50%;
                overflow: hidden;
                border-radius: 5px;
            }
            header a::before{
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
            header a:hover::before{
        		width: 100%;
        		height: 100%;
        		transform: rotateZ(500deg);
        		transition: width 1s;
            }
            header h1, header h2{
                margin-bottom: 30px;
            }   
            #cube{
                animation: move 30s infinite ease-in-out;
                animation-delay: 0s;
                width: 200px;
                height: auto;
                position: absolute;
                right: 200px;
                color: white;
                margin-top: 200px;
                transform-style: preserve-3d;
            }
            .side1,.side2,.side3,.side4,.side5,.side6{
                user-select: none;
                text-align: center;
                transition:transform 2s;
                background: linear-gradient(to bottom, #252525, wheat);
                border-radius: 20px;
                position: absolute;
                width: 200px;
                height: 200px;
                transition: 0.3s;
                box-shadow: ;
            }
            .side1{
/*                transform:translateZ(100px);*/
                transform:rotateX(90deg) translateZ(200px);
            }
            .side2{
/*                    transform: rotateX(90deg) translateZ(100px);*/
                transform:translateZ(200px);
            }
            .side3{
/*                    transform: rotateY(-90deg) translateZ(100px);*/
                transform:rotateY(90deg) translateZ(200px);
            }
            .side4{
/*                    transform: rotateY(90deg) translateZ(100px);*/
                transform:rotateY(0deg) rotateX(-90deg) translateZ(200px);
            }
            .side5{
/*                        transform: rotateX(-90deg) translateZ(100px);*/
                transform:rotateY(-90deg) translateZ(200px);
            }
            .side6{
                transform:rotateY(180deg) translateZ(200px);
            }   
            .side1:hover,.side2:hover,.side3:hover,.side4:hover,.side5:hover,.side6:hover{
                background: #252525;
                cursor: pointer;
            }
            #cube p{
                font-size: 20px;
                position: absolute;
                top: 30%;
                left: 0;
                right: 0;
            }
            @keyframes move{
                0%{
/*                    180 0 0 */
                    transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
                }
                10%{
/*                    90 360 90*/
                    transform: rotateY(-90deg);
                }
                20%{
                    transform: rotateX(90deg);
                }
                50%{
                    transform: rotateY(90deg);
                }
                60%{
                    transform: rotateY(-180deg);
                }
                80%{
                    transform: rotateX(-90deg);
                }
                100%{
/*                    180*/
                    transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
                }
            }
            @media screen and (max-width: 1000px) {
                body{
                    overflow-x: hidden;
                }
                header{
                    text-align: center;
                    display: block;
                    position: relative;
                    top: 30px;
                    left: 0;
                }
                header a{
                    width: 50%;
                    padding: 0;
                    display: block;
                    padding: 15px;
                    position: relative;
                    margin: 0 auto;
                }
                #cube{
                    animation:move 30s infinite ease-in-out;
                    right: 0;
                    left: 0;
                    margin: auto;
                    margin-top: 200px;
                }.side1{
/*                transform:translateZ(100px);*/
                    transform:rotateX(90deg) translateZ(130px)
                }.side2{
    /*                    transform: rotateX(90deg) translateZ(100px);*/
                    transform:translateZ(130px);
                }.side3{
    /*                    transform: rotateY(-90deg) translateZ(100px);*/
                    transform:rotateY(90deg) translateZ(130px);
                }.side4{
    /*                    transform: rotateY(90deg) translateZ(100px);*/
                    transform:rotateY(0deg) rotateX(-90deg) translateZ(130px);
                }.side5{
    /*                        transform: rotateX(-90deg) translateZ(100px);*/
                    transform:rotateY(-90deg) translateZ(130px);
                }.side6{
                    transform:rotateY(180deg) translateZ(130px);
                }
                .side1,.side2,.side3,.side4,.side5,.side6{
                    height: 150px;
                    width: 150px;
                }
            }
            .msgalert{
                width: 70%;
                height: 50px;
                border-radius: 5px;
                background-color: lightgreen;
                margin: auto;
                color: #252525;
                left: 0;
                right: 0;
                bottom: 0;
                position: absolute;
            }
            @media screen and (max-width : 600px){
                .msgalert{
                    width: 100%;
                    font-size: 14px;
                }
            }
            main img{
                width: 80%;
                margin: auto;
                display: block;
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
        
        <header>
            <h1>AfghanCoders</h1>
            <h2>Home for Afghan Developers</h2>
            <a href="event.php">Events</a>
        </header>
        
        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg'] == 's'){
                echo "<div class='msgalert' id='msgalert'><br><p style='text-align:center;'>We have recived your message, thanks! <span class='fa fa-hand-peace'></span><span onclick='msgalert()' class='fa fa-close' style='position:absolute;right:20px;font-size:1.1em;cursor:pointer;color:white;'></span></p><br></div>";
            }
        }
        ?>
        
        <section id="animation">
            <div id="cube" onmousemove="move(event)">
                <div class="side1" id="side1">
                    <p>More</p>
                </div>
                <!-- cube 1 sort 2 3 4 5 1 6-->
                <div class="side2" id="side2">
                    <p>AfghanCoders</p>
                </div>
                <div class="side3" id="side3">
                    <p>Jobs</p>
                </div>
                <div class="side4" id="side4">
                    <p>Books <br><br><span class="fa fa-book"></span></p>
                </div><!-- first -->
                <div class="side5" id="side5">
                    <p>Events <br><br><span class="fa fa"></span></p>
                </div>
                <div class="side6" id="side6">
                    <p>Home</p>
                </div>
            </div>
        </section>
        
        <section class="empty">
            <span style="opacity:0;"> This empty by choise</span>
        </section>
        
        <main>
            <div class="q1">
                <h2 id="whoarewe">Who are we?</h2>
                <p>We are AfghanCoders an Organization dedicated to encourage more Afghans into learning programming/coding, we also help Afghan Developers by offering events (courses, competitions, etc...)</p>
                
                <div class="penguin" style="cursor: pointer;">
                    <div class="penguin-bottom">
                        <div class="right-hand" id="right-hand"></div>
                        <div class="left-hand"></div>
                        <div class="right-feet"></div>
                        <div class="left-feet"></div>
                    </div>
                    <div class="penguin-top">
                        <div class="right-cheek"></div>
                        <div class="left-cheek"></div>
                        <div class="belly"></div>
                        <div class="right-eye">
                            <div class="sparkle"></div>
                        </div>
                        <div class="left-eye">
                            <div class="sparkle"></div>
                        </div>
                        <div class="blush-right"></div>
                        <div class="blush-left"></div>
                        <div class="beak-top"></div>
                        <div class="beak-bottom"></div>
                    </div>
                </div>
            </div>
            
            <div class="q2">
                <h2 class="afghangirls">#AfghanGirlsCode</h2>
                <p>There are many limitations and problems for girls and women in Afghanistan, the most obviouse one is the limitation of education and work for them. <br>With the consideration of all these, we offer scholarships and free courses with the help of IBB's funding program, for those girls who are in need to become a developer and continue thier way as a developer</p>
                <img src="image/girl-coding.jpg" alt="ibb's logo">

            </div>
            
            <div class="q3" style="margin-bottom: 20px;">
                <h2>Events</h2>
                <p>We will offer many programs that will help you to learn and improve your skills as a developer, Such as our most recent program, it is a 30 day course for Afghan youths who wants to learn how to make a website and make money using these skills.<br>&#9679; <a href="event.php" style="text-decoration: underline;">Front-End Web Development Course</a> &#9679; More courses are on the way, stay tuned!</p>
                <img src="image/event.JPG" alt="events-page" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);border-radius: 10px;">
            </div>
            
            <div class="q4">
                <h2>Jobs and Ketab</h2>
                <p>If you are an organaization or someone who just wants to hire a developer you can post your projects/jobs in the <a href="jobs.php" style="text-decoration: underline;">jobs</a>  section of our website, And if you are a developer you can use this section to find the job that you are looking for and in the <a href="ketab.php" style="text-decoration: underline;">Ketab</a> you can download the most helpful Books to help you become a better developer</p>
                <img src="image/books.JPG" alt="Ketab-page" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);border-radius: 10px;">
            </div>
        </main>   
        
        <div class="sponsers-div">
            <h2>Our Sponsor</h2>
            <img src="image/ibb-logo.jpg" alt="ibb's logo" id="ibb-img">
        </div>
        
        
        <form action="#" method="post">
            <br><h3>Contact us:</h3><br>
            <?php
            if(isset($_GET['e'])){
                if($_GET['e'] == "emp"){
                    echo "<br><p style='text-align:center;color:red;'><span class='fa fa-disease'></span> Please fill all of the fields</p><br>";
                }
            }
            ?>
            <input class="email-contact" id="email-contact" name="email" placeholder="Email" type="email">
            <?php
            if(isset($_GET['e'])){
                if($_GET['e'] == "echar"){
                    echo "<br><p style='text-align:center;color:red;'><span class='fa fa-disease'></span> Please write a valid email</p><br>";
                }

            }
            ?>
            <input class="name-contact" id="name-contact" name="name" placeholder="Name" type="text">
            <?php
            if(isset($_GET['e'])){
                if($_GET['e'] == "nchar"){
                    echo "<br><p style='text-align:center;color:red;'><span class='fa fa-disease'></span> Please write a valid name!</p><br>";
                }

            }
            ?>
            <input class="subject-contact" id="subject-contact" name="subject" placeholder="Subject" type="text">
            <?php
            if(isset($_GET['e'])){
                if($_GET['e'] == "schar"){
                    echo "<br><p style='text-align:center;color:red;'><span class='fa fa-disease'></span> Please write a valid subject!</p><br>";
                }

            }
            ?>
            <textarea name="msg" rows="10" placeholder="Write down your message here:"></textarea>
            <?php
            if(isset($_GET['e'])){
                if($_GET['e'] == "mchar"){
                    echo "<br><p style='text-align:center;color:red;'><span class='fa fa-disease'></span> Please write a valid message</p><br>";
                }

            }
            ?>
            
            <input class="submit" name="submit" id="submit" value="Send" type="submit">
        </form>

        <footer>
            
            <div class="div-footer">
                
                <h2>AfghanCoders</h2>
                <br><a href="#"><p>Blog</p></a>
                <br><a href="#"><p>Donate / Become our sponser</p></a>
                <br><p>Contact: contact@afghancoders.com</p>
                <br><p class="follow">Follow us on social media
                    <a href="https://instagram.com/afghancoders/">
                        <span id="instagram-logo" class="fa fa-instagram"></span></a>
                    
                    <a href="https://facebook.com/afghancodersofficial/">
                        <span id="facebook-logo" class="fa fa-facebook"></span></a>
                    
                    <a href="https://twitter.com/afghan_coders/">
                        <span id="twitter-logo" class="fa fa-twitter"></span></a>
                </p>
                <br><p class="all-right" >2022-2023 <span class="fa fa-copyright"></span> All rights are reserved</p>
                
            
            </div>
            
            <img src="logo1.png"/>
        </footer>
        
        <script src="script/headerScroll.js"></script>
        <script>
            function msgalert(){
                let msgalert = document.getElementById('msgalert');
                msgalert.style.display = 'none';
            }
            
            
            function loadDoc() {
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("demo").innerHTML = this.responseText;
                }
              };
              xhttp.open("GET", "", true);
              xhttp.send();
            }
        </script>
    </body>
</html>