<?php session_start();
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form class="login100-form validate-form"  action="login.php" method="post">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					<?php
					if (isset($_POST['login'])) {

						

    $myusername = mysqli_real_escape_string($link, $_POST['user_name']);
    $mypassword = mysqli_real_escape_string($link, $_POST['password']);
	
	 $sql1 = "SELECT * FROM login WHERE email = '$myusername' AND password = '$mypassword' and status=1";
    $result = mysqli_query($link, $sql1);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   
    $count = mysqli_num_rows($result);
    if ($count == 1) {
		$_SESSION['all'] = $row;       
		//  print_r($_SESSION['all']);
        
        header("location:../index.php?cat=&lim=0");
    } else {
	   echo $msg = "<span style='color:red;'>Your Login Name or Password is invalid</span>"; 

    }
}

?>
		
					<div class="row" data-validate="Type user name">
						<input id="first-name" class="input100" require type="text" name="user_name" placeholder="User name" style="border:1px solid gray; width:400px;">
						<span class="focus-input100"></span>
					</div>
					<br><br><br>
					<div class="row" data-validate="Type password">
						<input class="input100" require type="password" name="password" placeholder="Password" style="border:1px solid gray; width:400px;">
						<span class="focus-input100"></span>
					</div>
					<br><br><br>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login" style="margin-left:-80px;width:250px;">
							Sign in
						</button>
					</div>
                        
					<div class="w-full text-center">
						<a href="../index.php" class="txt3">
							Go to HomePage
						</a>
                        <br>
                       
					</div>

					<div class="w-full text-center">
						<a href="../signup.php" class="txt3">
							Sign Up
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>