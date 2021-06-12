<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<?php
//including the database connection file
include_once("connection.php");
      

if(isset($_POST['submit'])) {	

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
    
   
		//insert data to database	
		if(!isset($errorMsg)){
			$sql = "insert into pickup (name, phone, address, area, city, pincode, date, time, scrap, payment, login_id) values('".$name."', '".$phone."', '".$address."','".$area."','".$city."','".$pincode."','".$date."', 
					'".$time."', '".$scrap."','".$payment."' , '".$loginId."')";
			$result = mysqli_query($mysqli, $sql);
			if($result){
				echo "<script type='text/javascript'>alert('Your request has been submitted successfully, Thank you!!!'); document.location = 'profile.php'; </script>";
				//$successMsg = 'New record added successfully';
				//header('Location: profile.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($mysqli);
			}
		}
		
		//display success message

	}

?>
