<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Basic Validation
    // if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    //     $errorMsg = "All fields are required.";
    // } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errorMsg = "Invalid email format.";
    // } else {
        // Prepare email
        $to = "vivekmca543@gmail.com";
        $subject = "Enquire Form from $name";
        $body = "
            <html>
            <head>
                <title>Enquire Form</title>
            </head>
            <body>
                <h2>Enquire Request</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </body>
            </html>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: <$email>" . "\r\n";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully.";
        } else {
            error_log("Failed to send the message to $to", 0);
            echo "Failed to send the message.";
        }
    }
// }
?>