<?php
include "database.php"; 

$sql = "SELECT * FROM origins";
$result = $db->connection->query($sql); // Access $connection via $db object

if ($result->num_rows > 0) {
    $origins = array();
    while($row = $result->fetch_assoc()) {
        $origins[] = $row;
    }
    echo json_encode($origins); 
} else {
    echo "0 results";
}

$db->connection->close(); // Close the database connection
?>
