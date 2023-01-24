<?php

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    require "files/dbh.inc.php";

    if(empty($name) || empty($email) || empty($msg)){
        echo "Please Fill all of the required inputs";
        exit();
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: index.php?err");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?echar");
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: index.php?nchar");
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$msg)){
        header("Location: index.php?mchar");
        exit();
    }else{
        $sql = "INSERT INTO contact(name, subject, message, email_address) VALUES(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: index.php?err=s");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt,"ssss", $name,$subject,$msg,$email);
            mysqli_stmt_execute($stmt);
            
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['name'] = $row['Name'];
            header("Location: index.php?s");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Farid Anwari">
        <meta name="description" content="Home for Afghan Developers">
        <meta name="keywords" content="Home,AfghanCoders,Developers,Afghan2.0,Programming,html,css,javascript,Afghanistan,#AfghanGirlsCode">
        
        <link rel="stylesheet" type="text/css" href="style/main.css"/>
        <link rel="stylesheet" type="text/css" href="style/penguin.css"/>
        <link rel="icon" href="logo1.png" type="image/x-icon">

        <title>AfghanCoders - Home for Afghan Developers</title>
        <style>
            
        </style>
    </head>
    
    <body>
        <header id="header">       
            <div class="header-nav" id="header-nav">
                <a href="event.html" class="event">Events</a>
                <a href="jobs.html" class="jobs">Jobs</a>
                <a href="ketab.html" class="ketab">Ketab</a>
            </div>
            
            <nav class="more" id="more">
                <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a href="event.html" class="event">Events</a>
                        <a href="jobs.html" class="jobs">Jobs</a>
                        <a href="ketab.html" class="ketab">Ketab</a>
                    </div>
                </div>
                <span style="font-size:30px;cursor:pointer;" onclick="openNav()" id="openNav" class="btn">&#9776;</span>
            </nav>
            
            <div class="page-title">
                <h1><a href="index.html" style="text-decoration: none;">AfghanCoders</a></h1>
            </div>
        </header>
        
        
        <section class="firstSection">
            <h2 class="name">AfghanCoders</h2>
            <p class="title">Home for Afghan Developers</p>
            <center><a href="event.html" class="join">Events</a></center>
        <section id="animation">
            <center>
                <div id="cube">
                    <div class="side1" id="side1">
                        <p></p>
                    </div>
                    <!-- cube 1 and 2 sort 2 3 4 5 1 6-->
                    <div class="side2" id="side2">
                        <p></p>
                    </div>
                    <div class="side3" id="side3">
                        <p></p>
                    </div>
                    <div class="side4" id="side4">
                        <p></p>
                    </div><!-- first -->
                    <div class="side5" id="side5">
                        <p></p>
                    </div>
                    <div class="side6" id="side6">
                        <p>&#990;</p>
                    </div>
                </div>
            </center>
        </section>
            <a href="#whoarewe"><div class="down"></div></a>
        </section>
        
        

        
        <section class="secondSection" id="secondSection">
            <div class="q1" style="margin-bottom: 20px;">
                <h2 id="whoarewe">Who are we?</h2>
                <p>We are an organization dedicated to encourage more Afghans into learning Programming/Coding and to help Afghan Developers in any way we can. Our main goal is to provide anything that is necessery to help Afghan developers</p>
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
            <br>
            <div class="q2" style="margin-bottom: 20px;">
                <h2 class="afghangirls">#AfghanGirlsCode</h2>
                <p>There are many limitations and problems for girls and women in Afghanistan, the most obviouse one is the limitation of education and work for them. <br>With the consideration of all these, we offer scholarships and free courses with the help of IBB's funding program, for those girls who are in need to become a developer and continue thier way as a developer</p>
                <img src="image/girl-coding.jpg" alt="ibb's logo" width="100%">
            </div>
            <div class="q3" style="margin-bottom: 20px;">
                <h2>Events</h2>
                <p>We will offer many programs that will help you to learn and improve your skills as a developer, Such as our most recent program, it is a 30 day course for Afghan youths who wants to learn how to make a website and generate money from it.<br>&#9679; <a href="event.html" style="text-decoration: underline;">Web devlopments basic knowledge</a> &#9679; More courses are on the way, stay tuned!</p>
            <img src="image/event.JPG" alt="events-page" width="95%" height="auto" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);border-radius: 10px;">
            </div>
            <div class="q4">
                <h2>Jobs and Ketab</h2>
                <p>We will look for jobs for you, and post it in the <a href="jobs.html" style="text-decoration: underline;">jobs</a> section. you can use this section to find the job that you are looking and in the <a href="ketab.html" style="text-decoration: underline;">Ketab</a> section we will upload the most helpful Books to help you become a better developer</p>
                <img src="image/ketab.JPG" alt="Ketab-page" width="95%" height="auto" style="margin-left: 2px; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);border-radius: 10px;">
            </div>
        </section>
        <div class="sponsers-div">
            <h2>Our Sponsor</h2>
            <img src="image/ibb-logo.jpg" alt="ibb's logo" id="img">
        </div>
        <main class="main" id="main">
            <section class="slide" id="firstSlide">
                <form action="#" method="post">
                    <br><h1>Contact us:</h1><br>
                    <input class="email-contact" id="email-contact" name="email" placeholder="Email" type="email">
                    <input class="name-contact" id="name-contact" name="name" placeholder="Name" type="text">
                    <input class="subject-contact" id="subject-contact" name="subject" placeholder="Subject" type="text">
                    <textarea name="msg" rows="10" placeholder="Write down your message here:"></textarea>
                    <input class="submit" name="submit" id="submit" value="Send" type="submit">
                </form>
            </section>
        </main>
        <footer id="footer">
            <h2 id="afg-footer">AfghanCoders</h2>
            <br>        
            <ul class="addresses">
                <li><a href="https://www.instagram.com/afghancoders/" target="_Blank"><img src="image/instagram-square.svg" width="40px" alt="instagram's logo"></a></li>
                <li><a href="https://www.facebook.com/afghancodersofficial/" target="_Blank"><img src="image/facebook-square.svg" width="40px" alt="facebook's logo"></a></li>
                <li><a href="https://www.twitter.com/afghan_coders/" target="_Blank"><img src="image/twitter-square.svg" width="40px" alt="twitter's logo"></a></li>
            </ul>

            <p style="margin: auto;">contact@afghancoders.com</p><br>
            <hr>
            <br>
            <span>&copy; Copyrights are all reserved </span><p style="display: inline;" id="d"></p>
        </footer>
        <script src="script/main.js"></script>
    </body>
</html>