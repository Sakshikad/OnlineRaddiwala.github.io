<?php session_start();?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: index.html');
}
?>

<!-- php session start  -->
<html>
    <head>
       <title>ONLINE RADDIWALA</title> 
       <link rel="stylesheet" href="style.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

       <meta name="viewport" content="width =device-width, initial-scale=1">
    </head>
<body>
   
<!--Homepage-->
    <section id="banner">
        <img src="images/logo1.jpg" class="logo">
        <div class="banner-text">
            <h1>ONLINE RADDIWALA</h1>
            <p>SELL PAPER,SAVE TREES</p>

<!-- display username after successfully user login -->
    <?php
    if(isset($_SESSION['valid'])) {         
        include("connection.php");                  
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>
        <div class="container">
       
       <div class="wel" style="color: #fff; font-size: 40px;"> Welcome <?php echo $_SESSION['username'] ?> ! You can manage your profile.</div> <br/>
       <div class="main-div">
  
            
    <?php   
    }
    ?>
          <div class="banner-btn">
            <!-- <a href="Profile.html" class="banner-btn" id="button1"><span></span>View Profile</a> -->
            <!-- <a href="pickup-request.php" class="banner-btn" id="button1"><span></span>Pickup Request</a> -->
            <a href="profile.php" class="banner-btn" id="button1"><span></span>Profile</a> 
            <a href="logout.php" class="banner-btn"><span></span>Logout</a>
          </div>
        </div>
<!--forms--> 
        <div class="popup">
            <div class="form">
                <img src="images/close.png" alt="Close" class="close">
                <!--register form-->
                <form class="register-form" method="POST" action="registration.php">
                    <input type="text"  placeholder="user name" name="username" required="" />
                    <input type="password" id="password-input" placeholder="password" name="password" required="" />
                    <button1 id="toggle-password"></button1>
                    <input type="email" name="email" placeholder="email id" required="" />
                   <!-- <button type="button">Create</button>  -->
                    <input type="submit" value="submit" name="submit">
                    <p class="message">Already Registered?<a href="#">Login</a></p>
                </form>
                <!--login form-->
                <form class="Login-form" method="POST" action="login.php">
                    <input type="text" name="username" placeholder="user name" required="" />
                    <input type="password" id="password-input" name="password" placeholder="password" required="" />
                    <button1 id="toggle-password"></button1>
                    <!-- <button type="submit">Login</button> -->
                    <input type="submit" value="submit" name="submit">
                    <p class="message">Not Registered?<a href="#">Register</a></p>
                </form>
            </div>
        </div>
    </section>

<!--script for change login form to register form -->
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <script>
            $('.message a').click(function(){
            $('form').animate({height:"toggle",opacity:"toggle"},"slow");
            });
        </script>
<!--script for showing password-->
    <script>
        const passwordInput = document.querySelector("#password-input");
        const togglePasswordButton = document.querySelector("#toggle-password");
        
        togglePasswordButton.addEventListener("click", () => {
            if (passwordInput.type === "password"){
                passwordInput.type ="text";
            }
            else if (passwordInput.type === "text"){
                passwordInput.type = "password";
            }
        });
    </script>
    
<!--menu-->
    <div id="sideNav">
        <nav>
            <ul>
            <li><a href="#banner">Home</a></li>
            <li><a href="#feature">Service</a></li>
            <li><a href="#rate">Rate card</a></li>
            <li><a href="#" id="button2">Feedback</a></li>
            <li><a href="#footer">Contact Us</a></li>
            </ul>
        </nav>  
    </div>

    <div id="menubtn">
        <img src="images/menu.png" id="menu"> 
    </div>
    <div class="pop-up2">
        <div class="login-page2">
            <div class="form2">
                <img src="images/close.png" alt="Close" class="close2">
                <!--feedback form-->
                <form class="Review Form">
                    <input type="text" placeholder="User Name"/>
                    <input type="number" placeholder="Rating(Out Of 5)"/>
                    <input type="text" placeholder="Any Other Comment"/>
                    <button>Submit</button>   
                </form>
            </div>
        </div>
    </div>

