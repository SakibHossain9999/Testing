<?php 

session_start();

require_once 'pdov2.php';


$branch = $_SESSION['branch'];
$branch = strtoupper($branch);

$session = $_SESSION['session'];
$session = strtoupper($session);


function getCustomername(){
    $name = $_SESSION['name'];
    $name = strtoupper($name);
    return $name;
}

     $stmt = $pdo->prepare('DELETE FROM Reservation_details Where Customer_name = :uid AND Reservation_date = :fn AND branch_name = :ln AND Session = :em');
    $stmt->execute(array(
        ':uid' => getCustomername(),
        ':fn' => $_SESSION['date'],
        ':ln' => $branch,
        ':em' => $session));
    
    $_SESSION['message'] =  getCustomername().', thankyou for chossing Restorante ConFusion and your reservation is cancelled';
    $_SESSION['model'] ='done';
    	header("Location: cancelreservationcontroller.php");
        return; 
 ?>