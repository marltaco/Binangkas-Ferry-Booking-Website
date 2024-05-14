<?php 

$cruisesPerPage = 10;

// Get the current page number, default to 1 if not set
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $cruisesPerPage;

// Retrieve cruises for the current page
$cruises = $db->getCruisesPaginated($offset, $cruisesPerPage);


?>