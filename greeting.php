<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Greeting Page</title>
</head>
<body>
<main>
<?php
  if(empty($_GET['last-name']) || empty($_GET['dominant-hand'])) {
      echo '<h1> Error<h1>
      <p>You must fill out the form, <a href="greeting.html">Try Again</a></p>';
  } else {
    $lastName =$_GET['last-name'];
    $dominantHand = $_GET['dominant-hand'];
    switch($dominantHand) {
      case 'left':
        echo "<p> Hello, Lefty $lastName!</p>";
      break;
      default:
        echo "<p> Hello, Righty $lastName!</p>";
  }
}
 ?>
</main>
</body>
</html>