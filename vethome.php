<!DOCTYPE html> 
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Camp Paw Paw Homepage</title>
</head>

<body>
    <form class="button" action="endsession.php" method="post">
        <input type="submit" value="Logout">
    </form>
    <div class="banner"><a href="index.html"><img src="images/logo.png" width="150" height="150"> </a>
        <h1 class="heading">        Find your new best friend today!</h1>
    </div>
    <div class="banner">
    <?php
        session_start();
        echo "Welcome, ".$_SESSION['name']."!";
    ?>
    </div>
    
    
</body>
</html>