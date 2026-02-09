<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <?php
include 'admin_auth.php';
include '../partials/_test.php';

$res=mysqli_query($conn,"
SELECT user.username,game_name,current_streak,higest_streak,total_wins 
FROM scoreboard 
JOIN user ON scoreboard.u_id=user.id
JOIN games ON scoreboard.game_id=games.game_id

");
?>


<!-- css -->
<style>
body{
    background:#0f172a;
    font-family: Poppins, sans-serif;
    color:white;
}

.scoreboard-wrapper{
    max-width:1100px;
    margin:40px auto;
    background:#1e293b;
    padding:25px;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,0.5);
}

.scoreboard-title{
    text-align:center;
    font-size:26px;
    margin-bottom:20px;
    color:#38bdf8;
    font-weight:600;
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:10px;
}

thead{
    background:#38bdf8;
    color:#0f172a;
}

thead th{
    padding:14px;
    font-size:14px;
    text-transform:uppercase;
}

tbody td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #334155;
    font-size:14px;
}

tbody tr:hover{
    background:#0f172a;
    transition:0.2s;
}

tbody tr:last-child td{
    border-bottom:none;
}
</style>

</head>
<body>
 <h2 class="text-center my-4 text-primary">🏆 Scoreboard</h2>

<div class="table-responsive px-3">
    <table class="table table-dark table-hover table-bordered align-middle text-center">
        <thead class="table-primary text-dark">
            <tr>
                <th>User</th>
                <th>Game</th>
                <th>Total Wins</th>
                <th>Current Streak</th>
                <th>Highest Streak</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($s = mysqli_fetch_assoc($res)) { ?>
                <tr>
                    <td><?= htmlspecialchars($s['username']) ?></td>
                    <td><?= htmlspecialchars($s['game_name']) ?></td>
                    <td><?= $s['total_wins'] ?></td>
                    <td><?= $s['current_streak'] ?></td>
                    <td><?= $s['higest_streak'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


</body>
</html>