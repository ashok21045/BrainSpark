<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    /* ================= NAVBAR ================= */
.navbar{
    position: fixed;
    top:0;
    left:0;
    right:0;
    height:70px;
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(12px);
    border-bottom:1px solid #e2e8f0;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    z-index:1001;
}

.nav-left{
    display:flex;
    align-items:center;
    gap:15px;
}

.logo{
    font-weight:800;
    color:#0f172a;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:20px;
}

.admin-profile{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:600;
}

.avatar{
    width:35px;
    height:35px;
    border-radius:50%;
    background:#6366f1;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.logout-btn{
    background:#ef4444;
    color:white;
    padding:8px 16px;
    border-radius:8px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.logout-btn:hover{
    background:#dc2626;
}

/* ================= SIDEBAR ================= */

.sidebar{
    width:260px;
    position:fixed;
    top:70px;
    bottom:0;
    left:0;
    background:linear-gradient(180deg,#0f172a,#020617);
    padding:25px 15px;
    transition:.3s;
}

.side-title{
    color:#64748b;
    font-size:12px;
    margin:10px 15px 20px;
    letter-spacing:1px;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    padding:13px 18px;
    color:#94a3b8;
    text-decoration:none;
    border-radius:12px;
    margin-bottom:8px;
    font-weight:500;
    transition:all .25s ease;
}

.sidebar a:hover{
    background:#1e293b;
    color:white;
    transform:translateX(5px);
}

.sidebar a.active{
    background:#6366f1;
    color:white;
    box-shadow:0 4px 12px rgba(99,102,241,.4);
}

.side-bottom{
    position:absolute;
    bottom:20px;
    left:0;
    right:0;
    text-align:center;
    color:#64748b;
    font-size:12px;
}

/* MOBILE */
@media(max-width:768px){
    .sidebar{
        left:-260px;
    }
    .sidebar.active{
        left:0;
    }
}
</style>
</head>
<body>
    <nav class="navbar">
    <div class="nav-left">
        <div class="menu-btn" onclick="toggleSidebar()">☰</div>
        <h2 class="logo">🧠 BrainSpark</h2>
    </div>

    <div class="nav-right">
        <div class="admin-profile">
            <div class="avatar">A</div>
            <span>Admin</span>
        </div>

        <a href="../login_jannye/logout.php" class="logout-btn">
            Logout
        </a>
    </div>


        <div class="sidebar">
    <h3 class="side-title">MAIN MENU</h3>

    <a href="dashboard.php" class="active">
        <span>📊</span> Dashboard
    </a>

    <a href="users.php">
        <span>👤</span> Users
    </a>

    <a href="games.php">
        <span>🎮</span> Games
    </a>

    <a href="scoreboard.php">
        <span>🏆</span> Scoreboard
    </a>

    <div class="side-bottom">
        <small>BrainSpark Admin v1.0</small>
    </div>
</div>
</nav>
</body>
</html>