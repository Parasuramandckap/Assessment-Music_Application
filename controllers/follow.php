<?php

//follow function which user which artist followed
$artistName = $_POST["artist"];
$userId =  $_POST["user-id"];


$app["db"]->query("UPDATE artist SET is_follow_id = '$userId' WHERE artist_name='$artistName'");

header("location:/user-home");