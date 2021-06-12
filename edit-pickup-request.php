<!--php code start -->
<!--session start-->  
<?php session_start(); ?>
<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
  require_once('connection.php');


  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from pickup where id=".$id;
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['update'])){
    $name = $_POST['name'];
  	$phone = $_POST['phone'];
	  $address  = $_POST['address'];
    $area  = $_POST['area'];
    $city  = $_POST['city'];
    $pincode  = $_POST['pincode'];
    $date  = $_POST['date'];
    $time  = $_POST['time'];
    $scrap  = $_POST['scrap'];
    $payment =$_POST['payment'];
    $loginId = $_SESSION['id'];
  

		if(!isset($errorMsg)){
			$sql = "update pickup set name = '".$name."',phone = '".$phone."',address = '".$address."',area = '".$area."',city = '".$city."',pincode = '".$pincode."',date = '".$date."',time = '".$time."',scrap = '".$scrap."',payment = '".$payment."' where id=".$id;
			$result = mysqli_query($mysqli, $sql);
			if($result){
        echo "<script type='text/javascript'>alert('New record updated successfully,Thank you!!!'); document.location = 'profile.php'; </script>";
				//$successMsg = 'New record updated successfully';
				//header('Location:profile.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($mysqli);
			}
		}     
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>pickup-request</title>

<style>
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  }

  body {
    background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(images/new.jpg);
    background-size: cover;
    background-position: center;
    height: 100vh;
  }

  label {
    background-color: #fff;
  }

  .container {
    display: flex;
    justify-content: center;
    margin: 0 auto;
    height: 100vh;
    align-items: center;
    max-width: 400px;
  }

  .form {
    background-color: #fff;
    padding: 2rem;
    border-radius: 2px;
    box-shadow: 0 3px 9px -3px rgb(0, 0, 0, 0.1);
  }

  .btn {
    outline: none;
    border: none;
    padding: 12px;
    color: #fff;
    cursor: pointer;
    background-color: rgb(0, 191, 255) !important;
  }

  .form-input {
    width: 100%;
    padding: 5px 10px;
    margin: 5px 0;
    font-size: 1rem;
    background-color: #f7f7f7;
    border: 1px solid #ccc;
    border-radius: 2px;
  }

  .form-heading {
    margin-bottom: 1rem;
    background-color: #fff;
  }
</style>
</head>


<body>
<div class="container">
 <form class="form" method="POST" action="">
      <h2 class="form-heading">Pickup Request</h2>
      <input class="form-input"  name="name" id="name" type="text" value="<?php echo $row['name']; ?>">
      <!-- <input class="form-input" placeholder="password" name="password" id="password" type="password" required /> -->
      <input class="form-input" name="phone" id="phone" type="text" value="<?php echo $row['phone']; ?>">
      <input class="form-input"  name="address" id="line1" type="text" value="<?php echo $row['address']; ?>">
      <input class="form-input"  name="area" id="area" type="text"  value="<?php echo $row['area']; ?>">
      <input class="form-input"  name="city" id="city" type="text"  value="<?php echo $row['city']; ?>">
      <input class="form-input"  name="pincode" id="pincode" type="number"  value="<?php echo $row['pincode']; ?>">
      <input class="form-input"  name="date" id="date" type="date"  value="<?php echo $row['date']; ?>">
      <input class="form-input"  name="time" id="time" type="time"  value="<?php echo $row['time']; ?>">
      <select class="form-input" name="scrap" id="scrap" value="<?php echo $row['scrap']; ?>">
        <option value="<?php echo $row['scrap']; ?>">Select your scrap</option>
        <option value="Newspaper">Newspaper</option>
        <option value="Books">Books</option>
        <option value="Carton">Carton</option>
        <option value="Magazines">Magazines</option>
        <option value="White Papers">White Papers</option>
        <option value="Grey Board">Grey Board</option>
        <option value="Record paper">Record paper</option>
        <option value="Plain paper">Plain paper</option>
        <option value="Rough paper">Rough paper</option>
        <option value="Copy">Copy</option>
      </select>
      <select class="form-input" name="payment" id="payment">
        <option value="<?php echo $row['scrap']; ?>">Select your payment method</option>
        <option value="Offline">Cash on delivary</option>
        <option value="Online">Online</option>
      </select>
        <!--  <a href="home.php" onclick="submit()">
     <button class="form-input btn btn-primary" type="submit">Submit</button></a> -->
        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        <input type="submit" name="update" value="Update" class="form-input btn btn-primary">
        <a href="profile.php">Go Back!</a>
		    <!--a href="profile.php"><input value="Go Back!" class="form-input btn btn-primary" style="padding-left:138px;"></a-->

    </form>   
</body>
</html>