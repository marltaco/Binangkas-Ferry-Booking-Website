<?php
require_once('database.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from POST
    $passengerID = isset($_POST['passengerID']) ? $_POST['passengerID'] : '';
    $cruiseID = isset($_POST['cruiseID']) ? $_POST['cruiseID'] : '';
    $cabinType = isset($_POST['cabinType']) ? $_POST['cabinType'] : '';
    $reservationDate = isset($_POST['reservationDate']) ? $_POST['reservationDate'] : '';
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : '';
    $tripType = isset($_POST['tripType']) ? $_POST['tripType'] : '';
    $departureDate = isset($_POST['departureDate']) ? $_POST['departureDate'] : '';
    $returnDate = isset($_POST['returnDate']) ? $_POST['returnDate'] : '';

    // Debug: Print out the received data
    echo "Received Data: ";
    print_r($_POST);

    // Check if any required field is empty
    if (empty($passengerID) || empty($cruiseID) || empty($cabinType) || empty($reservationDate) || empty($departureDate) || empty($returnDate)) {
        // Handle the case where one or more required fields are empty
        http_response_code(400); // Bad Request
        echo "One or more required fields are missing.";
        exit();
    }

    // Insert reservation record
    $stmt = $db->prepare("INSERT INTO reservation (PassengerID, CruiseID, CabinType, ReservationDate, TotalPrice, TripType, DepartureDate, ReturnDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        // Handle the case where the reservation insertion fails
        http_response_code(500); // Internal Server Error
        echo "Failed to prepare reservation record.";
        exit();
    }
    $stmt->bind_param("iiisdsdd", $passengerID, $cruiseID, $cabinType, $reservationDate, $totalPrice, $tripType, $departureDate, $returnDate);

    // Execute the statement
    if (!$stmt->execute()) {
        // Handle the case where the reservation insertion fails
        http_response_code(500); // Internal Server Error
        echo "Failed to insert reservation record.";
        exit();
    }

    // Reservation data inserted successfully
    echo "Reservation data inserted successfully.";
} else {
    // Handle the case where the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed.";
}
?>
