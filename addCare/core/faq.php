<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=addcare','root','');
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
			     	<h1><a href="../Index.php">AddCare</a></h1>
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
	<!--───────────────────────────────────────────────────────────────────────────────────────────────────-->
	<body>
		<!-- CONTENUE FAQ A FAIRE-->
	</body>
	<!--───────────────────────────────────────────────────────────────────────────────────────────────────-->

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