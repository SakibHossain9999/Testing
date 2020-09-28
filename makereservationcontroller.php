<?php 

session_start();

if (isset($_SESSION['model'])) {
	header("Location: indexv2.php");
}
$_SESSION['numberofguest'] = $_POST['numberofguest'];

$_SESSION['name'] = $_POST['name'];

$_SESSION['email'] = $_POST['email'];

$_SESSION['phone'] = $_POST['phone'];

$_SESSION['address'] = $_POST['address'];

$_SESSION['date'] = $_POST['date'];

$_SESSION['session'] = $_POST['session'];

$_SESSION['branch'] = $_POST['branch'];

header("Location: makereservationmodal.php");
return;
 ?>