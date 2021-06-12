<?php session_start(); ?>

<body>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $password == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password='$password'")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['username'] = $row['username'];
			$_SESSION['id'] = $row['id'];
		} else {
			// echo "Invalid username or password.";
			// echo "<br/>";
			// echo "<a href='login.php'>Go back</a>";
	echo "<script type='text/javascript'>alert('Username OR password invalid'); document.location = 'index.html'; </script>";

		}

		if(isset($_SESSION['valid'])) {
			// header('Location: home.html');	
		echo "<script type='text/javascript'>alert('Login Successful'); document.location = 'home.php'; </script>";
		
		}
	}
} 
?>