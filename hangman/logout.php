<?php
	setcookie("username", '', time()-3600*24*7,"/Nybc/hangman");
	header("Location: index.php");
?>