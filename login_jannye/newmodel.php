<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainSpark | Play & Learn</title>
    
     <?php
    session_start();
    
    if (!isset($_SESSION['exist']) || $_SESSION['exist'] != true) {
        header("Location: login.php");
        exit();
    }
    ?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #f2f6fa 0%, #e6ecf5 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            padding-bottom: 80px;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.5);
            min-height: 78px;
            padding-left: 50px;
            padding-right: 50px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 2rem;
            font-weight: 700;
            color: #092365 !important;
        }
        .navbar-brand img {
            height: 44px; width: 44px; border-radius: 50%; box-shadow: 0 2px 6px #3154a129;
        }
        .navbar-nav .nav-link {
            color: #22334e !important;
            font-size: 1.1rem;
            font-weight: 500;
            margin-right: 26px;
            transition: all 0.15s;
            border-radius: 7px;
        }
        .navbar-nav .nav-link:hover, .navbar-nav .active>.nav-link {
            background: #f0f4fb;
            color: #1750c3 !important;
        }
        .nav-search {
            position: relative;
        }
        .nav-search input {
            border-radius: 30px;
            padding-left: 40px;
            width: 240px;
            border: 1px solid #c1d0ec;
            font-size: 1rem;
            background: #f6f9ff;
        }
        .nav-search .bi-search {
            position: absolute;
            left: 13px;
            top: 10px;
            color: #9aa5be;
        }

        /* Slider Container */
.slider-container {
    width: 100%;
    max-width: 1300px;
    height: 400px;
    margin: 40px auto;
    position: relative;
    overflow: hidden;
    border-radius: 18px;
    box-shadow: 0px 8px 30px rgba(0,0,0,0.25);
}

/* Slider Images */
.slider {
    width: 100%;
    height: 100%;
    position: relative;
}

.slide {
    width: 100%;
    height: 100%;
    position: absolute;
    opacity: 0;
    transition: opacity 1.2s ease-in-out;
}

