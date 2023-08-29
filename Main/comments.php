<?php include("../HeadFoot/header.php");
        include("../DB/db.php");
    if (!$db){
        echo "ERROR! could not connect to database";
    }
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    $url.= $_SERVER['HTTP_HOST'];     
    $url.= $_SERVER['REQUEST_URI'];    
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $current = $query['id'];
    $_SESSION["post"] = $current;       
    $sql = "SELECT * from locations WHERE post_id ='$current'";
    $result = mysqli_query($db,$sql);
    $location = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<body>
    <div class=page>
        <?php $id = $location['id']; 
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
        <form action="../DB/addcomment.php" method="post" enctype="multipart/form-data">
            <fieldset>
            <label>Add Comment</label>
                <input class="desc3" required minlength="1" maxlength="150" title="150 characters max" type="textArea" rows="4" name="com" placeholder="Comment..."><br>
            </fieldset>
            <input class="publish"type="submit" value="Comment">
        </div>    
        
        <div class="spot">
        <?php 
            $com = "SELECT * from comments WHERE postid = '$current'";
            $comm = mysqli_query($db,$com);
            $comments = mysqli_fetch_all($comm, MYSQLI_ASSOC);
        ?>  
            <?php foreach($comments as $comment){?>
                <?php $userid = $comment['id'];?>
                <div class="comment">
                <?php $sql3 = "SELECT * from user WHERE id ='$userid'";
                $name = mysqli_query($db,$sql3)->fetch_assoc();?>
                <h3 class="commentUser"><?php echo "User: ".($name['username']); ?></h3>
                <h2 class="commentText"><?php echo ($comment['text']); ?></h2>
                <h3 class="commentTime"><?php echo ($comment['time']); ?></h3>
                <?php if($_SESSION["admin"] == 1){
                echo "<a class='commentR' href='../DB/adminC.php?pid=".$comment['comment_id']."'>X</a>"."";
                }?>
                </div>
            <?php }?>    
            </div>
        </div>    
        
</body>
</html>
