<?php


// this function i'm used to share which user which songs shared logic
$shareuser = $_POST["userid"];
$songname = $_POST["songname"];

print_r($shareuser);
print_r($songname);


$app["db"]->query("UPDATE songs SET to_user='$shareuser',is_shared = 1 WHERE name='$songname'");
header("location:/user-home");