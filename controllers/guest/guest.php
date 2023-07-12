<?php

//get the song from database
$songs = $app['db']->query("SELECT name from songs;")->fetchAll(PDO::FETCH_ASSOC);

require "views/guest.php";