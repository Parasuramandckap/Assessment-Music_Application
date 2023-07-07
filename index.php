<?php
session_start();
$app = [];

require 'connection.php';
$app['db'] = (new database())->db;

$routes = [
    '/'=>'controllers/login.php',
    "/login-page"=>"controllers/login.logic.php",
    "/user-home"=>"controllers/user-home.php",
    "/create-playlist"=>"controllers/create_play.php",
    "/create-song"=>"controllers/create-song.php",
    "/created-song"=>"controllers/create-song-logic.php",
    "/follow"=>"controllers/follow.php",
    "/artist"=>"controllers/artist.php",
    '/shared'=>"controllers/shared_songs.php"

];

if (array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    require $routes[$_SERVER['REQUEST_URI']];
}
else {
    http_response_code(404);
    require 'view/errors/404view.php';
}



?>