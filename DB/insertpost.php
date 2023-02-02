<?php
session_start();
include("../DB/db.php");


if (!$db){
    echo "ERROR! could not connect to database";
}

$title = $_POST["title"];
$desc = $_POST["desc"];
$region = $_POST["region"];
$city = $_POST["city"];
$address = $_POST["add"];
$date = date("Y-m-d H:i:s");
$likes = 0;
    
        $fileName = basename($_FILES["pic"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['pic']['tmp_name']; 
            $photo = addslashes(file_get_contents($image));
        }
   
    $encoded = base64_encode($photo);
    $insert = "INSERT INTO locations (id, title , description , photo, region, city, address, date, likes) VALUES ( '$_SESSION[s_id]', '$title' , '$desc' , '$encoded', '$region', '$city', '$address', '$date', '$likes')";   
    if (mysqli_query($db,$insert) === TRUE){
        header("Location:../Main/home.php");
    }else{
        echo " Error";
    }

?>