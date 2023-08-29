<?php include("../HeadFoot/header.php");
        include("../DB/db.php");
    if (!$db){
        echo "ERROR! could not connect to database";
    } 
?>
<body>
<div class="spot">
<h1> <?php echo $_SESSION["s_username"]."'s Profile"; ?> </h1>
<h3><?php echo "Username - ".$_SESSION["s_username"]; ?> </h3>
<h3><?php echo "Email - ".$_SESSION["email"]; ?> </h3>
<h3><?php if($_SESSION["admin"] == 1){
                echo "Admin Status : Yes";
        }else{
            echo "Admin Status : No"; }?> </h3>
<a class="commentB" href="../Main/myposts.php">My posts</a>
<a class="commentB" href="../Main/favorites.php">Favorites</a>
<a class="commentB" href="../DB/logout.php">Logout</a>
</div>

</body>