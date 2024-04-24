<?php
require_once('DBconnect.php');
session_start();

$customerID = $_SESSION['userID'];
$amount = $_POST['amount'];
$date_donated = $_POST['dateDonated'];


$sql = "INSERT INTO donation (Amount, dateDonated, Customer_ID) VALUES('$amount','$date_donated','$customerID')";

$result= mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)){
    require_once('payment.php');    
}else{
    echo "Submission Failed";
    header("Location: index.html");
}

?>
