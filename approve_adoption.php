<?php 
    
    require_once("DBconnect.php");
    session_start();

    if (isset($_POST['approve'])){
        $petid = $_POST['petid'];
        $sql_update= "UPDATE pet_list SET Adoption_status='adopted' WHERE Pet_id='$petid'";
        $result = mysqli_query($conn, $sql_update);
        if (!$result){
            echo("Update failed");
        }
        $customerID=$_POST['customer'];
        $adminID=$_SESSION['userID'];
        echo $_SESSION['userID'];
        $sql_add= "INSERT INTO adopted_pets (Pet_id, Adopted_by_Customer, Approved_by_admin) VALUES ('$petid','$customerID','$adminID')";
        $result = mysqli_query($conn, $sql_add);
        if (!$result){
            echo("Insertion failed");
        }
    }

    
    
?>