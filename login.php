<?php

session_start();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background-image: url('mackbook.jpg');
        }
    </style>


</head>

<body>
    <?php
    include("connection.php");
    if (isset($_POST["submit"])) {
        $email = $_POST["username"];
        $password = $_POST["password"];
        $email_search = "select * from registration3 where email='$email'";
        $query = mysqli_query($con, $email_search);
        $email_count = mysqli_num_rows($query);
        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $_SESSION['first_name'] = $email_pass['first_name'];
            $_SESSION['last_name'] = $email_pass['last_name'];
            $pass_decode = password_verify($password, $db_pass);
            if ($pass_decode) {


                if (isset($_POST["remember"])) {
                    setcookie('emailcookie', $email, time() + 86400);
                    setcookie('passwordcookie', $password, time() + 86400);
                    header('location:home.php');
                } else {
                    header('location:home.php');
                }
            } else {
    ?>
                <script>
                    alert("password incorrect");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("invalid email");
            </script>
    <?php
        }
    }
    ?>
    <div class="login-form">
        <form method="post">
            <h2 class="text-center"  style="color:red">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required" name="username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required" name="password">
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember"  style="color:red"> Remember Me
            </div>


            <button class="btn btn-primary btn-block" name="submit">submit

            </button>


        </form>



        <p class="text-center"><a href="registration.php">register</a></p>

        <h3></h3>
    </div>


</body>

</html>
