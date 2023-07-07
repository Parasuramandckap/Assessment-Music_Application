<?php



$songname = $_POST["song-name"];
$artist = $_POST["artist"];
$playId = $_POST["play-id"];
switch ($artist){
    case "harris":
         $result = 1;
        break;
    case "yuvan":
        $result = 2;
        break;
    case "illayaraja":
        $result = 3;
}

$filpath = "images/".$_FILES["file"]["name"];
$tmp_name = $_FILES["file"]["tmp_name"];
move_uploaded_file($tmp_name,$filpath);

$app["db"]->query("INSERT INTO songs(name,song_path,artist,playlist_id)VALUES ('$songname','$filpath','$result','$playId')");

header("location:/user-home");