<?php

//the user  click the share button then show the all users

$users = $app["db"]->query("SELECT * FROM users");
$users = $users->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $usr){
    ?>
    <form action="/shared-verify" method="post">
        <input type="hidden" value="<?php echo $usr["id"]?>" name="userid">
        <input type="text" value="<?php echo $usr["email_id"]?>" name="emailid">
        <input type="hidden" value="<?php echo $_POST["song-name"] ?>" name="songname">
        <input type="submit" value="share">
    </form>
    <?php
}

