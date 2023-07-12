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
    <h1>create song</h1>
    <form action="/created-song" method="post" enctype="multipart/form-data">
        <input type="text" name="song-name" placeholder="song-name">
        <input type="file" name="file" >
        <input type="text" placeholder="artist name" name="artist">
        <input type="hidden" value="<?php echo $_SESSION["id"] ?>" name="play-id">
        <button>create a song</button>
    </form>
<h2>Song list</h2>
<?php foreach ($playlisSongs as $playlisSongss) :?>
    <h2><?php echo $playlisSongss["name"]?></h2>
<?php endforeach;?>
</body>
</html>