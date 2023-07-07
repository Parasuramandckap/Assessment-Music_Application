

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/logout" method="post">
    <input type="submit" value="logout">
</form>
<br>
<?php
$id = $_SESSION["user"]["id"];
$al_primium = $app["db"]->query("SELECT * FROM users WHERE id = '$id'");
$al_primium = $al_primium->fetchAll(PDO::FETCH_ASSOC);


?>
<form action="/primium" method="post">
    <input type="hidden" name="user-id" value="<?php echo $_SESSION["user"]["id"]?>">
    <button type="submit"><?php echo $al_primium ? ' premium': 'request primium'?></button>
</form>

<h5>create a play list</h5>
<form action="/create-playlist" method="post">
    <input type="hidden" name="user-id" value="<?php echo $_SESSION["user"]["id"]?>">
    <input type="text" placeholder="playlist name" name="play-list">
    <button>create playlist</button>
</form>
<br>
<h5>create a artist</h5>

<form action="/artist" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="artist name" name="artist">
    <input type="file" name="file[]" multiple="multiple">
    <input type="submit">
</form>
<?php
   $playlist =  $app["db"]->query("SELECT * FROM playlist");
   $playlist = $playlist->fetchAll(PDO::FETCH_ASSOC);
   ?>
<h3>My play list </h3>
<?php
   foreach ($playlist as $playlists){
       ?>
        <form action="/create-song" method="post">
            <input type="hidden" value="<?php echo $playlists["id"]?>" name="play-id">
            <button><?php echo $playlists["name"]?></button>
        </form>
        <?php
   }
?>
<h2>My songs</h2>
<?php
    $allsong = $app["db"]->query("select * from songs");
    $allsong = $allsong->fetchAll(PDO::FETCH_ASSOC);
    foreach ($allsong as $index=> $allsongs){
        ?>
        <form action="/shared" method="post">
            <input type="text" value="<?php echo $allsongs["name"]?>" name="song-name">
            <button type="submit">share</button>
        </form>

        <?php
    }

?>
<h2>My artist</h2>
<?php
    $artist =  $app["db"]->query("SELECT * FROM artist");
    $artist = $artist->fetchAll(PDO::FETCH_ASSOC);
    foreach ($artist as $index=>$artists){
        ?>
            <form action="/follow" method="post">
                <input type="text" value="<?php echo $artists["artist_name"]?>" name="artist">
                <input type="hidden" value="<?php echo $_SESSION["user"]["id"] ?>" name="user-id">
                <button type="submit"><?php echo $artists["is_follow_id"] ? 'followed' : 'follow' ?></button>
            </form>
        <?php
    }
?>
</body>
</html>