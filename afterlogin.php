<?php
session_start();


if ($_SESSION['showalert']) {
    echo '<div class="alert alert-success alert-dismissible fade show text-center fixed-top m-0 rounded-0" role="alert">
        <strong>You have successfully signed in.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['showalert']); // एकपटक देखाएपछि हटाइदेयो
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainSpark | Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box;
        }

        .wrapper {
            font-family: "Poppins", sans-serif;
            background-color: #0f172a;
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #1e293b;
            padding: 30px;
            border-radius: 12px;
            width: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
        }

        .brand {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            height: 60px;
            width: 60px;
            margin-right: 10px;
        }

        .logo-title {
            font-size: 2rem;
            color: #38bdf8;
        }

        .login-container h2 {
            margin: 10px 0;
            color: #38bdf8;
        }

        .login-form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .login-form label {
            font-size: 0.9rem;
            margin-bottom: 5px;
            color: #c5c5c5;
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 6px;
            outline: none;
        }

        .login-form input:focus {
            border: 2px solid #38bdf8;
        }

        .login-btn {
            background-color: #38bdf8;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 7px;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-btn:hover {
            background-color: #0ea5e9;
        }

        .extra-links {
            margin-top: 10px;
            font-size: 0.85rem;
            text-align: center;
        }

        .extra-links a {
            color: #38bdf8;
            text-decoration: none;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="login-container">
            <div class="brand">
                <img src="logo.png" alt="BrainSpark Logo" class="logo">
                <h2 class="logo-title">BrainSpark</h2>
            </div>

            <form class="login-form" action="login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <div class="extra-links">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                <p><a href="#">Forgot Password?</a></p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



</body>

</html>
