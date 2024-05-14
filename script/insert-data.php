<?php
include "database.php";

class PassengerManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function savePassengerData($name, $email, $dob, $phoneNumber, $gender) {
        return $this->db->insertPassenger($name, $email, $dob, $phoneNumber, $gender);
    }
}

$requiredFields = ["origin", "destination", "departure-date", "passenger-count", "cabinType", "cruiseID", "returnCruise"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if required POST keys exist
    $missingFields = array_diff($requiredFields, array_keys($_POST));

    if (!empty($missingFields)) {
        echo "One or more required fields are missing: " . implode(", ", $missingFields);
        exit;
    }

    // Connect to the database
    $db = new Database('localhost', 'root', 'ferry', '');

    // Instantiate PassengerManager
    $passengerManager = new PassengerManager($db);

    // Extract passenger data from the form submission
    $name = $_POST["name"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $phoneNumber = $_POST["phoneNumber"];
    $gender = $_POST["gender"];

    // Save passenger data and get the passenger ID
    $passengerID = $passengerManager->savePassengerData($name, $email, $dob, $phoneNumber, $gender);

    if ($passengerID) {
        // Extract reservation data from the form submission
        $origin = $_POST["origin"];
        $destination = $_POST["destination"];
        $departureDate = $_POST["departure-date"];
        $returnDate = $_POST["return-date"];
        $passengerCount = $_POST["passenger-count"];
        $cabinType = $_POST["cabinType"];
        $cruiseID = $_POST["cruiseID"]; // Retrieve CruiseID
        $returnCruise = $_POST["returnCruise"]; // Retrieve returnCruise

        // Insert reservation data
        $reservationResult = $db->insertReservation($passengerID, $cabinType, date("Y-m-d"), 100, "one-way", $departureDate, $returnDate, $cruiseID, $returnCruise);

        if ($reservationResult === true) {
            echo "Reservation data saved successfully!";
        } else {
            echo "Error saving reservation data: " . $reservationResult;
        }
    } else {
        // Handle the case where passenger data insertion fails
        echo "Failed to save passenger data.";
    }
} else {
    echo "Invalid request!";
}
?>
