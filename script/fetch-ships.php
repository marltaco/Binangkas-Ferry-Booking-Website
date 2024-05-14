<?php
// Include the database configuration file
include "database.php";

try {
    // Instantiate Database object
    $db = new Database('localhost', 'root', 'ferry', '');

    // Get all ships
    $ships = $db->getAllShips();

    // Convert ship data to JSON format
    $json = json_encode($ships);

    // Set response headers to indicate JSON content
    header('Content-Type: application/json');

    // Send JSON response back to the client
    echo $json;
} catch (Exception $e) {
    // If an error occurs, send an error response
    http_response_code(500); // Internal server error
    echo json_encode(array("error" => "An error occurred while fetching ships: " . $e->getMessage()));
}
?>
