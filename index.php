<?php
// Include ang database connection
include "db_connect.php";

// Sample query
$query = "SELECT * FROM boarding_house_table";
$result = $conn->query($query);

// Check kung naay result
if ($result->num_rows > 0) {
    // Loop through sa mga rows
    while ($row = $result->fetch_assoc()) {
        // Gawasun ang data
        echo "Boarding House Name: " . $row["boarding_house_name"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        // ... daghan pa nga fields
    }
} else {
    echo "0 results";
}

// Close ang database connection
$conn->close();
?>
