<?php
session_start();
include("../DB/db.php");


if (!$db){
    echo "ERROR! could not connect to database";
}
$username = $_POST["uname"];
$geslo = $_POST["pw"];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$geslo'";
$check = mysqli_query($db,$sql);

if($check && mysqli_num_rows($check) == 1){
    $id=$check->fetch_assoc();
    $_SESSION["s_id"] = $id["id"];
    $_SESSION["s_username"] = $username;
    $_SESSION["email"] = $id["email"];
    $_SESSION["logged"] = true;
    $_SESSION["admin"] = $id["admin"];
    header("Location:../Main/home.php");
}else{
    header("Location:../ERROR/dberror.php");
}
?>