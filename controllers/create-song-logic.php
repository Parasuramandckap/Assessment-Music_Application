<?php

//this kindof operaation appled to store song to database

$songname = $_POST["song-name"];
$artist = $_POST["artist"];
$playId = $_POST["play-id"];

$artistId=$app["db"]->query("SELECT id FROM artist where artist_name = '$artist'")->fetchAll(PDO::FETCH_ASSOC);
$artistId = $artistId[0]["id"];

$filpath = "images/".$_FILES["file"]["name"];
$tmp_name = $_FILES["file"]["tmp_name"];
move_uploaded_file($tmp_name,$filpath);

$app["db"]->query("INSERT INTO songs(name,song_path,artist_id,playlist_id)VALUES ('$songname','$filpath','$artistId','$playId')");

header("location:/user-home");