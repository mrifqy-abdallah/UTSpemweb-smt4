<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/kunci2.png">

    <title>Signin Game Tebak Kata</title>

    <link rel="stylesheet" href="bootstrap.min.css">

    <link href="login.css" rel="stylesheet">
  </head>

  <body class="text-center" background="blue">
    <form class="form-signin" action="controller.php" method="POST">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <input type="name" name="username" id="inputname" class="form-control" placeholder="Your name" required>
      <div class="checkbox mb-3">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit3">Sign in</button>
    </form>
  </body>
</html>