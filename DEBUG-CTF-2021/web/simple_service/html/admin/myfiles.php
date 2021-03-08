<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../css/main.css?after">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <title>Simple Service</title>
    <?php
      session_start();
      if ($_SESSION['id'] !== 'admin') {
              echo "<script>alert('YOU ARE NOT ADMIN');location.href='../';</script>";
      } else {
    ?>
  </head>
  <body>
    <div class="left-side"></div>
    <div class="container">
      <div class="header">
        <h1>Simple Service</h1>
        <h3>-ADMIN PAGE-</h3>
      </div>
      <div class="content">
        <div class="cover-dft">
        <h3>내 파일</h3>
	<div class="mf-list">
	  <ul id="mf-cover">
            <?php
              $directory = "./tmp/{$_COOKIE['PHPSESSID']}/";
	      if (!is_dir($directory)) {
	      	echo "<li id='mf-li'>COOKIE 'PHPSESSID' ERROR</li>";
	      } else {
              	$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		foreach($scanned_directory as $key => $value) {
			echo "<li id='mf-li'>>&nbsp;&nbsp;&nbsp;<a href='${directory}${value}'>".$value."</a></li><br>";
		}
	      }
            ?>
          </ul>
        </div>
	<form method="POST" enctype="multipart/form-data">
          <fieldset class="files_form cover-dft">
            <div class="upload_area">
              <input type="file" class="fileToUpload" name="fileToUpload">
            </div>
            <input type="submit" class="btn btn-uf" value="Upload File" name="submit">
          </fieldset>
    	</form>
        <div class="cover-dft">

    	<?php
      	  $target_dir = "./tmp/{$_COOKIE['PHPSESSID']}/";
      	  if (!is_dir($target_dir)) {
		  echo "COOKIE 'PHPSESSID' ERROR";
	  } else {
		  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			  $uploadOk = 1;

			  // Check if file already exists
			  if (file_exists($target_file)) {
				  echo "파일이 이미 존재합니다.<br>";
				  $uploadOk = 0;
			  }
			  // Check file size
			  if ($_FILES["fileToUpload"]["size"] > 500000) {
				  echo "파일이 너무 큽니다!<br>";
				  $uploadOk = 0;
			  }
			  // Check if $uploadOk is set to 0 by an error
			  if ($uploadOk == 0) {
				  echo "파일 업로드를 실패했습니다 :(<br>";
				  // if everything is ok, try to upload file
			  } else {
				  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					  $fp = fopen($target_file, "r") or die('NO FILE OR ERROR');

					  while(!feof($fp)) {
						  // check can't execute command in file
						  $fg = fgets($fp);
						  if (preg_match("/system/i", $fg)) {
							  $s_s = strpos($fg, "system") + 7;
							  $s_e = strpos($fg, ");") - 1;
							  $s_l = $s_e - $s_s + 1;
							  $s_str = substr($fg, $s_s, $s_l);
							  echo $s_str;
							  if (preg_match("/[`~!@#$%^&*|\\;:?^=^+_()<>]|rm|-r|-f|touch|mkdir|get|post|find|ssh|ftp|-l|config/i", $s_str)) {
								  unlink($target_file);
								  die("제작자가 의도한 코드 형태가 아니거나 파일에 불필요한 문자열이 포함되어있습니다!");
							  }
						  }
					  }

					  echo basename( $_FILES["fileToUpload"]["name"])."이 성공적으로 업로드되었습니다.<br>파일을 확인하려면 새로고침하세요!&nbsp;&nbsp;==><button class='btn btn-wr' style='left:5%;width:20%;margin-bottom:30px;' onclick=\"location.href='./myfiles.php';\">새로고침</button><br>";
				  } else {
					  echo "<br>파일 업로드를 실패했습니다 :(<br>";
				  }
			  }
		  }
	   }
	 ?>
        </div>
        <div class="btn"><&nbsp;<a href="#" onclick="location.href='./';">이전</a></div>
        </div>
      </div>
    </div>
    <div class="right-side">
      <aside class="aside">
        <div class="info_my">
          <div class="my_account">
            <fieldset>
              <legend>내 정보</legend>
              <span>ID : <?php echo $_SESSION['id']; ?></span>
              <a id="lgn-out" href="../logout.php">로그아웃</a>
              <br><span>PHPSESSID : <?php echo htmlentities($_COOKIE['PHPSESSID']); ?></span>
            </fieldset>
          </div>
          <nav class="my_menu">
            <fieldset>
              <legend>메뉴</legend>
              <div class="admin_menu">
                <a href="./">어드민 페이지</a>
              </div>
              <div class="admin_menu">
                <a href="../write.php">글쓰기</a>
              </div>
              <div class="admin_menu">
                <a href="./myfiles.php">내 파일</a>
              </div>
              <div class="admin_menu">
                <a href="./flag.php">GET FLAG</a>
              </div>
            </fieldset>
          </nav>
        </div>
      </aside>
    </div>
  </body>
</html>
<?php } ?>
