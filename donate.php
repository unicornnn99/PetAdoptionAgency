
<!DOCTYPE html> 
<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Camp Paw Paw Homepage</title>
</head>

<body style="background-color: #e4ebec;">
    <form action="endsession.php" method="post">
        <input class="button" type="submit" value="Logout" style="float: right;">
    </form>
    <div class="banner"><a href="index.html"><img src="images/logo.png" width="150" height="150"> </a>
        <h1 class="heading">        Find your new best friend today!</h1>
    </div>
    <div class="banner">
        <a>About us</a> <a>Adopt</a> <a href="vet_appointment.html">Visit a Vet</a> <a>Donate</a> <a>Rehome a Pet</a> <a>Pet Supplies</a>
    </div>
    <div class="box">
        <h2>
            Donate to help your furry friends!
        </h2>
        <h2>
            <?php session_start();
            echo "We appreciate your donation, ".$_SESSION['name']."!"; ?>
        </h2>
        
        <form action="donation.php" method="post">
            <div>
                First Name <input type="text" name="firstName" required>
                Last Name <input type="text" name="lastName" required>
            </div>
            <!-- <div>
                User ID <input type="text" name="customerID" required>
            </div> -->
            <div>Amount you wish to donate <input type="text" name=amount required></div>
            <div>Date <input type="date" name="dateDonated" required></div>
            <div><input class="button" type="submit" value="Proceed to complete donation transaction"></div>
        </form>
    </div>
</body>



