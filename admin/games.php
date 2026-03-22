<?php
include 'admin_auth.php';
include '../partials/_test.php';

$message = "";

// --- Handle Deletion ---
if (isset($_POST['remove'])) {
    $game_id = $_POST['game_id'];
    $res = mysqli_query($conn, "SELECT image FROM games WHERE game_id = $game_id");
    $row = mysqli_fetch_assoc($res);
    if($row['image'] && file_exists($row['image'])) { unlink($row['image']); }
    $stmt = $conn->prepare("DELETE FROM games WHERE game_id = ?");
    $stmt->bind_param("i", $game_id);
    if ($stmt->execute()) { $message = "Game removed successfully!"; }
    $stmt->close();
}

// --- Handle Form Submission ---
if (isset($_POST['add'])) {
    $game_name = $_POST['game'];
    $game_link = $_POST['link'];
    $image_path = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
        $file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = time() . '_' . uniqid() . '.' . $file_ext; 
        $target_file = $target_dir . $new_filename;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { $image_path = $target_file; }
    }
    if (!empty(trim($game_name)) && !empty(trim($game_link))) {
        $stmt = $conn->prepare("INSERT INTO games (game, link, image, status) VALUES (?, ?, ?, 'Active')");
        $stmt->bind_param("sss", $game_name, $game_link, $image_path);
        if ($stmt->execute()) { $message = "Game added successfully!"; }
        $stmt->close();
    }
}
$games = mysqli_query($conn, "SELECT * FROM games ORDER BY game_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Management | BrainSpark</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            margin: 0;
        }

        /* ===== NAVBAR (Original Size) ===== */
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

        /* ===== SIDEBAR (Original Size) ===== */
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
            padding-top: 70px; /* Offset for 70px navbar */
            min-height: 100vh;
        }
        .inner-container {
            padding: 30px; /* Uniform spacing */
            width: 100%;   /* Use all available width */
        }
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
    <a href="games.php" class="active">🎮 Games</a>
    <a href="scoreboard.php">🏆 Scoreboard</a>
</div>

<div class="main-content">
    <div class="inner-container">
        
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">🎮 Game Console</h2>
                <p class="text-sm text-gray-500">Manage your library thumbnails and links</p>
            </div>
            <?php if ($message): ?>
                <div class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-sm">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-700">Add New Game</h3>
            <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold text-gray-500 mb-2 uppercase">Title</label>
                    <input name="game" placeholder="e.g. Wordle" required class="w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold text-gray-500 mb-2 uppercase">URL Link</label>
                    <input name="link" type="url" placeholder="https://..." required class="w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold text-gray-500 mb-2 uppercase">Thumbnail</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="md:col-span-1">
                    <button name="add" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition shadow-md">
                        + Confirm Add
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Preview</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Game Details</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php while($g = mysqli_fetch_assoc($games)){ ?>
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <?php if($g['image']): ?>
                                <img src="<?= htmlspecialchars($g['image']) ?>" class="w-16 h-10 object-cover rounded-md shadow-sm border border-gray-200">
                            <?php else: ?>
                                <div class="w-16 h-10 bg-gray-200 rounded-md flex items-center justify-center text-[10px] text-gray-400">No Img</div>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-800"><?= htmlspecialchars($g['game']) ?></div>
                            <div class="text-xs text-blue-500 truncate"><a href="<?= htmlspecialchars($g['link']) ?>" target="_blank"><?= htmlspecialchars($g['link']) ?></a></div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 mr-2 bg-green-500 rounded-full"></span>
                                <?= htmlspecialchars($g['status']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-6 items-center">
                                <a href="<?= htmlspecialchars($g['link']) ?>" target="_blank" class="text-blue-600 hover:text-blue-800 font-bold text-sm">Launch</a>
                                <form method="POST" onsubmit="return confirm('Remove this game?');">
                                    <input type="hidden" name="game_id" value="<?= $g['game_id'] ?>">
                                    <button name="remove" class="text-red-400 hover:text-red-600 transition text-sm">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>