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
      $rand = mt_rand(5656,900000000);

      $in=md5((int)$_GET['c']+$rand);
      $db_conn = @mysqli_connect("mysql", "root", "example", "hi");

      system('echo "flag" > hi;');
      if($_GET['c']!==NULL)
      {
        mysqli_query($db_conn,"insert into hiru values(null,'{$in}');");// values(id,name)
      }

      $result = mysqli_query($db_conn,"select * from hiru where id='{$_GET['sel']}';");
      $row = mysqli_fetch_array($result);

      if($row[1]!==0)//to do : !== -> !=
      {
        echo "<h2>get in admin page to get flag<br>select : </h2>";
        echo "<h2>".$row[1]."</h2>";
        system('echo no flag > hi;');
      }
     ?>
     <a href="source" target="_blank" class="footer">View source</a>
  </body>
</html>
