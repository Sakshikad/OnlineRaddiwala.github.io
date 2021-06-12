<?php session_start();?>
<?php
if(!isset($_SESSION['valid'])) {
    header('Location: index.html');
}
?>


<?php
//including the database connection file
include_once("connection.php");

?>
<!-- php session start  -->
<html>
    <head>
       <title>ONLINE RADDIWALA</title> 
       <link rel="stylesheet" href="style.css">
       <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

       <meta name="viewport" content="width =device-width, initial-scale=1">
       <style type="text/css">
    .product-item {
    float: left;
    background: #ffffff;
    margin: 30px 30px 0px 0px;
    border: #E0E0E0 1px solid;
    width: 100%;
}
.card-body {
    padding: 25px 25px;
}
.title-text {
    text-align: center;
    padding-bottom: 0px;
}
       </style>
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
            <a href="home.php" class="banner-btn" id="button1"><span></span>Home</a>
          <a href="pickup.php" class="banner-btn" id="button1"><span></span>Pickup Request</a> 
            <!-- <a href="profile.php.php" class="banner-btn" id="button1"><span></span>Profile</a>  -->
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

    <!--display user status available or not    -->


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
            <p>Profile</p>
            <h1>User Profile</h1>
        </div>
 <div class="title-text">
           
            <h2>User Pickup Request's.</h2>
        </div>
 <!-- fetching data from post table where login user post there gigs and here we display that user's data-->
<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
//$result = mysqli_query($mysqli, "SELECT * FROM pickup WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<?php
    $sql = "select * from pickup WHERE login_id=".$_SESSION['id']." ";
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
?>
    
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="product-item">
<div class="card-body">

<p><b>Name:</b><?php echo $row['name']; ?></p>
<p><b>Mobile:</b><?php echo $row['phone']; ?></p>
<p><b>Address:</b><?php echo $row['address']; ?></p>
<p><b>Area:</b><?php echo $row['area']; ?></p>
<p><b>City:</b><?php echo $row['city']; ?></p>
<p><b>Pincode:</b><?php echo $row['pincode']; ?></p>
<p><b>Date:</b><?php echo $row['date']; ?></p>
<p><b>Time:</b><?php echo $row['time']; ?></p>
<p><b>Scrap:</b><?php echo $row['scrap']; ?></p>
<p><b>Payment:</b><?php echo $row['payment']; ?></p>
<p> Update
    <?php echo "<a href=\"edit-pickup-request.php?id=$row[id]\">Edit</a> | <a href=\"delete-pickup-request.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"; ?></p>
</div></div></div>

    <?php 
// close while loop 
}}
?>
        
</div></div>
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



