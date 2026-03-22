<?php
include 'admin_auth.php';
include '../partials/_test.php';

// Fetch real counts from your DB
$users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM user"))['total'];
$games = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM games"))['total'];
$scores = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM scoreboard"))['total'];

// CALCULATIONS BASED ON YOUR IDEA
$avg_engagement_val = 4.4; // Fixed average in minutes
$total_engagement_mins = $scores * $avg_engagement_val;
$total_engagement_hours = $total_engagement_mins / 60;

// List of 12 games from your image (Wordle as top performer)
$game_list = ['Wordle', 'Memory Match', 'Sudoku', 'Tic Tac Toe', 'Hangman', '2048', 'Snake Game', 'Minesweeper', 'Puzzle', 'Crossword', 'Space Shooter', 'Math Quiz'];
// Simulated engagement data (Wordle highest)
$game_engagement_data = [1200, 950, 880, 800, 720, 650, 600, 550, 480, 400, 350, 300];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | BrainSpark</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary: #6366f1;
            --sidebar-width: 260px;
            --bg-body: #f8fafc;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-body);
            color: #1e293b;
        }

        /* ===== NAVBAR ===== */
        nav {
            height: 70px;
            background: #0f172a;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1001;
        }

        .brand { font-weight: 1000; font-size: 1.7rem; display: flex; align-items: center; gap: 12px; }
        .name{ color: #ef4444; }

        .logout {
            background: #ef4444; color: white; padding: 8px 16px;
            border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: var(--sidebar-width);
            position: fixed; top: 70px; left: 0; bottom: 0;
            background: #0f172a; padding: 20px 15px; transition: 0.3s; z-index: 1000;
        }

        .sidebar a {
            display: block; color: #b5bcc6; padding: 12px 20px;
            text-decoration: none; border-radius: 10px; margin-bottom: 5px;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.1); color: #facc15;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            margin-left: var(--sidebar-width);
            padding: 100px 30px 40px;
        }

        /* ===== STAT CARDS ===== */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            padding: 25px;
            border-radius: 16px;
            border: 3px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        .card h4 { color: #020a15; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 5px; }
        .card h3 { font-size: 1.6rem; font-weight: 800; }

        /* ===== CHARTS ===== */
        .charts-container {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .chart-box {
            background: white; padding: 20px; border-radius: 16px;
            border: 1px solid #e2e8f0; height: 400px; position: relative;
        }

        .full-width-chart {
            grid-column: span 2;
            height: 500px;
        }

        .chart-wrapper { position: relative; height: 300px; width: 100%; }
        .large-wrapper { height: 400px; }

        @media (max-width: 1024px) {
            .charts-container { grid-template-columns: 1fr; }
            .full-width-chart { grid-column: span 1; }
        }
    </style>
</head>
<body>

<nav>
    <div class="brand"><span class="name">🧠 BrainSpark </span></div>
    <a href="../login_jannye/logout.php" class="logout">Logout</a>
</nav>

<div class="sidebar">
    <a href="dashboard.php" class="active">📊 Dashboard</a>
    <a href="users.php">👤 Users</a>
    <a href="games.php">🎮 Games</a>
    <a href="scoreboard.php">🏆 Scoreboard</a>
</div>

<div class="main">
    <h2>Dashboard Overview</h2>
    <br>

    <div class="cards">
        <div class="card" style="background-color: #fabc51;">
            <h4>👤 Total Users</h4>
            <h3><?= number_format($users) ?></h3>
        </div>
        <div class="card" style="background-color: #10b981;">
            <h4>🎮 Total Games</h4>
            <h3><?= number_format($games) ?></h3>
        </div>
        <div class="card" style="background-color: #8587ea;">
            <h4>🏆 Total Plays</h4>
            <h3><?= number_format($scores) ?></h3>
        </div>
    </div>

    <h3 style="margin-bottom: 15px;">Engagement Metrics</h3>
    <div class="cards">
        <div class="card" style="background-color: #ffffff; border-color: #6366f1;">
            <h4>⏱️ Avg. Session</h4>
            <h3><?= $avg_engagement_val ?> <small>Minutes</small></h3>
        </div>
        <div class="card" style="background-color: #ffffff; border-color: #ef4444;">
            <h4>🌎 Total Engagement</h4>
            <h3><?= number_format($total_engagement_mins) ?> <small>Minutes</small></h3>
        </div>
    </div>

    <div class="charts-container">
        <div class="chart-box">
            <h4>System Stats</h4>
            <div class="chart-wrapper">
                <canvas id="overviewChart"></canvas>
            </div>
        </div>
        <div class="chart-box">
            <h4>Game Categories</h4>
            <div class="chart-wrapper">
                <canvas id="gameChart"></canvas>
            </div>
        </div>

        <div class="chart-box full-width-chart">
            <h4>Total Engagement per Game (Minutes)</h4>
            <div class="chart-wrapper large-wrapper">
                <canvas id="engagementChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
const commonOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { position: 'bottom' } }
};

// 1. Overview Bar Chart
new Chart(document.getElementById('overviewChart'), {
    type: 'bar',
    data: {
        labels: ['Users', 'Games', 'Plays'],
        datasets: [{
            label: 'Count',
            data: [<?= $users ?>, <?= $games ?>, <?= $scores ?>],
            backgroundColor: ['#f59e0b','#10b981','#6366f1'],
            borderRadius: 8
        }]
    },
    options: commonOptions
});

// 2. Game Categories Doughnut
new Chart(document.getElementById('gameChart'), {
    type: 'doughnut',
    data: {
        labels: ['Quiz', 'Memory', 'Puzzle', 'Others'],
        datasets: [{
            data: [40, 25, 20, 15],
            backgroundColor: ['#6366f1', '#ec4899', '#10b981', '#f97316']
        }]
    },
    options: commonOptions
});

// 3. NEW Engagement Horizontal Bar Chart (The 12 Games)
new Chart(document.getElementById('engagementChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($game_list) ?>,
        datasets: [{
            label: 'Minutes Spent',
            data: <?= json_encode($game_engagement_data) ?>,
            backgroundColor: '#ef4444',
            borderRadius: 5
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: { beginAtZero: true, grid: { display: false } },
            y: { grid: { display: false } }
        }
    }
});
</script>

</body>
</html>