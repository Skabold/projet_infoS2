<?php 
session_start();
//connexion to the database
$bdd = new PDO('mysql:host=localhost;dbname=addcare','root','');

//if the button SignIn is pressed
if(isset($_POST['SignIn']))
	{
		$sign = 0;
		header("Location: login.php?SignId=".$sign);
	}

//if the button SignUp is pressed
if(isset($_POST['SignUp']))
	{
		$sign = 1;
		header("Location: login.php?SignId=".$sign);
	}

?>