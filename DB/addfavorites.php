<?php
session_start();
include("../DB/db.php");
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
    $url = "http://";
    $url.= $_SERVER['HTTP_HOST'];     
    $url.= $_SERVER['REQUEST_URI'];    
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $uid = $query['uid'];
    $pid = $query['pid'];
    $date = date("Y-m-d H:i:s");
    
   

    $insert = "INSERT INTO favorites(id, postid, time ) VALUES('$uid','$pid','$date')";

    if (mysqli_query($db,$insert) === TRUE){
        header("Location:../Main/favorites.php");
    }else{
        header("Location:../ERROR/dberror.php");
    }

    ?>
