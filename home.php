
<?php
session_start();
?>
<script>
    function fun(){
        <?php
            echo "hello";
            ?>
    } 
    </script>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="navbar-brand text-uppercase text-white">
            <span class="clr">E-Cart</span>
        </div>

        <ul class="navbar-nav ml-auto ">
            <li class="nav-item active navbar-nav mr-5">
                <a class="nav-link text-white" href="registration.php">
                    Register now
                </a>
            </li>
            <br />
            <br />
            <li class="nav-item navbar-nav mr-5 ">
                <a class="nav-link text-white">
                    <i class=" fa fa-user" style="font-size:20px"></i> <?php echo  $_SESSION['first_name'], $_SESSION['last_name'];  ?>

                </a>
            </li>
            <br />
            <br />
            <li class="nav-item navbar-nav mr-5 ">
                <a class="nav-link text-white" href="login.php">
                    Log out
                </a>
            </li>
            <br />
            <br />
            <li class="nav-item navbar-nav mr-5 ">
                <a class="nav-link text-white" href="cart.php">
                    <i class="fa fa-cart-plus" aria-hidden="true" style="font-size:30px"></i>
                    </a>
            </li>
        </ul>
    </nav>


    <div class="row" style="margin-top:30px;margin-left:30px">
       
        <?php
        include "connection.php";
         $q = "select * from laptops";
         $query = mysqli_query($con, $q);
        //  $row=mysqli_num_rows($query);
         while($result=mysqli_fetch_array($query)){
         ?>
          <div class="col-4">
          <div class="card" style="width: 18rem;">
                <img class="card-img-top" name="image" width="200px" height="200px" src="./<?php echo $result["image"]?>" alt="Card image cap">
                <div class="card-body">
                <form method="get">
                    <h4 class="card-title" ><?php echo $result["name"]?></h4>
                    <p class="card-text"><?php echo $result["description"]?></p>
                 
                    <button class="btn btn-secondary" type="submit" name="submit" >Buy now</button>
                    </form>
                </div>
            </div>
          </div>

       <?php
         }
       ?>
   
           
</div>




</body>

</html>
