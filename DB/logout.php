<?php
session_start();
include("../DB/db.php");
if (!$db){
    echo "ERROR! could not connect to database";
}
header("Location: ../Welcome/welcome.php");
session_destroy();


