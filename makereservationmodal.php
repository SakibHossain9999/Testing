<?php 

session_start();

require_once 'pdov2.php';

$branch = $_SESSION['branch'];
$branch = strtoupper($branch);

$session = $_SESSION['session'];
$session = strtoupper($session);


function getNumberofGuest() : int{
        $noguest = $_SESSION['numberofguest'];
        return $noguest;
}


function getCustomername(){
    $name = $_SESSION['name'];
    $name = strtoupper($name);
    return $name;
}

$status = 'confirm';

     $stmt = $pdo->prepare('INSERT INTO Reservation_details
        (Customer_name, Reservation_date, branch_name, Session, Numberofguest, Status) 
    VALUES ( :uid, :fn, :ln, :em, :he, :su)');
    $stmt->execute(array(
        ':uid' => getCustomername(),
        ':fn' => $_SESSION['date'],
        ':ln' => $branch,
        ':em' => $session,
        ':he' => getNumberofGuest(),
        ':su' => $status));
    
    $stmt2 = $pdo->prepare('INSERT INTO Customer_info
        (customer_name, customer_email, customer_phone, customer_address) 
    VALUES ( :cn, :ce, :cp, :ca)');
    $stmt2->execute(array(
        ':cn' => getCustomername(),
        ':ce' => $_SESSION['email'],
        ':cp' => $_SESSION['phone'],
        ':ca' => $_SESSION['address']));
    $_SESSION['message'] = getCustomername().',thankyou for choosing Restorante con Fusion and your reservation is confirmed for your'.getNumberofguest().' Guests';
    $_SESSION['model'] ='done';
    	header("Location: makereservationcontroller.php");
        return; 
 ?>