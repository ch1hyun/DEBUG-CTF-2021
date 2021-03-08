<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/main.css?after">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
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
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      ?>
      <div class="content">
        <form method="POST">
          <fieldset class="write_form">
            <div class="form-group">
              <input type="text" class="form-control" name="title" id="title" placeholder="제목 (최대 20글자)" maxlength="20" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="contents" id="contents" cols="72" rows="20" placeholder="내용을 입력하세요. (최대 500글자)" maxlength="500" required></textarea>
            </div>
            <button type="submit" class="btn btn-wr">작성</button>
          </fieldset>
        </form>
      </div>
      <?php } else if($_SERVER['REQUEST_METHOD'] === 'POST') {
      		include './config.php';
		$s = db_connect();
		if (isset($_POST['title']) && isset($_POST['contents'])) {
			$title = mysqli_real_escape_string($s, $_POST['title']);
			$contents = mysqli_real_escape_string($s, $_POST['contents']);
			$user_id = mysqli_real_escape_string($s, $_COOKIE['PHPSESSID']);
			$sql = "INSERT INTO board(idx, title, contents, writer) VALUES('".md5($_SESSION['m-w-id'])."', '${title}', '${contents}', '${user_id}')";
			$result = mysqli_query($s, $sql) or die(error(500));
			if ($result) {
				$_SESSION['m-w-id']++;
				echo "<script>location.href='./';</script>";
			}
		}
		echo "<script>alert('Write Fail...');location.href='./write.php';</script>";
      ?>
      <?php
		}
	} else {
		echo "<script>alert('LOGIN FIRST');location.href='./';</script>";
	}
      ?>
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
