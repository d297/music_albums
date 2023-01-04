<?php
    require_once("connection.php");
    $id = $_GET['id'];
    if($id == ""){
        header("Location: index.php");
    }
    $query = $connection -> query("SELECT albums.id, albums.title, albums.rating, albums.cover, artists.name, artists.description FROM albums JOIN artists ON albums.id_artist=artists.id WHERE  albums.id='$id'");
    
    $row=$query -> fetch_assoc();
    if(!$row['id']){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Album-title</title>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet">
        <script src="./js/averColor.js"></script>
    </head>
    <body class="wFull">
        <div id="cover-bg">
            <img id="cover" src="./img/covers/<?php echo $row['cover']?>" />
            <h2 class="artist-name"><?php echo $row['name']?></h2>
            <img class="arrow" src="./img/angle-down-solid.png" />	
        </div>
        <div class="w600">
            <h1><?php echo $row['title']?></h1>
            <p>
            <?php echo $row['description']?>
            </p>
        </div>		
    </body>
</html>



