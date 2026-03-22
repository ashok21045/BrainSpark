<?php
session_start();
require_once '../../partials/_test.php';  // your DB connection

if (!isset($_SESSION['username'])) {
    die("Not logged in");
}

$username = $_SESSION['username'];
$namee = $_SESSION['name'];

// Fetch current stats
$stmt = $conn->prepare("SELECT current_streak, higest_streak, total_wins FROM scoreboard WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentStreak = $row['current_streak'];
    $highestStreak = $row['higest_streak'];
    $totalWins = $row['total_wins'];
} else {
    $currentStreak = 0;
    $highestStreak = 0;
    $totalWins = 0;
}

$user = [
    "name" => $username,
    "currentStreak" => $currentStreak,
    "highestStreak" => $highestStreak,
    "totalWins" => $totalWins
];
$sql = "UPDATE scoreboard
        SET total_play = total_play + 1
        WHERE username = '$username' AND game_id = 1";
mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wordle</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="w.css">
    <script>
        const userData = <?php echo json_encode($user); ?>;
    </script>

    <script src="getwords.php"></script>
    <script src="ww.js"></script>
</head>

<body>

<nav class="navbar">
    <div class="logo-group">
        <img class="logo" src="../quiz/logo2.png" alt="BrainSpark Logo">
        <span class="brand-text">BrainSpark</span>
    </div>

    <div class="menu">
        <a href="../../login_jannye/newmodel.php">Home</a>
        <a href="../../login_jannye/newmodel.php">Games</a>
        <a href="#">About</a>
        <a href="../../login_jannye/">Logout</a>
    </div>

    <!-- Profile Picture -->
   
    <div class="profile" style="display: flex; align-items: center;">
       <h4>  <?php echo $namee ?>&nbsp; &nbsp;</h4>
        <img src="../../login_jannye/photos/uploads/1765549797_download.jpg" alt="Profile" class="profile-pic" width="40" height="40" style="object-fit: cover;">
    </div>
</nav>

<div id="title"><h1>Wordle</h1></div>

<div class="main">
    <div id="board"></div>
    <div class="se">
        <div class="result"><h2 id="answer" class="red"></h2></div>
        <div class="record">
            <h3>Current streak: <?php echo $currentStreak; ?>🔥</h3>
            <h3>Highest streak: <?php echo $highestStreak; ?>🔥</h3>
            <h3>Total correct: <?php echo $totalWins; ?>🔥</h3>
            <button class="restart" onclick="reloadPage()">Next</button>
        </div>
    </div>
</div>
<br><br><br>

<div id="keyboardw"></div>

</body>
</html>
