<?php
include_once "utilities.php";
if (isDebugMode()) {
  ini_set('display_errors','1');
 //This code uses ini_set() to turn on the display_errors setting, but only when in debug mode
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:300,400">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Assistant">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" crossorigin="anonymous"
  href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU">
<link rel="stylesheet" href="styles/normalize.css">
<link rel="stylesheet" href="styles/mainstyles.css">
<script src="../../../static/scripts/scripts.js"></script>
<title><?= $pageTitle ?> | The Poet Tree Club</title>
</head>
<body>
<header>
  <nav id="main-nav">
    <!-- Bar icon for mobile menu -->
    <div id="mobile-menu-icon">
      <i class="fa fa-bars"></i>
    </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="poems.php">Poems</a></li>
      <li><a href="poem-submit.php">Submit Poem</a></li>
      <li><a href="my-account.php">My Account</a></li>
      <li><a href="contact.php">Contact us</a></li>
    </ul>
  </nav>
  <h1>
    <a href="index.php">The Poet Tree Club</a>
  </h1>
  <h2>Set your poems free...</h2>
</header>