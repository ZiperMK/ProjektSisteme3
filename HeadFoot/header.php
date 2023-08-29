<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
<style>
<?php include '../FrontEnd/styles.css'; ?>
</style>
</head>
<body>

<ul class="topnav">
  <li><div class="logo">Moxie.si</div></li>  
  <li><a href="../Main/home.php">Home</a></li>
  <li><a href="../Main/addpost.php">Create</a></li>
  <li><a href="#contact">About Us</a></li>
  <?php 
  if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true){echo '<li class="right"><a href="../Main/profile.php">'.$_SESSION["s_username"].'</a></li>';} 
  else{echo '<li class="right"><a href="#notlogged">Not logged in</a></li>';}?>
  
  <li class="right"><a href="../Main/profile.php"></a></li>
</ul>

</body>
</html>