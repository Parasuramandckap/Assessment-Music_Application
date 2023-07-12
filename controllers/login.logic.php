<?php


//get input for user email and password
$email = $_POST["email"];
$password = $_POST["password"];

//its check normail logged in user
$normalUser = $app["db"]->query("SELECT * FROM users where email_id = '$email'AND password = '$password' AND is_admin = 0");
$normalUser = $normalUser->fetchAll(PDO::FETCH_ASSOC);

//it query check admin user
$adminUser = $app["db"]->query("SELECT * FROM users where email_id = '$email'AND password = '$password' AND is_admin = 1");
$adminUser = $adminUser->fetchAll(PDO::FETCH_ASSOC);


//input empty the user stay in login page
if (empty($email) && empty($password)){
    header("location:/");
}
//the user loginin goto user page
if ($normalUser){
    $_SESSION["user"]=[
        "email"=>$email,
        'id'=>$normalUser[0]["id"]
    ];
    header("location:/user-home");

}
//the admin loginin goto admin page

if ($adminUser){
    header("location:/admin-home");
}



//the use will be enter the php mailer the send
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'parasuramanadckap@gmail.com';                     //SMTP username
    $mail->Password   = 'wptbcrjmrbtivryh';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('parasuramanadckap@gmail.com', 'Mailer');
    $mail->addAddress("$email", 'User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'thanks for login';
    $mail->Body    = "welcome $email";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}