<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Bootstrap Simple Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

</head>

<body>
    <?php
    include "connection.php";

    if (isset($_POST["submit"])) {
        $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
        $last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);
        $confirm_password = mysqli_real_escape_string($con, $_POST["confirm_password"]);
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($confirm_password, PASSWORD_BCRYPT);

        $emailquery = "select * from registration3 where email='$email'";
        $query = mysqli_query($con, $emailquery);
        $emailcount = mysqli_num_rows($query);
        if ($emailcount > 0) {
    ?>

            <script>
                alert("email already exist");
            </script>
            <?php
        } else {
            if ($password === $confirm_password) {
                $insertquery = "insert into registration3 values('$first_name','$last_name','$email','$pass','$cpass')";
                $iquery = mysqli_query($con, $insertquery);
                if ($iquery) {

                    header('location:login.php');
                } else {
            ?>
                    <script>
                        alert("registered failed");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("passeord is not same");
                </script>

    <?php
            }
        }
    }

    ?>
    <div class="signup-form">
        <form method="post">
            <h2 style="color:red">Register</h2>
            <p style="color:red" class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group">
                <div class="row">
                    <i class="fa fa-user" style="font-size:30px"></i>
                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <i class="fa fa-user" style="font-size:30px"></i>
                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required" ng-model="abc"></div>
                </div>
            </div>
            <div class="form-group">

                <i class="fa fa-envelope" style="font-size:30px"></i> <input type="email" class="form-control" name="email" placeholder="Email" required="required" />

            </div>
            <div class="form-group">
                <i class="fa fa-unlock-alt" style="font-size:30px"></i>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <i class="fa fa-unlock-alt" style="font-size:30px"></i>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-lg btn-block" name="submit">Register Now</button>
            </div>
        </form>

        <div class="text-center" style="color:red">Already have an account? <a href="login.php">return to login page</a></div>
    </div>
</body>

</html>
