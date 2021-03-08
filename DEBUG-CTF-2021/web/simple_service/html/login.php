<?php
if ($_POST['id'] && $_POST['pw']) {
	if ($_POST['id'] == 'admin') {
		echo "<script>alert('YOU ARE NOT ADMIN');location.href='./';</script>";
	} else {
		ini_set("session.cache_expire", 3600);
		ini_set("session.gc_maxlifetime", 1200);
		session_start();

		include "./config.php";
		$s = db_connect();
		$user_id = mysqli_real_escape_string($s, $_POST['id']);
		if (preg_match("/\(\)|id|pw|union|;|sleep|benchmark|+|-|*|\/|#/i", $_POST['pw'])) {
			echo "<script>alert('NO HACK');location.href='./';</script>";
		}
		$user_pw = $_POST['pw'];
		$sql = "SELECT id FROM users WHERE id='${user_id}' and password='${user_pw}' limit 0, 1";
		$result = mysqli_fetch_array(mysqli_query($s, $sql));
		if ($result['id']) {
			$_SESSION['id'] = $result['id'];
		} else {
			echo "<script>alert('아이디 또는 비밀번호를 확인해주세요.');location.href='./';</script>";
		}

		if (!is_dir("./admin/tmp/{$_COOKIE['PHPSESSID']}")) {
			umask(0);
			if(!mkdir("./admin/tmp/{$_COOKIE['PHPSESSID']}", 0766, false)) {
				print_r(error_get_last());
				return;
			}
		}
		$_SESSION['m-w-id'] = 0;

		echo "<script>location.href='./';</script>";
	}
}
else {
	echo "<script>location.href='./';</script>";
}
?>
