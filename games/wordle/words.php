<?php

// 1. Database Connection Details (Update these with your actual details)
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'users';

// 2. Your List of Words

$word_list = [
    "acute", 
    "anger", 
    "ankle", 
    "apart", 
    "asset", 
    "audit", 
    "avoid", 
    "bacon", 
    "blend", 
    "bonus", 
    "bride", 
    "brief", 
    "buddy", 
    "charm", 
    "chief", 
    "chill", 
    "clone", 
    "comic", 
    "cough", 
    "crazy", 
    "curve", 
    "daisy", 
    "demon", 
    "dense", 
    "devil", 
    "diner", 
    "discs", 
    "dozen", 
    "drift", 
    "dwarf", 
    "eager", 
    "entry", 
    "epoch", 
    "fancy", 
    "fibre", 
    "fifth", 
    "forty", 
    "forum", 
    "fudge", 
    "ghost", 
    "giant", 
    "given", 
    "glory", 
    "goods", 
    "guest", 
    "habit", 
    "hello", 
    "hence", 
    "honor", 
    "index", 
    "inner", 
    "input", 
    "irony", 
    "joint", 
    "laser", 
    "lease", 
    "limit", 
    "liver", 
    "logic", 
    "lunch", 
    "maker", 
    "march", 
    "mercy", 
    "mixer", 
    "motor", 
    "mount", 
    "mouse", 
    "naked", 
    "naval", 
    "organ", 
    "owner", 
    "patch", 
    "penny", 
    "pilot", 
    "pitch", 
    "plain", 
    "poise", 
    "poker", 
    "pride", 
    "prize", 
    "queen", 
    "quota", 
    "radio", 
    "rally", 
    "ratio", 
    "rider", 
    "robot", 
    "rough", 
    "round", 
    "salad", 
    "scene", 
    "scope", 
    "score", 
    "shake", 
    "shelf", 
    "shift", 
    "shock", 
    "sight", 
    "slide", 
    "smoke", 
    "solar", 
    "sound"
];

// 3. Establish Connection

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// 4. Prepare Statement (Only needs to be done once outside the loop)
$sql = "INSERT INTO words (word) VALUES (?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("❌ SQL Prepare failed: " . $conn->error);
}

// 's' means the parameter is a string
$stmt->bind_param("s", $word); 
$count = 0;

// 5. Loop Through the Array and Execute the Insert
foreach ($word_list as $word) {
    // $word is now bound to the prepared statement
    $stmt->execute();
    $count++;
}

// 6. Close the statement and connection
$stmt->close();
$conn->close();

echo "✅ Successfully inserted **$count** words into the 'words' table.\n";

?>