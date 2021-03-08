<?php
  function db_connect(){
    return mysqli_connect('mysql', 'root', 'example', 'simple_service');
  }
?>