<!--service-->
    <section id="feature">
        <div class="title-text">
            <p>Services</p>
            <h1>How it works</h1>
        </div>
        <div class="feature-box">
             <div class="features">
                 <h1>1.Choose a date for scrap pickup</h1>
                 <div class="features-desc">
                 <div class="feature-icon">
                     <i class="fa fa-calendar-check-o"></i>
                 </div>
                 <div class="feature-text">
                     <p>
                       Choose a date when you want our executives to come for scrap pickup
                       You can book a request for next day. Our scrap pickup time will be
                       between 10am to 6pm.
                     </p>
                 </div>
                 </div>
                 <h1>2.Select scrap items for selling</h1>
                 <div class="features-desc">
                 <div class="feature-icon">
                     <i class="fa fa-newspaper-o"></i>
                 </div>
                 <div class="feature-text">
                     <p>
                         We collect scrap from wide list of items like newspaper,notebooks,paper glass.
                     </p>
                 </div>
                 </div>
                 <h1>3.Pickup boys will arrive at your Home</h1>
                 <div class="features-desc">
                 <div class="feature-icon">
                     <i class="fa fa-truck"></i>
                 </div>
                 <div class="feature-text">
                     <p>
                        Our pickup executives will call you 1 hour before coming.
                        They will bring an electronic machine to weigh each scrap item separately.  
                     </p>
                 </div>
                 </div>
                 <h1>4.Your Scrap sold</h1>
                 <div class="features-desc">
                 <div class="feature-icon">
                     <i class="fa fa-money"></i>
                 </div>
                 <div class="feature-text">
                     <p>
                        You will get a bill on your mobile and the amount will be transferred
                        to your bank account immideately.
                        The rates are non-negotiable please check the rates before booking 
                        pickup request. 
                     </p>
                 </div>
                 </div>
             </div>
             <div class="features-img">
             <img src="images/images (4).jpeg">
             </div>
        </div>
    </section>

<!--Rate-->
    <section id="rate">
        <div class="title-text">
            <p>Rate card</p>
            <h1>Prices</h1>
            <div class="rate-price">
            <ul>
                <li><span></span>Newspaper ₹9/kg</li>
                <li><span></span>Books ₹6/kg</li>
                <li><span></span>Carton ₹10/kg</li>
                <li><span></span>Magazines ₹9/kg</li>
                <li><span></span>White Papers ₹7/kg</li>
                <li><span></span>Grey Board ₹1/kg</li>
                <li><span></span>Record paper ₹7/kg</li>
                <li><span></span>Plain paper ₹7/kg</li>
                <li><span></span>Rough paper ₹7/kg</li>
                <li><span></span>Copy ₹8/kg</li>
            </ul>
            </div>
        </div>
    </section>

<!--footer-->   
    <section id="footer">
        <div class="title-text">
            <p>CONTACT US</p>
            <h1></h1>
        </div>
        <div class="footer-row">
            <div class="footer-center">
                <h1>Get in touch</h1>
                <P><i class="fa fa-map-marker"></i>Sr.No.502,Kanifnath Society,near Ram Temple,Pune-412308</P>
                <P><i class="fa fa-envelope"></i>raddiwala@gmail.com</P>
                <P><i class="fa fa-phone"></i>8756496357</P>
            </div>   
        </div>
        <div class="social-links">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-telegram"></i>
        </div>
    </section>

<!--script for popup login form-->
    <script>
        document.getElementById("button").addEventListener("click",function(){
            document.querySelector(".popup").style.display ="flex";
        })
        document.querySelector(".close").addEventListener("click",function(){
            document.querySelector(".popup").style.display ="none";
        })
    </script>
<!--script for popup feedback form-->
    <script>
        document.getElementById("button2").addEventListener("click",function(){
            document.querySelector(".pop-up2").style.display ="flex";
        })
        document.querySelector(".close2").addEventListener("click",function(){
            document.querySelector(".pop-up2").style.display ="none";
        })
    </script>

<!--script for menu-->
    <script>
        var menubtn=document.getElementById("menubtn")
        var sideNav=document.getElementById("sideNav") 
        var menu=document.getElementById("menu")

        sideNav.style.right="-250px";
        menubtn.onclick=function(){
        if(sideNav.style.right=="-250px"){
            sideNav.style.right="0";
            menu.src = "images/close.png";
        }
        else{
            sideNav.style.right="-250px";
            menu.src = "images/menu.png";
        }
    }
//script for smooth scrolling
    var scroll = new SmoothScroll('a[href*="#"]',{
	speed: 1000,
	speedAsDuration: true});
    </script>
</body>
</html>



