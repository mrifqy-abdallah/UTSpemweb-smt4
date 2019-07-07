<?php
session_start();

if(isset($_GET['action'])){
    $action = $_GET['action'];
}
elseif(isset($_POST['action'])){
    $action = $_POST['action'];
}
else{
    $action = 0;
}

if (isset($_COOKIE['username'])){
    $status = true;
} else {
    $status = false;
}

?>

<?php
	if (isset($_POST['submit3'])){
	 	setcookie("username", $_POST['username'], time()+3600*24*7,"/Nybc/hangman");
	}else if(isset($_POST['submit2'])){
		$userInfo = $_COOKIE['username'];
		setcookie("username", $userInfo, time()+3600*24*7,"/Nybc/hangman");
		//header("Location: action.php");
	}
?>

<?php
switch($action)
{
    case 0: // Title
        $levels = array('0' => 'Easy game: you are allowed 10 misses.',
                        '1' => 'Medium game: you are allowed 5 misses.',
                        '2' => 'Hard game: you are allowed 3 misses.');
                                
        require 'title.php';
                      
        break;
        
    case 1: // Start
        $lines = file('To.txt');      
        $word = $lines[rand(0, count($lines) - 1)];
		$word = substr($word, 0);   


        $_SESSION['word'] = trim($word);
        $_SESSION['foundLetters'] = '';
        $_SESSION['win'] = null;
        
        $level = 0;
        if(isset($_POST['level']))
            $level = $_POST['level'];
        $_SESSION['level'] = $level;

        if (isset($_SESSION['score'])) {
            $_SESSION['score'] += 10;
        } else {
            $_SESSION['score'] = 10;
        }
        
        switch($level)
        {
            case 0: // Easy
                $_SESSION['lives'] = 10;
                $_SESSION['scoreDec'] = 1;
                break;
            case 1: // Medium
                $_SESSION['lives'] = 5;
                $_SESSION['scoreDec'] = 2;
                break;
            case 2: // Hard
                $_SESSION['lives'] = 3;
                $_SESSION['scoreDec'] = 3;
                break;                
        }
        
        $_SESSION['image'] = 0;
        
        $blankWord =  '';
        //awas sama \r\n
		for($i = 0; $i < strlen(trim($word)); $i++)
		{
	      $blankWord .= ($word[$i] != ' ' ? '<span class="guessed-letter">_</span>' : ' ');	
		}
		
        require 'start.php';
        
        break;
    case 2: // Called via AJAX
        $response = array();
        
        if($_SESSION['win'] == null)
        {
            $letter = strtolower($_POST['letter']);
     
            if(strpos(strtolower($_SESSION['word']), $letter) === false)
            {
                $_SESSION['lives'] -= 1;
                $_SESSION['score'] -= $_SESSION['scoreDec'];
                switch($_SESSION['level'])
                {
                    case 0:
                        $_SESSION['image'] += 1;
                        break;
                    case 1:
                        $_SESSION['image'] += 2;
                        break;
                    case 2:
                            if($_SESSION['image'] == 0)
                                $_SESSION['image'] = 3;
                            elseif($_SESSION['image'] == 3)
                                $_SESSION['image'] = 6;
                            else
                                $_SESSION['image'] = 10;
                        break;
                }
                $response['image'] = 'images/hangman/' . $_SESSION['image'] . '.jpg';
                
                if($_SESSION['lives'] == 0)
                {
                	if ($_SESSION['level'] == 2 && $_SESSION['score'] == 1) {
                		$_SESSION['score'] -= 1;
                	}
                	
                    $_SESSION['win'] = false;
                    $response['word'] = 'The word was: <b>' . $_SESSION['word'] . '</b>';

					// simpan skor dan waktu main ke dalam cookie
					setcookie('score', $_SESSION['score'], time()+3600*24*7);
					setcookie('lasttime', date('d/m/Y H:i'), time()+3600*24*7);

					// bagian kode untuk insert data username, score, playtime ke tabel scores

					include 'dbconfig.php';

			
					$query = "INSERT INTO tebakkata (username, score, playtime) VALUES ('".$_COOKIE['username']."', ".$_SESSION['score'].", '".date('Y-m-d H:i:s')."')";
					$hasil = mysqli_query($db, $query) or die(mysqli_error());
                }             
            }   
            else
            {
                $_SESSION['foundLetters'] .= $letter;
              
                $i = 0;
                $wordLetters = str_split($_SESSION['word']);
                $foundLetters = str_split($_SESSION['foundLetters']);
                foreach($wordLetters as $letter)
                {
                    $found = false;
                    
                    foreach($foundLetters as $letter2)
                    {
                        if(strtolower($letter) == strtolower($letter2))
                        {
                            $found = true;
                            break;
                        }
                    }
                    
                    if($found)
                        $i++;
                }  
                if($i == strlen($_SESSION['word']) - substr_count($_SESSION['word'], ' ')){
                    $_SESSION['win'] = true;
                	
                	setcookie('score', $_SESSION['score'], time()+3600*24*7);
					setcookie('lasttime', date('d/m/Y H:i'), time()+3600*24*7);

					// bagian kode untuk insert data username, score, playtime ke tabel scores

					include 'dbconfig.php';

			
					$query = "INSERT INTO tebakkata (username, score, playtime) VALUES ('".$_COOKIE['username']."', ".$_SESSION['score'].", '".date('Y-m-d H:i:s')."')";
					$hasil = mysqli_query($db, $query) or die(mysqli_error());
                }
            }
        }

        $wordLetters = str_split($_SESSION['word']);
        $foundLetters = str_split($_SESSION['foundLetters']);
        $guessedWord = '';
        
        foreach($wordLetters as $letter)
        {
            $found = false;
            
            foreach($foundLetters as $letter2)
            {
                if(strtolower($letter) == strtolower($letter2))
                {
                    $found = true;
                    break;
                }
            }
                
	    if($found)
		{$guessedWord .= $letter;}
	    elseif($letter != ' ')
		{$guessedWord .= '<span class="guessed-letter">_</span>';}
	    else
		{$guessedWord .= ' ';}
        }  
      
        $response['win'] = $_SESSION['win'];
        $response['lives'] = $_SESSION['lives'];
        $response['guessedWord'] = $guessedWord;
        
        echo json_encode($response);  
           
        break;    
}
?>