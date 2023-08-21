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
    


    $insert = "DELETE FROM favorites WHERE id = '$uid' AND postid ='$pid'";

    if (mysqli_query($db,$insert) === TRUE){
        header("Location:../Main/home.php");
    }else{
        header("Location:../ERROR/dberror.php");
    }

    ?>