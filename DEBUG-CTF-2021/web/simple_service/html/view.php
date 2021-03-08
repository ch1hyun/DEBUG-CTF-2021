<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css?after">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <title>Simple Service</title>
    <?php
      session_start();
      if (!$_GET['idx']) {
	      echo "<script>alert('REQUEST ERROR');location.href='./';</script>";
      } else {
	      include "./config.php";
	      $s = db_connect();
	      if ($_GET['wt'] === 'ad') {
		      $sql = "SELECT title, contents, time_c, view_c FROM board WHERE idx='{$_GET['idx']}' and writer='ADMIN'";
	      } else {
		      $ck = mysqli_real_escape_string($s, $_COOKIE['PHPSESSID']);
		      $sql = "SELECT title, contents, time_c, view_c FROM board WHERE idx='{$_GET['idx']}' and writer='${ck}'";
	      }

	      $result = mysqli_query($s, $sql);
	      if (!$result) {
		      echo "<script>alert('REQUEST ERROR');location.href='./';</script>";
	      } else {
		      $r = mysqli_fetch_array($result);
		      $r['view_c']++;
		      $sql_u = "UPDATE board SET view_c=".$r['view_c']." WHERE idx='{$_GET['idx']}'";
		      mysqli_query($s, $sql_u);
	      }
		      
    ?>
  </head>
  <body>
    <div class="left-side"></div>
    <div class="container">
      <div class="header">
        <h1>Simple Service</h1>
      </div>
      <div class="content">
        <div class="view-w-cover">
          <div class="view-w-header">
	    <span id="view-w-title"><?php echo $r['title']; ?></span>
	    <span id="view-w-time">일시 : <?php echo $r['time_c']; ?></span>
	    <span id="view-w-view">조회수 : <?php echo $r['view_c']; ?></span>
          </div>
          <div class="view-w-body">
	    <span id="view-w-contents"><pre><?php echo $r['contents']; ?></pre></span>
          </div>
          <div class="btn"><&nbsp;<a href="#" onclick="history.go(-1);return false;">이전</a></div>
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
              <a id="lgn-out" href="./logout.php">로그아웃</a>
            </fieldset>
          </div>
          <nav class="my_menu">
            <fieldset>
              <legend>메뉴</legend>
              <?php if($_SESSION['id'] === 'admin') { ?>
              <div class="admin_menu">
                <a href="./admin/">어드민 페이지</a>
              </div>
              <div class="admin_menu">
                <a href="./write.php">글쓰기</a>
              </div>
              <?php } else { ?>
              <div class="guest_menu">
                <a href="./write.php">글쓰기</a>
              </div>
              <?php } ?>
            </fieldset>
          </nav>
        </div>
      </aside>
    </div>
  </body>
</html>
<?php mysqli_close($s); } ?>
