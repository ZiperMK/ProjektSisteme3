<?php include("../HeadFoot/header.php");
        include("../DB/db.php");
    if (!$db){
        echo "ERROR! could not connect to database";
    }  
    $sql = 'SELECT * from locations ORDER BY date DESC';
    $result = mysqli_query($db,$sql);
    $locations = mysqli_fetch_all($result, MYSQLI_ASSOC); 
?>
<body>
    <div class="filters">
        <h2 class="query">Filter:</h2>
        <a class="query" href="../Main/query.php?loc=ML">Most Liked</a>
        <h2 class="query">Cities:</h2>
        <a class="query" href="../Main/query.php?cit=Ljubljana">Ljubljana</a>
        <a class="query" href="../Main/query.php?cit=Maribor">Maribor</a>
        <a class="query" href="../Main/query.php?cit=Koper">Koper</a>
        <a class="query" href="../Main/query.php?cit=Celje">Celje</a>
        <a class="query" href="../Main/query.php?cit=Kranj">Kranj</a>
        <h2 class="query">Regions:</h2>
        <a class="query" href="../Main/query.php?loc=Pomurska">Pomurska</a>
        <a class="query" href="../Main/query.php?loc=Podravska">Podravska</a>
        <a class="query" href="../Main/query.php?loc=Koroška">Koroška</a>
        <a class="query" href="../Main/query.php?loc=Savinjska">Savinjska</a>
        <a class="query" href="../Main/query.php?loc=Zasavska">Zasavska</a>
        <a class="query" href="../Main/query.php?loc=Posavska">Posavska</a>
        <a class="query" href="../Main/query.php?loc=Jugovzhodna Slovenija">Jugovzhodna Slovenija</a>
        <a class="query" href="../Main/query.php?loc=Primorsko-notranjska">Primorsko-notranjska</a>
        <a class="query" href="../Main/query.php?loc=Osrednjeslovenska">Osrednjeslovenska</a>
        <a class="query" href="../Main/query.php?loc=Gorenjska">Gorenjska</a>
        <a class="query" href="../Main/query.php?loc=Goriška">Goriška</a>
        <a class="query" href="../Main/query.php?loc=Obalno-kraška">Obalno-kraška</a>
    </div>
    <div class="page">
    <?php foreach($locations as $location){?>
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
    </div>  
    <?php } ?>
    </div>
</body>