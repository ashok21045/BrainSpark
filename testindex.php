<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainSpark</title>
    <!-- css started -->
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;

        }

        .hero {

            height: 300px;
            width: 100%;
            background: #0f172a;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            height: 90%;
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .brand {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 25%;
            width: 80%;
        }

        .logo {
            height: 10vh;
            width: 10vh;
        }

        .logo-title {
            color: #38bdf8;
            font-size: 3rem;
        }

        .tagline {
            color: rgb(156, 146, 133);
            font-size: 1.2rem;
            margin-top: -2px;
            margin-left: 15px;
        }

        .start_button {
            height: 17%;
            width: 40%;
            border-radius: 7px;
            background-color: #38bdf8;
            color: aliceblue;
            font-weight: 600;
            font-size: large;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .start_button:hover {
            transform: scale(1.03);
        }


        /* mid section */

        .container_cards {

            display: flex;
            background-color: #1c283a;
            ;
            justify-content: space-around;
            align-items: center;
            height: 290px;
            width: 100%;

        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #0f172a;
            height: 55%;
            width: 35%;
            border-radius: 12px;

        }

        .card--wordle {
            margin-right: -45px;
        }

        .card--quiz {
            margin-left: -45px;
        }

        .card a {
            display: flex;
            /* let the link behave like the card’s content */
            flex-direction: column;
            justify-content: center;
            align-items: center;

            text-decoration: none;
            /* remove underline */
            color: white;
            /* keep the card text color */
            height: 100%;
            width: 100%;

        }

        .card {
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }



        /* footer */

        .footer {

            text-align: center;
            background-color: #0f172a;
            color: rgb(156, 146, 133);
            height: 150px;
            padding-top: 20px;
        }



        


    </style>

</head>

<body>

    <header class="hero">
        <div class="container">
            <div class="brand">
                <img src="logo.png" alt="BrainSpark-Logo" class="logo">
                <h2 class="logo-title">BrainSpark</h2>
            </div>
            <p class="tagline">Ignite Your Mind. Play. Guess. Win.</p>
           <button class="start_button" onclick="window.location.href='login.php'">login</button>
        </div>

    </header>
    <!-- header end  -->

    <!-- body starts -->


    <section id="games" class="section-games">
        <div class="container_cards">
            <div class="card card--wordle">
                <a href="wordle.html">
                    <h2 style="margin: 0px;padding: 5px;">Wordle</h2>
                    <p style="margin: 0px;padding: 5px;">Guess the secret 5-letter word in 6 tries!</p>
                </a>
            </div>
            <div class="card card--quiz">
                <a href="quiz.html">
                    <h2 style="margin: 0px;padding: 5px;">Quiz</h2>
                    <p style="margin: 0px;padding: 5px;">Test your knowledge with fun quizzes.</p>
                </a>
            </div>
        </div>
    </section>

    <footer class="footer">
        © 2025 BrainSpark | Built by Ashok
    </footer>


</body>

</html>