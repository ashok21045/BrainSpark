<?php
include 'admin_auth.php';
include '../partials/_test.php';

$users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM user"))['total'];
$games = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM games"))['total'];
$scores = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) total FROM scoreboard"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard | BrainSpark</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
*{
    box-sizing:border-box;
    margin:0;
    padding:0;
}

body{
    font-family:'Poppins',sans-serif;
    background:#f1f5f9;
    color:#0f172a;
}

/* ===== NAVBAR ===== */
nav{
    height:64px;
    background:#020617;
    color:white;
    padding:0 24px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    position:fixed;
    top:0;
    left:0;
    right:0;
    z-index:1000;
}

.menu-btn{
    display:none;
    font-size:26px;
    cursor:pointer;
    color:#facc15;
}

.logout{
    color:#020617;
    background:#facc15;
    padding:6px 14px;
    border-radius:6px;
    text-decoration:none;
    font-weight:500;
    font-size:14px;
}

.logout:hover{
    background:#fde047;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:220px;
    position:fixed;
    top:64px;
    left:0;
    height:calc(100vh - 64px);
    background:#0f172a;
    padding-top:10px;
    transition:0.3s;
}

.sidebar a{
    display:block;
    color:#cbd5f5;
    padding:14px 20px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#1e293b;
    color:#facc15;
}

/* ===== MAIN ===== */
.main{
    margin-left:220px;
    padding:90px 30px 30px;
}

/* ===== CARDS ===== */
.cards{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.card{
    background:white;
    padding:25px;
    border-radius:14px;
    width:220px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.card span{font-size:32px}
.card h4{margin:10px 0 5px;color:#475569}
.card h3{margin:0;font-size:28px}

/* ===== CHARTS ===== */
.charts{
    display:flex;
    gap:30px;
    flex-wrap:wrap;
    margin-top:40px;
}

.chart-box{
    background:white;
    padding:20px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    width:420px;
}

/* ===== MOBILE ===== */
@media(max-width:768px){

    .menu-btn{
        display:block;
    }

    .sidebar{
        left:-220px;
    }

    .sidebar.active{
        left:0;
    }

    .main{
        margin-left:0;
        padding:90px 20px 20px;
    }

    .cards{
        flex-direction:column;
    }

    .card{
        width:100%;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="menu-btn" onclick="toggleSidebar()">☰</div>
    <div>🧠 BrainSpark Admin</div>
    <a href="logout.php" class="logout">Logout</a>
</nav>

<!-- SIDEBAR -->
<div class="sidebar">
    <a href="dashboard.php">📊 Dashboard</a>
    <a href="users.php">👤 Users</a>
    <a href="games.php">🎮 Games</a>
    <a href="scoreboard.php">🏆 Scoreboard</a>
</div>

<!-- MAIN -->
<div class="main">
    <h2>Dashboard Overview</h2>

    <div class="cards">
        <div class="card">
            <span>👤</span>
            <h4>Total Users</h4>
            <h3><?= $users ?></h3>
        </div>

        <div class="card">
            <span>🎮</span>
            <h4>Total Games</h4>
            <h3><?= $games ?></h3>
        </div>

        <div class="card">
            <span>🏆</span>
            <h4>Total Plays</h4>
            <h3><?= $scores ?></h3>
        </div>
    </div>

    <!-- Charts (UNCHANGED) -->
    <div class="charts">
        <div class="chart-box">
            <h4>System Overview</h4>
            <canvas id="overviewChart"></canvas>
        </div>

        <div class="chart-box">
            <h4>Game Popularity</h4>
            <canvas id="gameChart"></canvas>
        </div>
    </div>
</div>

<script>
function toggleSidebar(){
    document.querySelector('.sidebar').classList.toggle('active');
}

/* Bar Chart */
new Chart(document.getElementById('overviewChart'), {
    type: 'bar',
    data: {
        labels: ['Users', 'Games', 'Plays'],
        datasets: [{
            data: [<?= $users ?>, <?= $games ?>, <?= $scores ?>],
            backgroundColor: ['#38bdf8','#22c55e','#facc15']
        }]
    },
    options: {
        plugins:{legend:{display:false}},
        responsive:true
    }
});

/* Doughnut Chart */
new Chart(document.getElementById('gameChart'), {
    type: 'doughnut',
    data: {
        labels: ['Quiz','Memory','Puzzle','Others'],
        datasets: [{
            data: [40,25,20,15],
            backgroundColor:['#6366f1','#ec4899','#22c55e','#f97316']
        }]
    }
});
</script>

</body>
</html>
