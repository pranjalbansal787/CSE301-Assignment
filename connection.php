<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "emailphp";
$con = mysqli_connect($server, $user, $password, $db);
if ($con) {
?>

    <script>
        alert("connection successfulll");
    </script>
<?php
} else {
?>
    <script>
        alert("something went wrong");
    </script>
<?php
}

?>
