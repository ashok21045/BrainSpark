<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BrainSpark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', Arial, sans-serif;
            background: linear-gradient(120deg, #0a1316ff 0%, #0c1c3cff 100%);
            color: #fff;
            min-height: 100vh;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 48px 0 48px;
            
        }
        .logo-group {
            display: flex;
            align-items: center;
            gap: 13px;
           
        }
        .logo-group img {
            height: 80px;
            width: auto;
            display: block;
        }
        .logo-group .brand-text {
            font-weight: 700;
            font-size: 2rem;
             color: #ffd369;
            font-family: 'Poppins', sans-serif;
            /* letter-spacing: 1px; */

        }
        .menu {
            display: flex;
            gap: 36px;
        }
        .menu a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.14rem;
            transition: opacity 0.2s;
        }
        .menu a:hover {
            opacity: 0.6;
        }
        .main-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 100px;
        }
        .main-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .main-content p {
            font-size: 1.19rem;
            margin-bottom: 28px;
            text-align: center;
            max-width: 450px;
            line-height: 1.31;
        }
        .start-btn {
            background: #5cdfb2ff;
            color: #000000ff;
            border: none;
            border-radius: 28px;
            font-size: 1.31rem;
            font-weight: bold;
            padding: 19px 57px;
            cursor: pointer;
            margin-bottom: 48px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.09);
            transition: background 0.2s;
        }
        .start-btn:hover {
            background: #1cd3aeff;
        }
        .game-panels {
            display: flex;
            gap: 38px;
            justify-content: center;
        }
        .panel {
            background: rgba(255,255,255,0.08);
            border-radius: 22px;
            padding: 32px 38px;
            min-width: 260px;
            height: 200px;
            text-align: center;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .panel h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 13px;
        }
        .panel p {
            font-size: 1.1rem;
            margin-bottom: 22px;
            color: #e5f2ff;
        }
        .play-btn {
            background: #5cdfb2ff;
            color: #262626;
            border: none;
            border-radius: 22px;
            font-size: 1.13rem;
            font-weight: 700;
            padding: 14px 34px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .play-btn:hover {
            background: #1cd3aeff;
        }

           .footer {

            text-align: center;
            color: rgb(156, 146, 133);
           
            padding-top: 20px;
            padding-bottom: 20px;
            background: #031921ff ;
        }


        @media (max-width: 700px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 16px 0 16px;
            }
            .logo-group .brand-text {
                font-size: 1.3rem;
            }
            .main-content h1 {
                font-size: 2rem;
            }
            .start-btn {
                font-size: 1rem;
                padding: 13px 22px;
            }
            .game-panels {
                flex-direction: column;
                gap: 22px;
                width: 94vw;
                align-items: center;
            }
            .panel {
                min-width: unset;
                width: 100%;
                padding: 22px 7px;
            }
        }
    


        

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo-group">
            <img src="logo.png" alt="BrainSpark Logo">
            <span class="brand-text">BrainSpark</span>
        </div>
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Games</a>
            <a href="#">About</a>
            <a href="#">Login</a>
        </div>
    </nav>
    <hr style = " background-color: #464545ff; height: 1px; border: none;">
    <section class="main-content">
        <h1>Ignite Your Mind <span>🔥</span></h1>
        <p>Play Wordle & Quiz. Challenge your brain, compete with friends, and win!</p>
        <button class="start-btn" onclick="window.location.href='login.php'">Start Playing</button>
        <div class="game-panels">
            <div class="panel">
                <h2>Wordle</h2>
                <p>Guess the word in limited tries!</p>
                <button class="play-btn">Play Now</button>
            </div>
            <div class="panel">
                <h2>Quiz</h2>
                <p>Test your knowledge & beat the clock!</p>
                <button class="play-btn">Play Now</button>
            </div>
        </div>
    </section>
    <hr style = " background-color: #464545ff; height: 1px; border: none;">
     <footer class="footer">
        © 2025 BrainSpark | Built by Ashok
    </footer>
</body>
</html>
