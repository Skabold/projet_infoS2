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
	<!--───────────────────────────────────────────────────────────────────────────────────────────────────-->
	<body>
		<!-- faq question / anwser -->
		<div id = 'faq'>
			<ul>
			<?php

				//faq query for msg
				$allMsg = $bdd->query("SELECT * FROM faq ORDER BY messageId DESC LIMIT 0,12");


				while($msg = $allMsg ->fetch())
				{

    			//username query
				$currentId = $msg['Fk_userId'];
				$faqUserList = $bdd->query("SELECT username FROM userinfo INNER JOIN faq ON userId = Fk_userId WHERE Fk_userId = $currentId ");
				$faqUser = $faqUserList ->fetch();

			    ?>   

		    	<li>
				    <b><?php echo $faqUser['username']." : "; ?></b><?php  echo $msg['messageText'] . " | "; ?> <b><?php echo "ADMIN ANSWER : ".$msg['answerText'] ;?></b>
				    <?php //if admin : display messageId 
				    if ($_SESSION['admin']=1) {echo $msg['messageId'];}

				    ?>

				</li>    
				<br>   


			    <?php
			    }
				?>
			</ul>
		</div>
		<!-- faq form (post new questions) -->
		<div id="container">
          <div id="faqForm">
            <form action="faqPost.php" method="POST">
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write your question..""></textarea>

                <input type="submit" value="Submit" name="faqPostButton">

            </form>
          </div>
      </div> 
      <!-- faq admin form (not safe) -->
      <?php 
      //only if you are admin :
      $admin = false ;
      if (isset($_SESSION['userId'])) {
	      $requserinfo = $bdd->prepare("SELECT * FROM userinfo WHERE userId = ? ");
	      $requserinfo->execute(array($_SESSION['userId']));
	      $userinfo = $requserinfo->fetch();
	      $admin = $userinfo['admin'];
      }
      if ($admin == true) {
      	echo "<b>admin secret text</b> ";
      	var_dump($admin);
      	?>
      	<div id="container">
          <div id="faqAdminForm">
            <form action="faqPost.php" method="POST">
                <label for="answer">Subject</label>
                <textarea id="answerText" name="answerText" placeholder="Write your answer..""></textarea>

                <label for="messageId">messageId</label>
                <textarea id="messageId" name="messageId" placeholder="Write messageId""></textarea>

                <input type="submit" value="Submit" name="faqAdminButton">

            </form>
          </div>
      </div> 



      <?php
      }
      ?>



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