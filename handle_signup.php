<?php
require __DIR__ . '/vendor/autoload.php';  
require "conf.php";
require "db_conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;  

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF; 
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $conf['smtp_user'];                     
    $mail->Password   = $conf['smtp_pass'];                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    $mail->setFrom($conf['smtp_user'], 'Jason Wachira'); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['fullname'];
        $recipient = $_POST["email"] ?? '';
        $password = $_POST['password'];
        $mail->addAddress($recipient, 'Test Recipient'); 

        // Validate email
        if(filter_var($recipient, FILTER_VALIDATE_EMAIL)){
            echo "Valid email\n";
        }
        else{
            echo "Invalid email";
        }

        // Inserts user into db
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $recipient, $password); 
        $stmt->execute();
        $stmt->close();
    }
    // Sends email customised to username 
    $mail->isHTML(true);
    $mail->Subject = 'Welcome';
    
    $mail->Body    = 'Welcome '.$username.' Thank you for registering. Click here to continue: <a href="http://localhost/Assignment1">Continue</a>';

    $mail->send();
    echo 'Message has been sent'.'\n';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

