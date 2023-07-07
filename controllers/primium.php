<?php


$userId = $_POST["user-id"];


$app["db"]->query("INSERT INTO primium(users_id)VALUES ('$userId')");

header("location:/user-home");
