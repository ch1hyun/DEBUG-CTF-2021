<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="hi0.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>page2</h1>
    <nav>
      <a href="index.php">index</a>
      <a href="page1.php">page1</a>
      <a href="page2.php">page2</a>
      <a href="page3.php">page3</a>

      <div class="animation start-home"></div>
    </nav>
    <?php
      echo "<h1>2</h1>";
      echo '<br>';
      if($_GET['view']) show_source('page2.php');
     ?>
  </body>
</html>
