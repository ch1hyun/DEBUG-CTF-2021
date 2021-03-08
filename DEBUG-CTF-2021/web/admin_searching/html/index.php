<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css">
    <title>lord of sql injection</title>
  </head>
  <body>
    <div class="container">
      <h1>ANYBODY THERE? :)</h1><br><hr><br>

      <form method="POST">
        <fieldset>
          <legend>Search for DEBUG CTF admins</legend>
            <div id="form-container">
              <br><span>Admins number : 1 ~ 5</span><br><br>
              <input type="text" name="admins"/><input type="submit" value="Search"/>
            </div>
        </fieldset>
      </form>
      <br><a href="./view_source.php">view_source</a><br><br>

      <?php
        if($_POST['admins']){
          if(preg_match('/ascii|union| |\"|\'|and|#|left|mid|substr|if|sleep|benchmark|\(\)|0x|length|\-|=|\*|\+|\/|char|concat|group|ord|%|use|delete|insert|into|drop|create|alter/i', $_POST['admins'])) exit('DO YOUR BEST');

          include "./config.php";
          $s=db_connect();

          $sql = "select * from producer where value = {$_POST['admins']}";
          $result = mysqli_query($s,$sql);

          while($row = mysqli_fetch_array($result)) {
            echo $row['name'];
          }

          mysqli_close($s);
        }
      ?>
    </div>
  </body>
</html>
