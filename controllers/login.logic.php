<?php



$email = $_POST["email"];
$password = $_POST["password"];
$normalUser = $app["db"]->query("SELECT * FROM users where email_id = '$email'AND is_admin = 0");
$normalUser = $normalUser->fetchAll(PDO::FETCH_ASSOC);


if ($normalUser){
    $_SESSION["user"]=[
        "email"=>$email,
        'id'=>$normalUser[0]["id"]
    ];
    header("location:/user-home");

}
else{
    $_SESSION["password-not-match"] = "not matching";
    header("location:/");
}