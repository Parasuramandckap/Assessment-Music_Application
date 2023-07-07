<?php




$artist = $_POST["artist"];
$count = count($_FILES["file"]["name"]);

for ($i=0;$i<$count;$i++){

    $filepath = "images/".$_FILES["file"]["name"][$i];
    $tmp_file = $_FILES["file"]["tmp_name"][$i];
    move_uploaded_file($tmp_file,$filepath);
    $app["db"]->query("INSERT INTO artist(artist_name,images_path)values ('$artist','$filepath')");
}

header("location:user-home");

