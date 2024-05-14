<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email address from POST data
    $email = $_POST['email'] ?? '';

    // Ensure email address is not empty
    if (empty($email)) {
        http_response_code(400); // Bad request
        echo 'Email address is empty.';
        exit;
    }

    // Create PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;              // Enable SMTP authentication
        $mail->Username   = 'fdavedamond@gmail.com'; // SMTP username
        $mail->Password   = 'dili hlbt oqou wyjk';   // SMTP password
        $mail->SMTPSecure = 'tls';             // Enable TLS encryption
        $mail->Port       = 587;               // TCP port to connect to

        // Sender and recipient settings
        $mail->setFrom('Binangkas@support.com', 'Binangkas');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';

        // Construct email body with inline image
        $mail->Body = "
            <p>Dear Customer,</p>
            <p>Your booking has been confirmed. Thank you for choosing our service.</p>
            <p><img src='cid:logo' alt='Logo' style='width:50%;'></p>
        ";

        // Attach the inline image
        $imagePath = '../img/ferrylogo.png';
        $mail->addEmbeddedImage($imagePath, 'logo');

        // Send email
        if ($mail->send()) {
            echo 'Email confirmation sent successfully';
        } else {
            http_response_code(500); // Internal server error
            echo 'Failed to send email confirmation. Error: ' . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        http_response_code(500); // Internal server error
        echo 'Failed to send email confirmation. Error: ' . $e->getMessage();
    }
} else {
    http_response_code(405); // Method not allowed
    echo 'Method not allowed';
}

// Debug: Log PHP script execution
file_put_contents('log.txt', date('Y-m-d H:i:s') . " - Script executed\n", FILE_APPEND);
?>
