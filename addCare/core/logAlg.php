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
if(isset($_POST['login']))
	{
		//encrypt the password and save username
		$usernameL = htmlspecialchars($_POST['usernameL']);
    	$passwordL = sha1($_POST['passwordL']);

    	//Look if the user exist and if the password is correct
    	$requserinfo = $bdd->prepare("SELECT * FROM userinfo WHERE username = ? AND password = ?");
        $requserinfo->execute(array($usernameL, $passwordL));
        $userexist = $requserinfo->rowCount();

        if($userexist == 1)
	        { 
	        	//Download information about the current user :
	        	$userinfo = $requserinfo->fetch();
	            $_SESSION['userId'] = $userinfo['userId'];
	            $_SESSION['username'] = $userinfo['username'];
	            $_SESSION['donation'] = $userinfo['donation'];
	            //not secure at all
	            $_SESSION['admin'] = $userinfo['admin'];


	        	//if the password and username are correct
	        	header("Location: Index.php");
	        }
	    else 
		    {
		    	//if it's incorrect
		    	 $erreur = "Bad username / password";
                 echo $erreur;
		    }

	}

?>
		<a href ="Login.php"> back to login</a>
	</body>
</html>