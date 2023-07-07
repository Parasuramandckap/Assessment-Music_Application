<?php


$userId = $_POST["user-id"];

$app["db"]->query("UPDATE users SET is_premium = 1 where id = '$userId'");

$app["db"]->query("UPDATE primium SET progras ='done' where users_id = '$userId' ");
header("location:/admin-home");
