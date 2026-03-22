<?php
include 'admin_auth.php';
include '../partials/_test.php';

if(isset($_GET['block'])){
    // Fixed the typo in your function name: mysqli_real_escape_string
    $block_id = mysqli_real_escape_string($conn, $_GET['block']);
    mysqli_query($conn,"UPDATE user SET status='blocked' WHERE id=".$block_id);
}
$users=mysqli_query($conn,"SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management | BrainSpark</title>
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
            padding: 100px 30px 40px; /* Top padding accounts for navbar */
        }

        h2 { font-size: 28px; font-weight: 700; margin-bottom: 25px; }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e2e8f0;
            width: 100%; /* Perfectly fitted */
        }

        table { width: 100%; border-collapse: collapse; text-align: left; }
        
        th {
            background-color: #f8fafc;
            padding: 16px 24px;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.05em;
            color: #64748b;
            border-bottom: 2px solid #f1f5f9;
        }

        td { padding: 16px 24px; border-bottom: 1px solid #f1f5f9; font-size: 15px; }
        
        tr:hover { background-color: #fbfcfe; }

        /* Status Badges */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .status-active { background: #dcfce7; color: #166534; }
        .status-blocked { background: #fee2e2; color: #991b1b; }

        /* Action Button */
        .btn-block {
            text-decoration: none;
            background-color: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }
        .btn-block:hover { background-color: #dc2626; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2); }
    </style>
</head>
<body>

<nav>
    <div class="brand"><span class="name">🧠 BrainSpark </span></div>
    <a href="../login_jannye/logout.php" class="logout">Logout</a>
</nav>

<div class="sidebar">
    <a href="dashboard.php">📊 Dashboard</a>
    <a href="users.php" class="active">👤 Users</a>
    <a href="games.php">🎮 Games</a>
    <a href="scoreboard.php">🏆 Scoreboard</a>
</div>

<div class="main-content">
    <h2>User Management</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($u = mysqli_fetch_assoc($users)){ 
                    $statusClass = ($u['status'] == 'blocked') ? 'status-blocked' : 'status-active';
                ?>
                <tr>
                    <td style="color: #64748b;">#<?= $u['id'] ?></td>
                    <td style="font-weight: 600; color: #0f172a;"><?= htmlspecialchars($u['username']) ?></td>
                    <td>
                        <span class="status <?= $statusClass ?>">
                            <?= htmlspecialchars($u['status']) ?>
                        </span>
                    </td>
                    <td style="text-align: right;">
                        <?php if($u['status'] !== 'blocked'): ?>
                            <a href="?block=<?= $u['id'] ?>" class="btn-block" onclick="return confirm('Block this user?')">Block User</a>
                        <?php else: ?>
                            <span style="color: #cbd5e1; font-size: 13px; font-style: italic;">Access Restricted</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>