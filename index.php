<?php
    session_start();
?>
<!Doctype html>
</html>
<head>
    <title>
        NHC Online Library Management System
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style type="text/css">
   nav
     {
    float: right;
    word-spacing: 30px;
    padding: 20px;
     }
    nav li
     {
    display: inline-block;
    line-height: 80px;
     }
        </style>
        </head>
        

    <body>
        <div class="wrapper">
            <header>
                <div class="logo">
                <img src="images/logonhc.jpg">
                <h1>NHC ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
            </div>

            <?php
                if(isset($_SESSION['login_user']))
                
                {
                    ?>
                        <nav>
                            <ul>
                                <li><a href="index.php">HOME</a></li>
                                <li><a href="books.php">BOOKS</a></li>
                                <li><a href="logout.php">MEMBER-LOGOUT</a></li>
                                <li><a href="feedback.php">FEEDBACK</a></li>   
                            </ul>
                        </nav> 
                    <?php
                }
                else
                {?>
                            <nav>
                                    <ul>
                                        <li><a href="index.php">HOME</a></li>
                                        <li><a href="books.php">BOOKS</a></li>
                                        <li><a href="member_login.php">MEMBER-LOGIN</a></li>
                                        <li><a href="registration.php">REGISTRATION</a></li>
                                        <li><a href="feedback.php">FEEDBACK</a></li>   
                                    </ul>
                            </nav>

                <?php
                
            }

            ?>

                <nav>
                    <!---<ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="member_login.php">MEMBER-LOGIN</a></li>
                        <li><a href="registration.php">REGISTRATION</a></li>
                        <li><a href="feedback.php">FEEDBACK</a></li>   
                    </ul>--->
                </nav>
            </header>

            <section>

        <div class="sec_img">

            <!----<div class="box" position: absolute; top: 200px; left: 0; width: 100%;>
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcom to library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 15:00 </h1><br>
			</div>---->

            <div class="w3-content w3-section" style="width: 1600px; height: 450px; margin-right: 650px;">
                <img class="mySlides w3-animate-left" src="images/lb1.jpg">
                <img class="mySlides w3-animate-left" src="images/lb2.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb3.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb4.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb5.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb6.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb7.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb8.jpg">
                <img class="mySlides w3-animate-fading" src="images/lb9.jpg">
            </div>
        
        <script type="text/javascript">
            var a=0;
            carousel();
        
            function carousel()
            {
                var i;
                var x= document.getElementsByClassName("mySlides");
        
                for(i=0; i<x.length; i++)
                {
                    x[i].style.display="none";
                }
        
                a++;  
                if(a > x.length) {a = 1}
                    x[a-1].style.display = "block";
                    setTimeout(carousel, 5000);
            }
        </script>

                <br><br><br>
            
            
        </div>

       

            </section>
           <!---- <footer>

                <p style="color:white;text-align: center;">
                    <br><br>
                    Email:&nbsp info@nhc.go.ke<br><br>
                    Tel No:&nbsp +254 730 749000/ +254 759 93030

                </p>

            </footer>---->
        </div>

            <?php
                include "footer.php";
            ?>

    </body>
    </html>


        