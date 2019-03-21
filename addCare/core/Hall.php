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
		<!-- HALL OF FAME LEADERBOARD ---------------------------------------------------------------------------------->
		<div id = 'leaderboard'>
			<ul>
			<?php

				if (isset($_SESSION['lim1']) AND isset($_SESSION['lim2']))
				{
				 	$lim1 = $_SESSION['lim1'];
					$lim2 = $_SESSION['lim2'];
					$lim3 = 0;
					//leaderboard
					$allUser = $bdd->query("SELECT * FROM userinfo ORDER BY donation DESC LIMIT $lim1, $lim2");
					while($user = $allUser ->fetch())
					{
        			$lim3++;
        
				    ?>   

			    	<li>
					    <b><?php echo $user['username']; ?></b>    <?php  echo " give " . $user['donation'] ?>
					</li>    
					<br>   


				    <?php
				    $_SESSION['lim3'] = $lim3;
				    }
				}
				else
				{ 	
					$_SESSION['lim1'] = 0;
					$_SESSION['lim2'] = 15;
					$_SESSION['lim3'] = 15;
					header("Location: Hall.php");
				}
				?>
			</ul>
		</div>
		<!-- HALL OF FAME LEADERBOARD ---------------------------------------------------------------------------------->
		

		<?php  if (isset($_SESSION['lim1']) AND isset($_SESSION['lim2']))
		{				 	?>
			<div id='container'>
				<!--bouton suivant et précedant pour le leaderboard-->
				<?php  echo($_SESSION['lim1']." ".$_SESSION['lim2']);?>
				<form method="POST" action="HallPage.php">
					<input type="submit" value="-" name='DecreaseButton'>
					<input type="submit" value="+" name='IncreaseButton'>
				</form>
				
			</div>



			<?php

		}
		?>


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