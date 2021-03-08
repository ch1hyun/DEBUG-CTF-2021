<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="e.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>

    <h1>tired</h1>

    <a href="laugh.php" class="btn">Home page</a>
    <a href="admin.php" class="btn">Admin page</a>
    <br><br><br><br>

    <?php
      //secret
      $FLAG = 'debugCTF{then_go_to_sleep}';

      $result=exec('cat hi;');
      if($result==='flag')
      {
        echo "<h2>".$FLAG."</h2>";
      }
      else {
        echo '<h2>no flag</h2>';
      }

    ?>
    <a href="source2" target="_blank" class="footer">View source</a>
  </body>
</html>
