<?php
//this below function admin create songs and stroe database

$lastPlatListId = $app["db"]->query("SELECT id FROM playlist ORDER by id DESC LIMIT 1")->fetchAll(PDO::FETCH_NUM);
$lastPlatListId = $lastPlatListId[0][0];


$songName = $_POST["song-name"];
$artisName = $_POST["artist"];

$filePath = "images/".$_FILES["file"]["name"];
$tempName = $_FILES["file"]["tmp_name"];

$artistID= $app["db"]->query("SELECT id from artist where artist_name= '$artisName'")->fetchAll(PDO::FETCH_NUM);
$artistID = $artistID[0][0];


$app["db"]->query("INSERT INTO songs(name,song_path,artist_id,playlist_id)VALUES ('$songName','$filePath','$artistID','$lastPlatListId')");

header("location:/admin-home");