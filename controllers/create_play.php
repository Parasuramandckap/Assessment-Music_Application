<?php


//below function create playlist
$userId = $_POST["user-id"];
$playlistName = $_POST["play-list"];


$app['db']->query("INSERT INTO playlist(name,user_id)VALUES ('$playlistName','$userId')");

header("location:/user-home");


