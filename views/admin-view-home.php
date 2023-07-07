
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/logout" method="post">
    <input type="submit" value="logout">
</form>
<h3>waiting for primium</h3>
<?php
$primium = $app["db"]->query("SELECT * FROM primium where progras = 'waiting'");
$primium = $primium->fetchAll(PDO::FETCH_ASSOC);



foreach ($primium as $pri){
    ?>
    <form action="/primium-verifiy" method="post">
        <input type="text" value="<?php echo $pri["users_id"]?>" name="user-id">
        <button type="submit">approve</button>
    </form>
    <?php
}

?>
<br>
<h4>add songs </h4>
<div>
    <form action="/created-song" method="post" enctype="multipart/form-data">
        <input type="text" name="song-name" placeholder="song-name">
        <input type="file" name="file" >
        <input type="text" placeholder="artist name" name="artist">
        <input type="hidden" value="<?php echo $_SESSION["id"] ?>" name="play-id">
        <button>create a song</button>
    </form>
</div>
<br>
<h4>add artist</h4>
<form action="/artist" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="artist name" name="artist">
    <input type="file" name="file[]" multiple="multiple">
    <input type="submit">
</form>

<?php

$users = $app["db"]->query("SELECT * FROM users");
$users = $users->fetchAll(PDO::FETCH_ASSOC);

?>
<h4>all users</h4>

<?php
    foreach ($users as $user){
        ?>
        <h2><?php echo $user["email_id"]?></h2>
        <?php
    }


?>
<h4>primium users</h4>
<?php
 $primiumUser = $app["db"]->query("SELECT * FROM users where is_premium = 1");
 $primiumUser = $primiumUser->fetchAll(PDO::FETCH_ASSOC);
 foreach ($primiumUser as $primium){
    ?>
    <h4><?php echo $primium["email_id"]?></h4>
    <?php
 }
?>



</body>

</html>
