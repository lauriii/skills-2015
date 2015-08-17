<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TIC-TAC-TOE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style type="text/css">
        /* style for user image (overwrite .o) */
        .o {
            background: url('uploads/photo.jpg') no-repeat center center !important;
            background-size: 60px !important;
            border-radius: 50%;
            border: 1px solid rgba(0, 0, 0, .2) !important;
        }
    </style>
    <!-- put any js-code into this file -->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="assets/js/app.js"></script>
</head>
<body>
<section class="container-game">
    <article class="title-row">
        <h1>TIC-TAC-TOE</h1>
    </article>
    <article class="row initial-page">
        <article class="col">
            <article class="subtitle-row">
                <h2>Instructions</h2>
            </article>
            <article class="container-row">
                Instructions of game:
                <ul>
                    <li>Select Photo (optional)</li>
                    <li>Press "Start New Game"</li>
                    <li>Play Game: try to mark three fields in a vertical, horizontal or diagonal row one move before the computer</li>
                </ul>
            </article>
            <article class="subtitle-row">
                <h2>High Scores</h2>
            </article>
            <article class="container-row high scroll">
                <article class="scroll-view">
                    <article class="score">
                        <h4 class="pos">1</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">13/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos">2</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">12/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos" style="background: url('uploads/photo.jpg')no-repeat center center;background-size: cover">3</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">11/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos">4</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos">5</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">10/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos">6</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">09/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos">7</h4><h4 class="name-high">Hanna <span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">08/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                    <article class="score">
                        <h4 class="pos">8</h4><h4 class="name-high">Jhoan<span class="moves"><span>5</span>-<span>4</span></span></h4>
                        <p><span class="date-high">07/05/2015</span><span class="time-high">60 sec</span></p>
                    </article>
                </article>
            </article>
        </article>
        <article class="col border-line col-game-spacing">
            <?php print $content; ?>
        </article>
</section>
</body>
</html>