<!DOCTYPE html> 
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a href="aboutus.html">About us</a> <a href="show_cats.php">Adopt</a> <a href="vet_appointment.html">Visit a Vet</a> <a href="donate.php">Donate</a> <a>Rehome a Pet</a> <a>Pet Supplies</a>
    </div>
    <?php
        session_start();
        echo "Welcome, ".$_SESSION['name']."!";
    ?>
    
</body>
</html>