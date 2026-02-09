<?php
session_start();

$alert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/_test.php';

    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    $sql = "SELECT * FROM admin WHERE admin_username='$admin_username' AND admin_password='$admin_password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $_SESSION['admin_loggedin'] = true;
        $_SESSION['admin_username'] = $admin_username;
        header("Location:dashboard.php");
        exit();
    } else {
        $alert = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>BrainSpark | Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#0f172a;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    font-family:Poppins,sans-serif;
}
.login-box{
    background:#1e293b;
    padding:30px;
    width:330px;
    border-radius:12px;
    box-shadow:0 0 15px rgba(0,0,0,.4);
}
.login-box h2{
    text-align:center;
    color:#facc15;
    margin-bottom:20px;
}
.login-box input{
    width:100%;
    padding:10px;
    margin-bottom:15px;
    border:none;
    border-radius:6px;
}
.login-box button{
    width:100%;
    padding:12px;
    border:none;
    background:#facc15;
    font-weight:600;
    border-radius:6px;
}
.login-box button:hover{
    background:#eab308;
}
</style>
</head>

<body>

<?php
if ($alert) {
    echo '<div class="alert alert-danger fixed-top text-center rounded-0">
            Wrong admin credentials
          </div>';
}
?>

<div class="login-box">
    <h2>Admin Login</h2>

    <form method="POST">
        <input type="text" name="admin_username" placeholder="Admin Username" required>
        <input type="password" name="admin_password" placeholder="Admin Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
