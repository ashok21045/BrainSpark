<?php
// Database Connection Details
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'users'; // The database containing the table

// Establish Connection
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// SQL Code to drop the table
$sql = "DROP TABLE IF EXISTS words"; 

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "✅ Table 'words' was successfully deleted (dropped).\n";
} else {
    echo "❌ Error dropping table: " . $conn->error . "\n";
}

$conn->close();
?>