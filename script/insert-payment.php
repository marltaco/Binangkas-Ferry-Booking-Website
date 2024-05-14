<?php
require_once('database.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debug: Print out the POST data to check if it's received correctly
    print_r($_POST);

    // Extract data from POST
    $paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
    $expirationDate = isset($_POST['expirationDate']) ? $_POST['expirationDate'] : '';

    // Debug: Print out the extracted data
    echo "Payment Method: " . $paymentMethod . "\n";
    echo "Username: " . $username . "\n";
    echo "Card Number: " . $cardNumber . "\n";
    echo "Expiration Date: " . $expirationDate . "\n";

    // Check if any required field is empty
    if (empty($paymentMethod) || empty($username) || empty($cardNumber) || empty($expirationDate)) {
        // Handle the case where one or more required fields are empty
        http_response_code(400); // Bad Request
        echo "One or more required fields are missing.";
        exit();
    }

    // Assuming the amount is fixed for now
    $amount = 100; // You might want to change this based on your business logic

    // Insert payment record
    $stmt = $db->prepare("INSERT INTO payment (PaymentMethod, Amount, PassengerID, CreditCardNo) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    // Handle the case where the payment insertion fails
    http_response_code(500); // Internal Server Error
    echo "Failed to prepare payment record.";
    exit();
}
$stmt->bind_param("sidi", $paymentMethod, $amount, $passengerID, $cardNumber);

    // Execute the statement
    if (!$stmt->execute()) {
        // Handle the case where the payment insertion fails
        http_response_code(500); // Internal Server Error
        echo "Failed to insert payment record.";
        exit();
    }

    // Payment data inserted successfully
    echo "Payment data inserted successfully.";
} else {
    // Handle the case where the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed.";
}
?>
    