<?php
	require("functions.php");

	if(isset($_REQUEST['adminLog']) && $_REQUEST['adminLog']=="alog"){

		$u = $_POST['username'];
		$p = $_POST['password'];

		$sql = select("SELECT * FROM admin WHERE username='$u' AND password='$p'");
		$row = mysqli_fetch_array($sql);

		if(mysqli_num_rows($sql) == 1){
			$_SESSION['ausr'] = $row['username'];
			header("location: homepage.php");
		}
	}
	if(isset($_SESSION['ausr'])){
		header("location: homepage.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<title>Mystik</title>
</head>
<body>

	<div class="wrapper">
		<div class="logo">
			<img src="images/logo.png" alt="Mystik">
		</div>

		<div class="field">
			<form action="" method="post">
				<input type="text" class="inp" placeholder="Username" name="username"><br>
				<input type="password" class="inp" placeholder="Password" name="password"><br>
				<button type="submit" class="btn" name="adminLog" value="alog">Login</button><br>	
			</form>
			<label><i><a href="#">Forgot your password?</a></i></label>
		</div>
	</div>

	
		
	
	<script type="text/javascript" src="js/jquerylib.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="custom.js"></script>
</body>
</html>