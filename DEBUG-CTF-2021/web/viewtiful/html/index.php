<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="hi.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body >
    <h1>index page</h1>
    <nav>
      <a href="?view=1">source</a>
      <a href="index.php">index</a>
      <a href="page1.php">page1</a>
      <a href="page2.php">page2</a>
      <a href="page3.php">page3</a>

      <div class="animation start-home"></div>
    </nav>

    <?php
      if($_GET['view']) show_source('index.php');
     ?>
  </body>
</html>
