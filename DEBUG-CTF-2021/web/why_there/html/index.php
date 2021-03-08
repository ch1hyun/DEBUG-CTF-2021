<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="s.css">
    <meta charset="utf-8">
  </head>
  <body>
    <!-- excute /f1a9
    <br>
    <h1>calculate</h1> -->
    <form method="post" class="form-wrapper cf">
        <input type="text" name="calc" placeholder="calc here..." required>
        <button type="submit" >calc</button>
    </form>

  </body>
</html>
<?php
  $arr2 = '` x 0 1 2 3 4 5 6 7 8 , 9 - + / * ( ) a b c d e f';
  $arr = explode(' ', $arr2 );
  $ho=true;
  $post = str_split($_POST["calc"]);

  foreach ($post as $v){
    if(!in_array($v,$arr)) $ho=false;
  }

  if($ho)
  {
    $a='$c= ';
    eval($a.$_POST["calc"].";");
    echo "<span>".$c."</span>";
  }
  else {
    echo '<span>only can use `,x,0,1,2,3,4,5,6,7,8,9,-,+,/,*,(,),a,b,c,d,e,f</span>';
  }
 ?>
