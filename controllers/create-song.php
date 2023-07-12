<?php

//this page used to get playlist id and create song
$_SESSION["id"] = $_POST["play-id"];
$playListId = $_POST["play-id"];

$playlisSongs= $app["db"]->query("SELECT * FROM songs where playlist_id= '$playListId'")->fetchAll(PDO::FETCH_ASSOC);

require "views/create-view.song.php";

