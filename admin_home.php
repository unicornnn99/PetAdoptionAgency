<!DOCTYPE html> 
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Camp Paw Paw Homepage</title>
</head>

<body style="background-color: #e4ebec">
    <form action="endsession.php" method="post">
            <input class="button" type="submit" value="Logout" style="float:right;">
    </form>

    <div class="banner"><a href="index.html"><img src="images/logo.png" width="150" height="150"> </a>
        <h1 class="heading">        Find your new best friend today!</h1>
        
    </div>
    <div class="banner">
    <?php
        session_start();
        echo "<p>Welcome, ".$_SESSION['name']."!</p>";
    ?>
    </div>
    <div class="container">
        <form action="show_applications.php" method="post">
            <input style="padding:15px; background-color:#457374; border:none; border-radius:10px; width:100%; color: white; font-size:17px; margin:0;" 
            type="submit" 
            value="Manage Pet Adoption Applications">
        </form>
        <form action="" method="post">
            <input style="padding:15px; background-color:#457374; border:none; border-radius:10px; width:100%; color: white; font-size:17px; margin:0;" 
            type="submit" value="Manage Pet Rehoming Applications">
        </form>
        <form action="" method="post">
            <input style="padding:15px; background-color:#457374; border:none; border-radius:10px; width:100%; color: white; font-size:17px; margin:0;" 
             type="submit" value="Manage Pet Supplies">
        </form>
    </div>
    
</body>
</html>