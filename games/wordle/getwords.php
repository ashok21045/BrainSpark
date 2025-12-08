<?php
// Set headers to ensure the browser treats this as a JavaScript file
header('Content-Type: application/javascript');

// 1. Database Connection Details (Ensure these are correct)
$host = 'localhost';
$user = 'root';
$pass = ''; 
$dbname = 'users'; 
$table_name = 'words'; 

// Establish Connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection and handle failure silently (or die with an error message if preferred)
if ($conn->connect_error) {
    // If connection fails, output an empty array so JS doesn't break
    die("const DICTIONARY = []; // Database connection error");
}

// 2. Fetch all words into the $all_words PHP array
$sql = "SELECT word FROM $table_name"; 
$result = $conn->query($sql);
$all_words = []; 

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $all_words[] = $row['word']; 
    }
    $result->free();
}

$conn->close();

// 3. Convert the PHP array to a JavaScript-readable JSON string
$json_word_list = json_encode($all_words);

// 4. Output the final JavaScript variable definition
// The JS file will now contain: const DICTIONARY = ["word1", "word2", ...];
echo "const DICTIONARY = " . $json_word_list . ";";

?>