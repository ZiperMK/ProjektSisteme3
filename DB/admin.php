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
    $pid = $query['pid'];
    

    $delete = "DELETE FROM locations WHERE post_id = '$pid'";

    if (mysqli_query($db,$delete) === TRUE){
        header("Location:../Main/home.php");
    }else{
        header("Location:../ERROR/dberror.php");
    }

    ?>

