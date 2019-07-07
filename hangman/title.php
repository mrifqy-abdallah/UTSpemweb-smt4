 <!DOCTYPE html>
<html>
    <head>
        <title>Hangman</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
         <div id="hangman-div">
            <form action="controller.php" method="POST">
               <input type="hidden" name="action" value="1" />
                <div class="center">
                    <div id="levels-div" >
                        
                        <span id="level">
                           
                            <input type="radio" name="level" checked="checked" id="level_0" value="0" >
                                <img src="" id="arrow1" width="10px" height="10px">
                                <label for="level_0">Easy game: you are allowed 10 misses.</label><br>
                            <input type="radio" name="level" id="level_1" value="1" >
                                <img src="" id="arrow2" width="10px" height="10px">
                                <label for="level_1">Medium game: you are allowed 5 misses.</label><br>
                            <input type="radio" name="level" id="level_2" value="2" >
                                <img src="" id="arrow3" width="10px" height="10px">
                                <label for="level_2">Hard game: you are allowed 3 misses.</label>
                            
                         </span>
                        
                    </div>
                    <div>
                    <?php
                        if ($status == false){
                    ?>
                         <input type="submit" value="Play!!!" id="submit-button" name="submit" />
                    <?php       
                        } else {
                         echo "<p>Hei, ".$_COOKIE['username']." !!</p>";
                         echo "<p>akumulasi score anda adalah ".$_COOKIE['score']." ( ".$_COOKIE['lasttime']." )</p>";
                    ?>
                              <input type="submit" value="Play Again!!!" id="submit-button" name="submit2" />
                    <?php
                         }
                    ?>
                        
                    </div>
                </div>
            </form>
        </div>      
    </body>
    
</html>
