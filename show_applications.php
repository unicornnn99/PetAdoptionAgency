<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet" />
    <title>adoption applications</title>
</head>
<body style="background-color: #b3c4c5;">
    
    <div class="banner"><a href="index.html"><img src="images/logo.png" width="150" height="150"> </a>
            <h1 class="heading">        Find your new best friend today!</h1>
    </div>
    
    <form action="endsession.php" method="post">
        <input class="button" type="submit" value="Logout" style="float: right;">
    </form>
    
    <main>
        <section>
            <div class="applications_box">
                <h1>Applications List</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Pet ID</th>
                            <th>Customer Address</th>
                            <th>Own Pets?</th>
                            <th>Have Yard?</th>
                            <th>have Children?</th>
                            <th>How many hours will the pet stay alone?</th>
                            <th>Who will the pet stay with when customer is away?</th>
                            <th>Housing</th>
                            <!-- <th>Ref1 Name</th>
                            <th>Ref1 Contact</th>
                            <th>Ref2 Name</th>
                            <th>Ref2 Contact</th>
                            <th>Ref3 Name</th>
                            <th>Ref3 Contact</th>
                            <th>Ref1 Email</th>
                            <th>Ref2 Email</th>
                            <th>Ref3 Email</th> -->
                            <th>Approve</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        session_start();
                        require_once("DBconnect.php");
                        $sql = "SELECT * FROM adoptionapplications";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $row["Customer_ID"]; ?></td>
                            <td><?php echo $row["adoptPet"]; ?></td>
                            <td><?php echo $row["customerAddress"]; ?></td>
                            <td><?php echo $row["ownPets"]; ?></td>
                            <td><?php echo $row["haveYard"]; ?></td>
                            <td><?php echo $row["haveChildren"]; ?></td>
                            <td><?php echo $row["petAlone"]; ?></td>
                            <td><?php echo $row["stayWith"]; ?></td>
                            <td><?php echo $row["housing"]; ?></td>
                            <!-- <td><?php echo $row["refName1"]; ?></td>
                            <td><?php echo $row["refContact1"]; ?></td>
                            <td><?php echo $row["refName2"]; ?></td>
                            <td><?php echo $row["refContact2"]; ?></td>
                            <td><?php echo $row["refName3"]; ?></td>
                            <td><?php echo $row["refContact3"]; ?></td>
                            <td><?php echo $row["refEmail1"]; ?></td>
                            <td><?php echo $row["refEmail2"]; ?></td>
                            <td><?php echo $row["refEmail2"]; ?></td> -->

                            <td>
                            <form action="approve_adoption.php" method="post">
                                <input type="hidden" name="petid" value="<?php echo $row['adoptPet'];?>">
                                <input type="hidden" name="customer" value="<?php echo $row['Customer_ID'];?>">
                                <input type="submit" name="approve" value="Approve"> 
                            </form>
                            </td>
                            <td>   
                            <form action="reject_application.php" method="post">
                                <input type="hidden" name="customer" value="<?php echo $row['Customer_ID'];?>">
                                <input type="submit" name="Reject" value="Reject"> 
                            </form>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
