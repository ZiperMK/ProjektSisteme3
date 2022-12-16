<?php
session_start();
include("../DB/db.php");


if (!$db){
    echo "ERROR! could not connect to database";
}
$username = $_POST["uname"];
$naslov = $_POST["email"];
$geslo = $_POST["pw_0"];

$sql = "SELECT id FROM user WHERE username = '$username'";
$check = mysqli_query($db,$sql);

if(!$check || mysqli_num_rows($check) == 1){
    header("Location:../ERROR/userexists.php");
}else{
    $insert = "INSERT INTO user (username, password, email, admin) VALUES ('$username','$geslo', '$naslov', false)";

    if (mysqli_query($db,$insert) === TRUE){
        header("Location:../Welcome/login.php");
    }else{
        header("Location:../ERROR/dberror.php");
    }


}
session_destroy();
?>