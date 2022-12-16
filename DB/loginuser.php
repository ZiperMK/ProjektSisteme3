<?php
session_start();
include("../DB/db.php");


if (!$db){
    echo "ERROR! could not connect to database";
}
$username = $_POST["uname"];
$geslo = $_POST["pw"];

$sql = "SELECT id FROM user WHERE username = '$username' AND password = '$geslo'";
$check = mysqli_query($db,$sql);

if(!$check || mysqli_num_rows($check) == 1){
    header("Location:../ERROR/userexists.php");
}else{
    header("Location:../Welcome/login.php");
}
session_destroy();
?>