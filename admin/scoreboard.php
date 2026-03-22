<?php
include 'admin_auth.php';
include '../partials/_test.php';

$res = mysqli_query($conn, "
    SELECT user.username, game, current_streak, higest_streak, total_wins 
    FROM scoreboard 
    JOIN user ON scoreboard.id=user.id
    JOIN games ON scoreboard.game_id=games.game_id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Scoreboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* ===== NAVBAR (Original) ===== */
        nav {
            height: 70px;
            background: #000000;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1001;
        }
        .brand { font-weight: 1000; font-size: 1.7rem; display: flex; align-items: center; gap: 12px; color: white; }
        .name { color: #ef4444; }
        .logout {
            background: #ef4444; color: white; padding: 8px 16px;
            border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px;
        }

        /* ===== SIDEBAR (Original) ===== */
        .sidebar {
            width: var(--sidebar-width);
            position: fixed; top: 70px; left: 0; bottom: 0;
            background: #000000; padding: 20px 15px; z-index: 1000;
        }
        .sidebar a {
            display: block; color: #b5bcc6; padding: 12px 20px;
            text-decoration: none; border-radius: 10px; margin-bottom: 5px;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active { background: rgba(255, 255, 255, 0.1); color: #facc15; }

        /* ===== MAIN CONTENT: FULL FIT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 100px 30px 40px;
        }

        header { 
            margin-bottom: 30px; 
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 20px;
        }

        h2 { font-size: 32px; font-weight: 800; color: #0f172a; }
        .subtitle { color: #64748b; font-size: 15px; }

        /* Table Design */
        .card {
            background: white;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            width: 100%;
        }

        table { width: 100%; border-collapse: collapse; text-align: left; }

        thead { background: #f8fafc; }

        thead th {
            padding: 18px 24px;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #94a3b8;
            border-bottom: 1px solid #f1f5f9;
        }

        tbody tr { border-bottom: 1px solid #f8fafc; transition: 0.2s; }
        tbody tr:hover { background: #fbfcfe; }
        tbody td { padding: 18px 24px; font-size: 15px; color: #475569; }

        /* UI Components */
        .user-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white; border-radius: 10px;
            display: inline-flex; align-items: center; justify-content: center;
            font-weight: 700; margin-right: 12px;
        }

        .user-wrapper { display: flex; align-items: center; }
        .username { font-weight: 700; color: #1e293b; }

        .game-badge {
            background: #eff6ff; color: #1d4ed8;
            padding: 5px 12px; border-radius: 8px;
            font-size: 12px; font-weight: 700;
        }

        .stat-badge {
            display: inline-block; padding: 4px 10px;
            border-radius: 8px; font-weight: 800;
        }
        .wins { background: #dcfce7; color: #166534; }
        .streak { background: #fef2f2; color: #991b1b; }

        .empty { padding: 60px; text-align: center; color: #94a3b8; font-style: italic; }
    </style>
</head>
<body>

<nav>
    <div class="brand"><span class="name">🧠 BrainSpark </span></div>
    <a href="../login_jannye/logout.php" class="logout">Logout</a>
</nav>

<div class="sidebar">
    <a href="dashboard.php">📊 Dashboard</a>
    <a href="users.php">👤 Users</a>
    <a href="games.php">🎮 Games</a>
    <a href="scoreboard.php" class="active">🏆 Scoreboard</a>
</div>

<div class="main-content">
    <header>
        <div>
            <h2>🏆 Scoreboard</h2>
            <p class="subtitle">Global player performance and win streaks.</p>
        </div>
        <div style="background: white; padding: 10px 20px; border-radius: 12px; border: 1px solid #e2e8f0; font-size: 13px; font-weight: 700; color: #6366f1;">
            Live Rankings
        </div>
    </header>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Member</th>
                    <th>Game</th>
                    <th>Total Wins</th>
                    <th>Current Streak</th>
                    <th>Highest Streak</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($res) > 0): ?>
                    <?php while ($s = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <td>
                                <div class="user-wrapper">
                                    <div class="user-avatar"><?= strtoupper(substr($s['username'], 0, 1)) ?></div>
                                    <span class="username"><?= htmlspecialchars($s['username']) ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="game-badge"><?= htmlspecialchars($s['game']) ?></span>
                            </td>
                            <td>
                                <span class="stat-badge wins"><?= $s['total_wins'] ?></span>
                            </td>
                            <td>
                                <span style="font-weight: 700; color: #475569;"><?= $s['current_streak'] ?></span>
                            </td>
                            <td>
                                <span class="stat-badge streak"><?= $s['higest_streak'] ?></span>
                            </td>
                        </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="empty">No player data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>