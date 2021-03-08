<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css?after">
    <title>Simple Service</title>
  </head>
  <body>
    <div class="left-side"></div>
    <div class="container">
      <div class="header">
        <h1>Simple Service</h1>
      </div>
      <?php
        session_start();
	if ($_SESSION['id']) {
      ?>
      <div class="content">
        <div class="w_list">
          <table class="table table-striped">
            <thead><tr><td>idx</td><td>title</td><td>time</td><td>view</td></tr></thead>
            <tbody>
              <?php
	        include "./config.php";
	        $s = db_connect();
	        $ck = mysqli_real_escape_string($s, $_COOKIE['PHPSESSID']);
	        $sql = "SELECT * FROM board WHERE writer = 'ADMIN' or writer = '${ck}' ORDER BY idx ASC";
	        $index = 1;
	        $result = mysqli_query($s, $sql);
	        while ($r = mysqli_fetch_array($result)) {
		        $title = htmlentities($r['title']);
		        if ($r['writer'] === 'ADMIN') { 
			        echo "<tr onclick=\"location.href="."'./view.php?idx=".$r['idx']."&wt=ad';\">";
		        } else {
			        echo "<tr onclick=\"location.href="."'./view.php?idx=".$r['idx']."';\">";
		        }
		        echo "<td>${index}</td>";
		        echo "<td>${title}</td>";
		        echo "<td>${r['time_c']}</td>";
		        echo "<td>${r['view_c']}</td>";
		        echo "</tr>";
		        $index++;
	        }
	        mysqli_close($s);
	      ?>
            </tbody>
          </table>
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
      <?php
        } else {
      ?>
      <div class="content">
        <form class="lgn-fm" action="./login.php" method="POST">
          <fieldset class="login_form">
            <div class="id_area">
              <div class="input_box">
                <input type="text" name="id" placeholder="아이디" maxlength="10" class="int" required><br>
              </div>
            </div>
            <div class="pw_area">
              <div class="input_box">
                <input type="password" name="pw" placeholder="비밀번호" maxlength="30" class="int" required><br> 
              </div>
            </div>        
            <input type="submit" title="로그인" alt="로그인" value="로그인" class="btn lgn-btn">
          </fieldset>
        </form>
	<div id="lgn-info">
	  <h3>Login with following account</h3>
	  <p id="admin-info">ID : admin<br>PW : *****</p>
          <p id="guest-info">ID : guest<br>PW : guest</p>
        </div>
      </div>
    </div>
    <div class="right-side"></div>
    <?php } ?>
  </body>
</html>
