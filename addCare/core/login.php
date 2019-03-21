<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=addcare','root','');


if(isset($_GET['SignId'])) 
	{
		$getSignId=intval($_GET['SignId']);
	}
else
	{
		$getSignId=0;
	}	

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" media="all" type="text/css"> 
		<title>AddCare</title>
		<header>
			<div id="header">
				<!-- emplacement nom / slogan-->
				<div id="hgroup">
			     	<h1><a href="Index.php">AddCare</a></h1>
			     	<h2>Give For Free</h2>
			    </div>
			    <!-- Menu navigation -->
			    <nav>
			      <ul>
			      	<li><a href="Index.php">Index</a></li>
			        <li><a href="Hall.php">Hall Of Fame</a></li>
			        <li><a href="login.php">Login</a></li>
			         <?php if(isset($_SESSION['userId'])) {echo "<li>Welcome ".$_SESSION['username']."</li>";} ?>
					<?php if(isset($_SESSION['userId'])) {?> <li><a href="disconnect.php">Disconnect</a></li><?php } ?>
			      </ul>
			    </nav>
			</div>
			<br><br><br><br><hr><br>
		</header>
	</head>

	<body>
		<div id ="container">
			<div id="SignMenu">
				<div id = 'loginForm'>
					<div id='SignChoice'>
						<h4>LOGIN PAGE</h4>
						<form method="POST" action="SignChoice.php">
							<input type ="submit" value="SignIn" name="SignIn">
							<input type ="submit" value="SignUp" name="SignUp">
						</form>
					</div>
					<?php 
					//draw the form or not :
					if($getSignId == 0) {
					?>
						<h5>Sign In :</h5>   
							<form method="POST" action="logAlg.php"> 
							    <label for="usernameL">Username :</label>
							    <input type="text" id="usernameL" name="usernameL" required>
							    <label for="passwordL">Password :</label>
							    <input type="password" id="passwordL" name="passwordL" required>
								<input type="submit" value="LOGIN" name="login">
						    </form>
					<?php } ?>
						
					<?php 
					//draw the form or not :
					if($getSignId == 1) {
					?>

					<h5>Sign Up :</h5>    
						<form method="POST" action="regAlg.php">
						    <label for="usernameR">Username :</label>
						    <input type="text" id="usernameR" name="usernameR" required>
						    <label for="passwordR">Password :</label>
						    <input type="password" id="passwordR" name="passwordR" required>
						    <label for="email">Email :</label>
							<input type="email" id="email" name="email" required>
							<input type="submit" value="REGISTER" name="register">
					    </form> 
					<?php } ?>
				</div>
			</div>
		</div>
	</body>

	<!--Footer-->
	<footer>
		<div id="footer">
		<!-- Info-->
			<nav>
			    <ul>
			    	<li><a href="faq.php">FAQ</a></li>
			        <li><a href="contactUs.php">Contact Us</a></li>
			        <li><a href="">SecretLink</a></li>
					<?php if(isset($_SESSION['userId'])) {?> <li><a href="disconnect.php">Disconnect</a></li><?php } ?>
			    </ul>
			</nav>
		</div>
	</footer>
</html> 


<?php ?>