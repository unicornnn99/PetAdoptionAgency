<?php 
    session_start();
    require_once("DBconnect.php");

    if (isset($_POST['Reject'])){
        $customerID = $_POST['customer'];
        $sql_del= "DELETE FROM adoptionapplications WHERE Customer_ID='$customerID'";
        $result = mysqli_query($conn, $sql_del);
        if (!$result){
            echo("Update failed");
        }
        
    }

    
    
?>