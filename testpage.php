<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BrainSpark</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: #0f172a;
      color: #e2e8f0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Header */
    header {
      background-color: #1e293b;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .brand img {
      width: 55px;
      height: 55px;
    }

    .brand h1 {
      font-size: 1.8rem;
      color: #38bdf8;
    }

    .login-btn {
      background: #38bdf8;
      color: #fff;
      border: none;
      padding: 8px 18px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: 0.3s ease;
    }

    .login-btn:hover {
      background: #0ea5e9;
    }

    /* Hero Section */
    .hero {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 50px 20px;
    }

    .hero h2 {
      font-size: 2.5rem;
      color: #38bdf8;
      margin-bottom: 10px;
    }

    .hero p {
      font-size: 1.2rem;
      color: #94a3b8;
      max-width: 600px;
      margin-bottom: 40px;
    }

    /* Cards Section */
    .card-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 25px;
      width: 100%;
      max-width: 800px;
      margin: 0 auto 50px auto;
      padding: 0 20px;
    }

    .card {
      background: #1e293b;
      border-radius: 12px;
      padding: 30px 20px;
      text-align: center;
      cursor: pointer;
      transition: transform 0.3s ease, background 0.3s ease;
    }

    .card:hover {
      background: #334155;
      transform: translateY(-6px);
    }

    .card h3 {
      color: #38bdf8;
      margin-bottom: 12px;
    }

    .card p {
      color: #cbd5e1;
      font-size: 0.95rem;
    }

    .card a {
      text-decoration: none;
      color: inherit;
      display: block;
    }

    /* Footer */
    footer {
      background: #1e293b;
      text-align: center;
      padding: 15px;
      font-size: 0.9rem;
      color: #94a3b8;
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header>
    <div class="brand">
      <img src="logo.png" alt="BrainSpark Logo">
      <h1>BrainSpark</h1>
    </div>
    <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
  </header>

  <!-- Hero -->
  <section class="hero">
    <h2>Ignite Your Mind</h2>
    <p>Play, guess, and win with BrainSpark’s fun word and quiz games. Challenge your brain every day!</p>
  </section>

  <!-- Game Cards -->
  <div class="card-container">
    <div class="card" onclick="window.location.href='wordle.html'">
      <a href="wordle.html">
        <h3>Wordle</h3>
        <p>Guess the secret 5-letter word in 6 tries!</p>
      </a>
    </div>

    <div class="card" onclick="window.location.href='quiz.html'">
      <a href="quiz.html">
        <h3>Quiz</h3>
        <p>Test your knowledge with fun quizzes.</p>
      </a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    © 2025 BrainSpark | Built by Ashok
  </footer>

</body>
</html>
