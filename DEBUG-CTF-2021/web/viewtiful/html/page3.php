<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="hi0.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>page3</h1>
    <nav>
      <a href="index.php">index</a>
      <a href="page1.php">page1</a>
      <a href="page2.php">page2</a>
      <a href="page3.php">page3</a>

      <div class="animation start-home"></div>
    </nav>
    <?php

      $answer="debugCTF{view_is_nice}";
      echo "<h1>".md5($answer)."</h1><br>";
      if($_GET['view']) show_source('page3.php');
     ?>
  </body>
</html>
