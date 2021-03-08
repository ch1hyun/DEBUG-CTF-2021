<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="hi.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body width="100%" height="100%">
    <form action="join.php" method="post" class="loginForm">
      <h2>Join</h2>
      <div class="idForm">
        <input type="text" class="id" name="name" value="">
      </div>
      <div class="passForm">
        <input type="text" class="pw" name="pw" value="">
      </div>
      <input type="submit" class="btn"  value="join">
      <div class="bottomText">
      <a href="login.php">login</a>
    </div>
    <a href="source2">view_source</a>
    </form>
    <?php
      //prevent brute force
      sleep(3);

      if(empty($_POST['name'])||empty($_POST['pw']))
      {
        $a=1;
      }
      else{
        $s=mysqli_connect("mysql","root","example","hi");
        $sql = "insert into hiru values(NULL,'{$_POST['name']}','{$_POST['pw']}')";
        $result = mysqli_query($s,$sql);
        echo "<script>alert('success')</script>";
      }
    ?>

  </body>
</html>
