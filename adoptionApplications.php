<?php
require_once('DBconnect.php');


$customerID = $_POST['customerID'];
$address = $_POST['address'];
$adoptPet = $_POST['adoptPet'];
$ownPets = $_POST['ownPets'];
$haveYard = $_POST['haveYard'];
$haveChildren = $_POST['haveChildren'];
$stayWith = $_POST['stayWith'];
$petAlone = $_POST['petAlone'];
$housing = $_POST['housing'];
$refName1 = $_POST['refName1'];
$refContact1 = $_POST['refContact1'];
$refEmail1= $_POST['refEmail1'];
$refName2 = $_POST['refName2'];
$refContact2 = $_POST['refContact2'];
$refEmail2 = $_POST['refEmail2'];
$refName3 = $_POST['refName3'];
$refContact3 = $_POST['refContact3'];
$refEmail3 = $_POST['refEmail3'];



$sql = " INSERT INTO adoptionApplications VALUES( '$customerID','$adoptPet' ,
'$address', '$ownPets','$haveYard','$haveChildren','$petAlone','$stayWith','$housing',
'$refName1', '$refContact1','$refName2','$refContact2', '$refName3',
'$refContact3','$refEmail1','$refEmail2', '$refEmail3') ";


$Result = $conn->query($sql);

if (!$Result) {
    die("Error inserting into applications table: " . $conn->error);
}
if(mysqli_affected_rows($conn)){
    echo "<br>Application submitted successfully";
    header("Location: customerhome.php");
    
}
else{
    echo "Submission Failed";
    header("Location: adoptionform.php");
}

?>