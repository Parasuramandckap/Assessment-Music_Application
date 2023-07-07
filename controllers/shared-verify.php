<?php


//i'm not implemented share feature
$shareuser = $_POST["userid"];
$songname = $_POST["songname"];

//print_r($songname);
//print_r($shareuser);
$app["db"]->query("UPDATE FROM songs SET to_usr='$shareuser',is_shared = 1 WHERE name='$songname'");
header("location:/user-home");