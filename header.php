<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Nate's Scoreboard</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Nate's Scoreboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span>
        </a>
        <?php
        if (isset($_SESSION["useruid"])) {
          echo "<li class='nav-item'><a class='nav-link' href='profile.php'> Profile <span class='sr-only'></span></a></li>";
          echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'> Log Out <span class='sr-only'></span></a></li>";
          echo "      <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' role='button' data-toggle='dropdown' aria-expanded='false'>
            Sports
          </a>
          <div class='dropdown-menu'>
            <a class='dropdown-item' href='mlb.php'>MLB</a>
            <a class='dropdown-item' href='nfl.php'>NFL</a>
            <a class='dropdown-item' href='nba.php'>NBA</a>
          </div>
        </li>";
        }
        else {
          echo "<li class='nav-item'><a class='nav-link' href='signup.php'> Sign Up <span></span class='sr-only'></a></li>";
          echo "<li class='nav-item'><a class='nav-link' href='login.php'> Log In <span></span class='sr-only'></a></li>";
        }
        ?>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>