<?php

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hangman</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="hangman-div2">
            <div>
                Choose a letter:
                <div id="letters">
                    <?php
                    foreach (range('A', 'Z') as $char) {
                        echo '<span class="letter">' . $char . '</span>';
                    }
                    ?>
                    <div class="clear"></div>
                </div>
                <div id="lives-left-div">
                    Lives left: <span id="lives-left"><?= $_SESSION['lives'] ?></span>
                </div>
            </div>
            <div>
                <img src="images/hangman/0.jpg" id="hangman" alt="hangman"/>
            </div>
            <div>
                <div id="guessed-word-div">
                    <?= $blankWord ?>
                </div>
                <div id="the-word-was-div" class="display-none"></div>
                <div id="play-again-div" class="display-none">
                    <a href="controller.php">Play again?</a><br>
                    or<br>
                    <a href="logout.php">Sign In as other</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="credits">
            <span>by Kelompok5</a></span>
        </div>
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/script.js"></script> 
    </body>
</html>