.slide.active {
    opacity: 1;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Arrows */
.slider-arrows {
    position: absolute;
    top: 50%;
    width: 100%;
    z-index: 10;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.slider-arrows span {
    font-size: 45px;
    font-weight: bold;
    color: white;
    cursor: pointer;
    padding: 10px 18px;
    background: rgba(0,0,0,0.35);
    border-radius: 50%;
    transition: 0.3s;
}

.slider-arrows span:hover {
    background: rgba(0,0,0,0.55);
}

/* Dots */
.slider-dots {
    position: absolute;
    bottom: 15px;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 10;
}

.slider-dots span {
    width: 12px;
    height: 12px;
    margin: 0 5px;
    background: white;
    opacity: 0.4;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
}

.slider-dots .active-dot {
    opacity: 1;
}






        .games-title {
            margin-top: 42px;
            font-size: 2rem;
            font-weight: 700;
            color: #092365;
            text-shadow: 0 2px 12px #c5d7fa33;
        }
        /* Grid and Card Height Consistency */
        .row.g-4>.col {
            display: flex;
            align-items: stretch;
            min-width: 0;
        }
        .game-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 440px;
            background: #fff;
            border-radius: 1.4rem;
            box-shadow: 0 4px 24px rgba(35,65,120,0.13);
            overflow: hidden;
            transition: transform 0.21s, box-shadow 0.21s;
        }
        .game-card:hover {
            transform: translateY(-7px) scale(1.03);
            box-shadow: 0 8px 32px rgba(22,40,85,0.18);
        }
        .game-img {
            width: 100%;
            height: 210px;
            object-fit: cover;
            border-top-left-radius: 1.4rem;
            border-top-right-radius: 1.4rem;
        }
        .game-body {
            display: flex;
            flex-direction: column;
            flex: 1 1 auto;
            min-height: 205px;
            padding: 25px 18px 22px 18px;
        }
        .game-body h4 {
            font-weight: 700;
            font-size: 1.2rem;
            color: #153778;
            margin-bottom: 0.55rem;
        }
        .game-body p {
            color: #4e5c74;
            font-size: 1rem;
            margin-bottom: 1.1rem;
        }
        .play-btn {
            width: 100%;
            border-radius: 25px;
            background: linear-gradient(90deg,#041739,#043082 95%);
            border: none;
            font-weight: 600;
            font-size: 1rem;
            padding: 9px 0;
        }
        .rating {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 1rem;
            margin-bottom: 2px;
        }
        .rating i {
            color: #fbc105;
        }
        .rating span {
            font-weight: bold;
            color: #355196;
        }
        .footer {
            background: linear-gradient(90deg,#041739,#043082 95%);
            color: #fff;
            padding: 56px 0 24px;
            margin-top: 100px;
        }
        .footer-logo {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .footer-links a {
            color: #cce2ff;
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            transition: color 0.13s;
        }
        .footer-links a:hover {
            color: #fff;
            text-decoration: underline;
        }
        .social-icons a {
            color: #cce2ff;
            font-size: 1.30rem;
            margin-right: 18px;
            transition: color 0.13s;
        }
        .social-icons a:hover {
            color: #fff;
        }
        .footer-bottom {
            border-top: 1px solid #cce2ff33;
            margin-top: 24px;
            padding-top: 18px;
            color: #bdd6f9;
            text-align: center;
            font-size: 1rem;
        }
    </style>
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../partials/logo2.png" alt="BrainSpark Logo">
      BrainSpark
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarToggle" aria-controls="navBarToggle" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBarToggle">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#games">Games</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" onclick="window.location.href='logout.php'">Logout</a></li>
      </ul>
      <form class="d-flex ms-lg-4 nav-search">
        <i class="bi bi-search"></i>
        <input class="form-control me-2" type="search" placeholder="Search games..." aria-label="Search">
      </form>
    </div>
  </div>
</nav>
<br><br><br><br>
<!-- TRENDING GAMES BANNER -->
<div class="slider-container">
    <div class="slider">
        <div class="slide active">
            <img src="./photos/ws.png" alt="Wordle Trending">
        </div>
        <div class="slide">
            <img src="./photos/puzzle.jpg" alt="Quiz Trending">
        </div>
        <div class="slide">
            <img src="./photos/quiz.jpg" alt="Puzzle Trending">
        </div>
        <div class="slide">
            <img src="./photos/snake.jpg" alt="Memory Game">
        </div>
    </div>

    <!-- Arrows -->
    <div class="slider-arrows">
        <span class="prev">&#10094;</span>
        <span class="next">&#10095;</span>
    </div>

    <!-- Dots -->
    <div class="slider-dots"></div>
</div>




<!-- top games for you container -->
<div class="container" style="max-width:1450px; margin-top:-70px">
  <br><br>
    <h2 class="games-title">Top picks for You</h2>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
      <!-- Wordle -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/wordle2.jpg" class="game-img" alt="Wordle">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Wordle</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Guess the secret word in limited tries.</p>
            <div class="mt-auto"><a href="../games/wordle/w.html" class="btn btn-primary play-btn w-100">Play Now</a></div>
          </div>
        </div>
      </div>
      <!-- Quiz -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/quiz.jpg" class="game-img" alt="Quiz Master">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Quiz Master</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Test your knowledge across multiple topics.</p>
            <div class="mt-auto"><a href="../games/quiz/quiz.html" class="btn btn-primary play-btn w-100">Start Quiz</a></div>
          </div>
        </div>
      </div>
      <!-- Memory Game -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/word_flip.png" class="game-img" alt="Memory Flip">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Memory Flip</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.3</span>
            </div>
            <p>Flip & match cards to boost your memory.</p>
            <div class="mt-auto"><a href="games/memory.html" class="btn btn-primary play-btn w-100">Play Game</a></div>
          </div>
        </div>
      </div>
      
      <!-- Tic Tac Toe -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/tiktactoe.jpg" class="game-img" alt="Tic Tac Toe">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Tic Tac Toe</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
              <span>3.0</span>
            </div>
            <p>Classic game against friend.Only two players can play.</p>
            <div class="mt-auto"><a href="games/tictactoe.html" class="btn btn-primary play-btn w-100">Play</a></div>
          </div>
        </div>
      </div>
      <!-- Hangman -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/hangman.jpg" class="game-img" alt="Hangman">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Hangman</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.8</span>
            </div>
            <p>Guess the hidden word carefully using your Mind.</p>
            <div class="mt-auto"><a href="games/hangman.html" class="btn btn-primary play-btn w-100">Play Hangman</a></div>
          </div>
        </div>
      </div>
    
      <!-- Space Shooter -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/spaceshooter.jpg" class="game-img" alt="Space Shooter">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Space Shooter</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
              <span>4.0</span>
            </div>
            <p>Shoot asteroids and survive in space!</p>
            <div class="mt-auto"><a href="games/spaceshooter.html" class="btn btn-primary play-btn w-100">Start Shooting</a></div>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- most played games container -->

<div class="container" style="max-width:1450px; margin-top:-70px;">
  <br><br>
    <h2 class="games-title">Most Played Games</h2>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
      <!-- Wordle -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/wordle2.jpg" class="game-img" alt="Wordle">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Wordle</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Guess the secret word in limited tries.</p>
            <div class="mt-auto"><a href="../games/wordle/wordle.html" class="btn btn-primary play-btn w-100">Play Now</a></div>
          </div>
        </div>
      </div>
      <!-- Quiz -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/quiz.jpg" class="game-img" alt="Quiz Master">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Quiz Master</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Test your knowledge across multiple topics.</p>
            <div class="mt-auto"><a href="../games/quiz/quiz.html" class="btn btn-primary play-btn w-100">Start Quiz</a></div>
          </div>
        </div>
      </div>
      <!-- Memory Game -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/word_flip.png" class="game-img" alt="Memory Flip">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Memory Flip</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.3</span>
            </div>
            <p>Flip & match cards to boost your memory.</p>
            <div class="mt-auto"><a href="games/memory.html" class="btn btn-primary play-btn w-100">Play Game</a></div>
          </div>
        </div>
      </div>
      
      <!-- Puzzle -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/puzzle.jpg" class="game-img" alt="Puzzle Blocks">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Puzzle Blocks</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Move blocks & solve creative puzzles.</p>
            <div class="mt-auto"><a href="games/puzzle.html" class="btn btn-primary play-btn w-100">Play Puzzle</a></div>
          </div>
        </div>
      </div>
      <!-- Snake -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/snake.jpg" class="game-img" alt="Snake And Ladder">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Snake And Ladder</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.8</span>
            </div>
            <p>Classic snake arcade – eat, grow, survive!</p>
            <div class="mt-auto"><a href="games/snake.html" class="btn btn-primary play-btn w-100">Play Snake</a></div>
          </div>
        </div>
      </div>
      <!-- Sudoku -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/soduku.jpg" class="game-img" alt="Sudoku">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Sudoku</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.5</span>
            </div>
            <p>Use logic to fill the number grid.</p>
            <div class="mt-auto"><a href="games/sudoku.html" class="btn btn-primary play-btn w-100">Play Now</a></div>
          </div>
        </div>
      </div>
      <!-- Tic Tac Toe -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/tiktactoe.jpg" class="game-img" alt="Tic Tac Toe">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Tic Tac Toe</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
              <span>3.0</span>
            </div>
            <p>Classic game against friend.Only two players can play.</p>
            <div class="mt-auto"><a href="games/tictactoe.html" class="btn btn-primary play-btn w-100">Play</a></div>
          </div>
        </div>
      </div>
      <!-- Hangman -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/hangman.jpg" class="game-img" alt="Hangman">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Hangman</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.8</span>
            </div>
            <p>Guess the hidden word carefully using your Mind.</p>
            <div class="mt-auto"><a href="games/hangman.html" class="btn btn-primary play-btn w-100">Play Hangman</a></div>
          </div>
        </div>
      </div>
    
    </div>
</div>



<!-- all games container -->
<div class="container" style="max-width:1450px; margin-top:-70px;" id="games">
  <br><br>
    <h2 class="games-title">All Available Games</h2>
    <br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
      <!-- Wordle -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/wordle2.jpg" class="game-img" alt="Wordle">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Wordle</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Guess the secret word in limited tries.</p>
            <div class="mt-auto"><a href="../games/wordle/wordle.html" class="btn btn-primary play-btn w-100">Play Now</a></div>
          </div>
        </div>
      </div>
      <!-- Quiz -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/quiz.jpg" class="game-img" alt="Quiz Master">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Quiz Master</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Test your knowledge across multiple topics.</p>
            <div class="mt-auto"><a href="../games/quiz/quiz.html" class="btn btn-primary play-btn w-100">Start Quiz</a></div>
          </div>
        </div>
      </div>
      <!-- Memory Game -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/word_flip.png" class="game-img" alt="Memory Flip">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Memory Flip</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.3</span>
            </div>
            <p>Flip & match cards to boost your memory.</p>
            <div class="mt-auto"><a href="games/memory.html" class="btn btn-primary play-btn w-100">Play Game</a></div>
          </div>
        </div>
      </div>
      <!-- Typing -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/typ.jpg" class="game-img" alt="Typing Speed">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Typing Speed</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.5</span>
            </div>
            <p>Improve typing speed & accuracy.</p>
            <div class="mt-auto"><a href="games/typing.html" class="btn btn-primary play-btn w-100">Start Typing</a></div>
          </div>
        </div>
      </div>
      <!-- Puzzle -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/puzzle.jpg" class="game-img" alt="Puzzle Blocks">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Puzzle Blocks</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
              <span>4.8</span>
            </div>
            <p>Move blocks & solve creative puzzles.</p>
            <div class="mt-auto"><a href="games/puzzle.html" class="btn btn-primary play-btn w-100">Play Puzzle</a></div>
          </div>
        </div>
      </div>
      <!-- Snake -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/snake.jpg" class="game-img" alt="Snake And Ladder">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Snake And Ladder</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.8</span>
            </div>
            <p>Classic snake arcade – eat, grow, survive!</p>
            <div class="mt-auto"><a href="games/snake.html" class="btn btn-primary play-btn w-100">Play Snake</a></div>
          </div>
        </div>
      </div>
      <!-- Sudoku -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/soduku.jpg" class="game-img" alt="Sudoku">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Sudoku</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.5</span>
            </div>
            <p>Use logic to fill the number grid.</p>
            <div class="mt-auto"><a href="games/sudoku.html" class="btn btn-primary play-btn w-100">Play Now</a></div>
          </div>
        </div>
      </div>
      <!-- Tic Tac Toe -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/tiktactoe.jpg" class="game-img" alt="Tic Tac Toe">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Tic Tac Toe</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
              <span>3.0</span>
            </div>
            <p>Classic game against friend.Only two players can play.</p>
            <div class="mt-auto"><a href="games/tictactoe.html" class="btn btn-primary play-btn w-100">Play</a></div>
          </div>
        </div>
      </div>
      <!-- Hangman -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/hangman.jpg" class="game-img" alt="Hangman">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Hangman</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.8</span>
            </div>
            <p>Guess the hidden word carefully using your Mind.</p>
            <div class="mt-auto"><a href="games/hangman.html" class="btn btn-primary play-btn w-100">Play Hangman</a></div>
          </div>
        </div>
      </div>
      <!-- Minesweeper -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/minesweeper.jpg" class="game-img" alt="Minesweeper">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Minesweeper</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.7</span>
            </div>
            <p>Avoid the hidden mines using logic.</p>
            <div class="mt-auto"><a href="games/minesweeper.html" class="btn btn-primary play-btn w-100">Play Mines</a></div>
          </div>
        </div>
      </div>
      <!-- 2048 -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/2048.jpg" class="game-img" alt="2048">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>2048</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
              <span>3.5</span>
            </div>
            <p>Merge tiles to reach the 2048 block.</p>
            <div class="mt-auto"><a href="games/2048.html" class="btn btn-primary play-btn w-100">Play 2048</a></div>
          </div>
        </div>
      </div>
      <!-- Space Shooter -->
      <div class="col h-100 d-flex align-items-stretch">
        <div class="game-card h-100 d-flex flex-column">
          <img src="./photos/spaceshooter.jpg" class="game-img" alt="Space Shooter">
          <div class="game-body d-flex flex-column flex-grow-1" style="flex:1 1 auto; min-height:205px;">
            <h4>Space Shooter</h4>
            <div class="rating">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
              <span>4.0</span>
            </div>
            <p>Shoot asteroids and survive in space!</p>
            <div class="mt-auto"><a href="games/spaceshooter.html" class="btn btn-primary play-btn w-100">Start Shooting</a></div>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- ABOUT SECTION -->
<section id="about" style="padding:80px 0; background:#f7faff;">
  <div class="container" style="max-width:1100px;">
    <div class="row align-items-center">
      
      <div class="col-md-6 mb-4">
        <img src="../partials/logo2.png" alt="About BrainSpark" style="width:65%; border-radius:20px; box-shadow:0 6px 20px rgba(0,0,0,0.12);">
      </div>

      <div class="col-md-6">
        <h2 style="font-size:2rem; font-weight:700; color:#092365; margin-bottom:20px;">
          About BrainSpark
        </h2>
        <p style="font-size:1.1rem; color:#4e5c74; line-height:1.7;">
          BrainSpark is a fun-based learning platform designed to boost your mind through exciting,
          interactive games. Whether you want to sharpen your logic, speed, vocabulary, memory, or
          problem-solving skills — BrainSpark has something for everyone.
        </p>

        <p style="font-size:1.1rem; color:#4e5c74; line-height:1.7;">
          Our goal is simple: <b>make learning enjoyable and accessible</b>. Play, improve, and grow —
          all in one place, anytime you want.
        </p>

        <a href="#games" class="btn btn-primary"
          style="border-radius:30px; padding:10px 30px; margin-top:15px;
          background: linear-gradient(90deg,#041739,#043082 95%);">
          Explore Games
      </a>
      </div>

    </div>
  </div>
</section>




<!-- FOOTER -->
<footer class="footer mt-auto">
  <div class="container">
    <div class="row align-items-top">
      <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="footer-logo">BrainSpark</div>
        <p style="color: #e3f2fd; max-width: 320px;font-size:1.1rem;">
          Play, learn, and challenge your brain with an all-in-one games platform. Blending fun and mental growth, BrainSpark is your partner for smarter leisure.
        </p>
      </div>
      <div class="col-lg-3 mb-4 mb-lg-0">
        <div class="footer-links">
          <div class="fw-bold mb-2">Explore</div>
          <a href="#">Games</a>
          <a href="#about">About Us</a>
          <a href="#">FAQ</a>
        </div>
      </div>
      <div class="col-lg-3 mb-4 mb-lg-0">
        <div class="footer-links">
          <div class="fw-bold mb-2">Support</div>
          <a href="#">Contact</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
        </div>
      </div>
      <div class="col-lg-2 mb-0 d-flex align-items-lg-center">
        <div>
          <div class="fw-bold mb-2">Follow Us</div>
          <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom mt-3">
      &copy; 2025 BrainSpark | Crafted with <i class="bi bi-lightning-fill" style="color:#faf636;"></i> for curious minds.
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function logout(){
        header("Location: logout.php");
    }

    </script>
    <script>
const slides = document.querySelectorAll(".slide");
const dotsContainer = document.querySelector(".slider-dots");
let index = 0;

/* ===== Create Dots Dynamically ===== */
slides.forEach((_, i) => {
    let dot = document.createElement("span");
    dot.onclick = () => showSlide(i);
    dotsContainer.appendChild(dot);
});
const dots = dotsContainer.querySelectorAll("span");
dots[0].classList.add("active-dot");

/* ===== Show Slide Function ===== */
function showSlide(i) {
    slides.forEach(s => s.classList.remove("active"));
    dots.forEach(d => d.classList.remove("active-dot"));

    slides[i].classList.add("active");
    dots[i].classList.add("active-dot");

    index = i;
}

/* ===== Auto Slide ===== */
function autoSlide() {
    index = (index + 1) % slides.length;
    showSlide(index);
}
setInterval(autoSlide, 4500); // every 4.5 seconds

/* ===== Arrow Controls ===== */
document.querySelector(".prev").onclick = () => {
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
};

document.querySelector(".next").onclick = () => {
    index = (index + 1) % slides.length;
    showSlide(index);
};
</script>


</body>
</html>

