<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="hi.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body width="100%" height="100%">
    <form action="login.php" method="post" class="loginForm">
      <h2>Login</h2>
      <div class="idForm">
        <input type="text" class="id" name="name" value="">
      </div>
      <div class="passForm">
        <input type="text" class="pw" name="pw" value="">
      </div>
      <input type="submit" class="btn" value="login" >
      <div class="bottomText">
      Don't you have ID? <a href="join.php">sign up</a>
    </div>
    <a href="source">view_source</a>
    </form>
    <?php
      //prevent brute force
      sleep(3);

      //secret
      $id='debug';
      $pw='flag';
      $FLAG='debugCTF{plz_say_easy}';

      $s=mysqli_connect("mysql","root","example","hi");
      $sql = "select * from hiru where name='{$_POST['name']}' and password='{$_POST['pw']}'";
      $result = mysqli_query($s,$sql);
      $row = mysqli_fetch_array($result);

      //encode to security
      if(empty($row['name'])||empty($row['password']))
      {
        $a=1;

      }
      else{
        $result = base_convert($id,36,10)+base_convert($pw,36,10)-23230976;
        if($result=='admin'&&$row['name']==='debug')//todo : convert name to secret
        {
          echo '<script>alert("'.$FLAG.'")</script>';
        }
        else {
          echo '<script>alert("no flag")</script>';
        }
      }
    ?>
    </body>
</html>
