<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMP PAW PAW LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <?php
        
        if (isset($_POST["Login"])) {
            require_once "DBconnect.php";
            $email = $_POST["email"];
            $userpassword = $_POST["password"];
            $sql = "SELECT * FROM user WHERE email='$email' AND password='$userpassword'";
            $result = mysqli_query($conn, $sql);

            if ($result) { 
                $user = mysqli_fetch_assoc($result);
                session_start(); 
                if ($user['Role']==='Customer') {
                    // Redirect to some secure page after successful login
                    $sql = "SELECT * FROM customer WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    $customer = mysqli_fetch_assoc($result);
                    $_SESSION['userID']=$customer['Customer_ID'];
                    $_SESSION['name']=$customer['Name'];
                    header("Location: customerhome.php");

                } 
                if ($user['Role']==='Admin'){
                    $userid=$user['user_ID'];
                    $sql = "SELECT * FROM employee WHERE Employee_ID='$userid'";
                    $result = mysqli_query($conn, $sql);
                    $employee = mysqli_fetch_assoc($result);
                    $_SESSION['userID']=$employee['Employee_ID'];
                    $_SESSION['name']=$employee['Name'];
                    header("Location: admin_home.php");

                } 
                if ($user['Role']==='Vet') {
                    $userid=$user['user_ID'];
                    $sql = "SELECT * FROM employee WHERE Employee_ID='$userid'";
                    $result = mysqli_query($conn, $sql);
                    $employee = mysqli_fetch_assoc($result);
                    $_SESSION['userID']=$employee['Employee_ID'];
                    $_SESSION['name']=$employee['Name'];
                    header("Location: vethome.php");
            } else { 
                echo "<div class='alert alert-danger'> Email or password is incorrect </div>"; 
                }
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email address" required>
            </div><br>

            <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div><br>

            <input type="submit" class="btn btn-primary" name="Login" value="Login">

            <input type="submit" class="btn btn-primary" name="forgotpass" value="Forgot password"><br>

            <div>
                <p>Not a member yet? <a href="signup.php">Signup Here!</a></p>
            </div>
        </form>
    </div>
</body>

</html>