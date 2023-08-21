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
    
    $update = "UPDATE locations SET likes=likes+1 WHERE  post_id = '$pid'";
    
    $insert = "INSERT INTO likes( uid, post_id ) VALUES('$uid','$pid')";

    if (mysqli_query($db,$insert) === TRUE && mysqli_query($db,$update) === TRUE){
        header("Location:../Main/home.php");
    }else{
        header("Location:../ERROR/dberror.php");
    }

    ?>
