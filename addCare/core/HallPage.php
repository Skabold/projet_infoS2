<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=addcare','root','');

//increase decrease $lim
if (isset($_POST['DecreaseButton'])) {
	if ( $_SESSION['lim1'] > 0 ) {
		$_SESSION['lim2'] = $_SESSION['lim1'] ;
		$_SESSION['lim1'] = $_SESSION['lim1'] - 15 ;
	}
}

if (isset($_POST['IncreaseButton'])) {
	if ( $_SESSION['lim3'] == 15 ) {
		$_SESSION['lim1'] = $_SESSION['lim2'] ;
		$_SESSION['lim2'] = $_SESSION['lim2'] + 15 ;
	}
}
//echo ($_SESSION['lim1'] . " " . $_SESSION['lim2']);
header("Location: Hall.php");

?>