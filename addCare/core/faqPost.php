<?php 
session_start();
//connexion to the database
$bdd = new PDO('mysql:host=localhost;dbname=addcare','root','');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="../css/style.css" rel="stylesheet" media="all" type="text/css"> 
		<title>AddCare</title>
	</head>                
	<header>
		<div id="header">
			<!-- emplacement nom / slogan-->
			<div id="hgroup">
		     	<h1><a href="Index.php">AddCare</a></h1>
		     	<h2>Give For Free</h2>
		    </div>
		</div>
		<br><br><br><br><hr><br>
	</header>
   <body>

<?php
//if the button is pressed
if(isset($_POST['faqPostButton']))
	{
		//save the question in database
		$question = htmlspecialchars($_POST['subject']);
		//are u connected ?
		if (isset($_SESSION['userId']))
		{

		$userId = $_SESSION['userId'];
        $reqFaq = $bdd ->prepare("INSERT INTO faq (messageText,Fk_userId,answerText) VALUES (?,?,?)");
        $reqFaq ->execute(array($question,$userId,"no answer yet"));


		}
		
		else
		{
			//need to login
			header("Location: login.php");


		}


	}


	if(isset($_POST['faqAdminButton']))
	{
		//save the answer in database
		var_dump($_POST['answerText']);
		$answerText = htmlspecialchars($_POST['answerText']);
		var_dump($answerText);
		echo $answerText;
		$messageId = htmlspecialchars($_POST['messageId']);
		//are u connected ?
		if (isset($_SESSION['userId']))
		{

		$userId = $_SESSION['userId'];
        $upd = $bdd->prepare( "UPDATE faq SET answerText=? WHERE messageId = ?");
        $upd->execute(array($answerText,$messageId));

		}
		else
		{
			//need to login
			header("Location: login.php");


		}


	}

?>
		<a href ="faq.php"> back to faq</a>
	</body>
</html>