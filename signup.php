<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMP PAW PAW</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1 align="center"> Please fillup the required information below!</h1>

    <div class="container mt-5">
        <?php
        if (isset($_POST["submit"])) {
            $role = $_POST["role"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $userID = $_POST["userID"];
            $address = $_POST["address"];
            $nid = $_POST["nid"];
            $phone = $_POST["phone"];
            $u_password = $_POST["u_password"];
            $repeatpassword = $_POST["repeat_password"];

            $errors = array();
            if (empty($fullname) or empty($email) or empty($address) or empty($nid) or empty($phone) or empty($repeatpassword)) {
                array_push($errors, "All fields must be filled.");
            }

            if ($u_password !== $repeatpassword) {
                array_push($errors, "Passwords do not match");
            }

            if (strlen($phone) < 11) {
                array_push($errors, "Phone number not valid");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email id");
            }

            require_once "DBconnect.php";

            $sql_nid = "SELECT * FROM customer WHERE nid = '$nid'";
            $res_nid = mysqli_query($conn, $sql_nid);
            $num_nid = mysqli_num_rows($res_nid);

            if ($num_nid > 0) {
                array_push($errors, "User with the same NID already exists");
            }

            $sql_email = "SELECT * FROM user WHERE email = '$email'";
            $res_email = mysqli_query($conn, $sql_email);
            $num_email = mysqli_num_rows($res_email);

            if ($num_email > 0) {
                array_push($errors, "Email id already exists");
            }

            $sql_userID = "SELECT * FROM user WHERE user_ID = '$userID'";
            $res_userID = mysqli_query($conn, $sql_userID);
            $num_userID = mysqli_num_rows($res_userID);

            if ($num_userID > 0) {
                array_push($errors, "User ID already exists");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql="INSERT INTO user VALUES ('$userID','$email','$u_password','$role')";
                $Result = $conn->query($sql);
                if ($role == "Customer"){
                    $sql1 = "INSERT INTO customer VALUES ('$userID','$fullname','$email','$nid','$phone','$address')";
                    $res = $conn->query($sql1);
                } else {
                    $sql= "INSERT INTO employee VALUES ('$userID','$fullname','$phone')";
                    $Result = $conn->query($sql);
                    
                    if ($role =="Admin"){
                        $sql="INSERT INTO admin VALUES ('$userID')";
                        $Result = $conn->query($sql);
                    } else {
                        $sql = "INSERT INTO vet VALUES ('$userID')";
                        $Result = $conn->query($sql);
                    }
                    echo "Sign up completed successfully!";
                }
            }
        }

        ?>
        <form action="signup.php" method="post">

            <div class="form-group">
            <label for="role">Are you signing up as a customer or employee?</label>
                <select name="role" id="role">
                    <option value="Customer">Customer</option>
                    <option value="Admin">Admin</option>
                    <option value="Vet">Vet</option>
                </select>
            </div><br>
            <div class="form-group">
                <label for="fullname">Full Name: </label>
                <input type="text" class="form-control" name="fullname" placeholder="Enter fullname">
            </div><br>

            <div class="form-group">
                <label for="email">E-mail: </label>
                <input type="email" class="form-control" name="email" placeholder="Enter email address">
            </div><br>

            <div class="form-group">
                <label for="userID">Unique User ID </label>
                <input type="text" class="form-control" name="userID" placeholder="Enter unique user ID">
            </div><br>

            <div class="form-group">
                <label for="address">Address: </label>
                <input type="text" class="form-control" name="address" placeholder="houseno., road, city">
            </div><br>

            <div class="form-group">
                <label for="nid">NID no.: </label>
                <input type="number" class="form-control" name="nid" placeholder="Enter nid number">
            </div><br>

            <div class="form-group">
                <label for="phone">Phone Number: </label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter Phone no.">
            </div><br>

            <div class="form-group">
                <label for="u_password">Password: </label>
                <input type="password" class="form-control" name="u_password" placeholder="Password">
            </div><br>


            <div class="form-group">
                <label for="repeat_password">ReWrite password: </label>
                <input type="password" class="form-control" name="repeat_password" placeholder="Type password again">
            </div><br>

            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form><br>
        <button>
            <a href="index.html">GO TO HOME PAGE</a>
        </button>


    </div>


</body>

</html>