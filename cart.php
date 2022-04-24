<?php
 function fun(){
     echo "hello";
 }
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <h3>My Cart</h3>
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
                <h4 class="card-title" ><?php echo $result["name"]?></h4>
                    <p class="card-text"><?php echo $result["description"]?></p>
                 
                   
                    
                </div>
            </div>
          </div>

       <?php
         }
       ?>
   
           
</div>




</body>

</html>



