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
    <div id='container'>

<?php
if(isset($_POST['register'])) {
	//Save of user informations + hash of password + password length < 20
    $usernameR = htmlspecialchars($_POST['usernameR']); 
    $passwordR = sha1($_POST['passwordR']);
    $donation = 0;
    $email = $_POST['email'];
    $admin='0';

    $usernamerlength = strlen($usernameR);
    if($usernamerlength <= 20) 
        {
            //on vérifie que l'utilisateur n'existe pas
            $requserinfo = $bdd->prepare("SELECT * FROM userinfo WHERE username = ?");
            $requserinfo ->execute(array($usernameR));
            $userexist = $requserinfo->rowCount();

            if($userexist ==0) 
                {
                    //Create the user (commit informations in the userinfo table)
                    $insertuserinfo = $bdd->prepare("INSERT INTO userinfo(username,password,donation,email,admin) VALUES(?,?,?,?,?)");
                    $insertuserinfo ->execute(array($usernameR,$passwordR,$donation,$email,$admin));


                 
                    $erreur = "Votre compte à bien été crée ! Veuillez vous connecter.";
                    echo $erreur;
                    

                }


    else
                {
                   $erreur = "user already exist";
                   echo $erreur; 
                }
            
        
        }

    else
        {
           $erreur = "user length > 20";
           echo $erreur; 
        }
        
        
} 


?>


   		<a href ="Login.php"> BACK TO LOGIN</a>
    </div>
   	</body>
</html>

