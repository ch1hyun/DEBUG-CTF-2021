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
          <h3>내가 쓴 글</h3>
          <table class="table table-striped">
            <thead><tr><td>idx</td><td>title</td></tr></thead>
            <tbody>
              <?php
                include "../config.php";
                $s = db_connect();
                $ck = mysqli_real_escape_string($s, $_COOKIE['PHPSESSID']);
                $sql = "SELECT title FROM board WHERE writer = '${ck}' ORDER BY idx ASC";
                $result = mysqli_query($s, $sql);
                $idx = 1;
                while ($r = mysqli_fetch_array($result)) {
			$title = htmlentities($r['title']);
			echo "<tr>";
			echo "<td>${idx}</td>";
			echo "<td>${title}</td>";
			echo "</tr>";
			$idx++;
		}
	        mysqli_close($s);
	      ?>
            </tbody>
          </table>
        </div>
        <div class="btn"><a href="../">홈으로</a></div>
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
