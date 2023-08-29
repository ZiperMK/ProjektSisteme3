<?php include("../HeadFoot/header.php");
        include("../DB/db.php");
    if (!$db){
        echo "ERROR! could not connect to database";
    }    
    
    ?><body>
         
    <div class="page">     
    <?php
    $ids = $_SESSION["s_id"];
    $sql = "SELECT postid from favorites WHERE id ='$ids' ORDER BY time DESC";
    $result = mysqli_query($db,$sql);
    $favorites = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    foreach($favorites as $favorite){
        $display = $favorite['postid'];
        $sql3 = "SELECT * FROM locations WHERE post_id='$display' ORDER BY date DESC"; 
        $result2 = mysqli_query($db,$sql3);
        while ($location = $result2->fetch_assoc()) {
            $id = $location['id']; 
            $sql2 = "SELECT * from user WHERE id ='$id'";
            $name = mysqli_query($db,$sql2)->fetch_assoc();?>
            <div class="spot">
            <h3 class="username"><?php echo ("By: ".$name['username']); ?></h3>
            <?php $pid = $location['post_id'] ?>
            <h1><?php echo ($location['title']); ?></h1>
            <h2><?php echo ($location['description']); ?></h2>
            <?php $image = $location['photo'];
            echo "<div class='photo'><img style='max-width: 700px; max-height:700px;';' src='data:image/jpeg;base64,".$image."'/></div>"; ?>
            <h3 class="location"><?php echo ($location['region']); ?></h3>
            <h3 class="location"><?php echo ($location['city'].", ".$location['address']); ?></h3>
            <h3 class="date"><?php echo ($location['date']); ?></h3>
            <h3 class="likes"><?php echo ("Likes: ".$location['likes']); ?></h3>
            <div class="buttons">
            <?php 
                $uid = $_SESSION["s_id"];
                $likesquery = "SELECT * from likes WHERE uid ='$uid'AND post_id = '$pid'";
                $check = mysqli_query($db,$likesquery);
                if($check && mysqli_num_rows($check) == 1){
                    echo "<a class='commentB' href='#liked'>liked</a>";
                }else{
                   echo "<a class='commentB' href='../DB/likes.php?uid=".$uid."&pid=".$pid."'>like</a>"."";
                }
        
                echo "<a class='commentB' href='../Main/comments.php?id=".$pid."'>comments</a>";
    
                $favoritesquery = "SELECT * from favorites WHERE id ='$uid'AND postid = '$pid'";
                $checks = mysqli_query($db,$favoritesquery);
                if($checks && mysqli_num_rows($checks) == 1){
                    echo "<a class='commentB' href='../DB/remfavorites.php?uid=".$uid."&pid=".$pid."'>Remove favorite</a>"."";
                }else{
                   echo "<a class='commentB' href='../DB/addfavorites.php?uid=".$uid."&pid=".$pid."'>Add to favorites</a>"."";
                }if($_SESSION["admin"] == 1){
                    echo "<a class='commentR' href='../DB/admin.php?pid=".$pid."'>X</a>"."";
                }
            ?>
            </div>
        </div>  
        </body>
        <?php 
        }
    }
?>