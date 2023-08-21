<?php
session_start();
include("../DB/db.php");


if (!$db){
    echo "ERROR! could not connect to database";
}
$comment = $_POST["com"];
$date = date("Y-m-d H:i:s");
$insert = "INSERT INTO comments (id, postid, text, time ) VALUES ('$_SESSION[s_id]','$_SESSION[post]', '$comment','$date')";

    if (mysqli_query($db,$insert) === TRUE){
        header("Location:../Main/comments.php?id=".$_SESSION['post']."");
    }else{
        header("Location:../ERROR/dberror.php");
    }

?>
