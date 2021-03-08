<?php
session_start();

function rmdir_all($delete_path) {
	umask(0);
	$dirs = dir($delete_path);

	while(false !== ($entry = $dirs->read())) {
		if(($entry != '.') && ($entry != '..')) {
			if(is_dir($delete_path.'/'.$entry)) {
				rmdir_all($delete_path.'/'.$entry);
			} else {
				@unlink($delete_path.'/'.$entry);
			}
		}
	}

	$dirs->close();

	@rmdir($delete_path);
}

if ($_SESSION['id']) {
	$delete_path = "./admin/tmp/{$_COOKIE['PHPSESSID']}";
	if (is_dir($delete_path)) {
	rmdir_all($delete_path);
	}

	include './config.php';
	$s = db_connect();
	$ck = mysqli_real_escape_string($s, $_COOKIE['PHPSESSID']);
	$sql = "DELETE FROM board WHERE writer='${ck}'";
	mysqli_query($s, $sql);

	session_destroy();

	echo "<script>location.href='./';</script>";
}
else {
	echo "<script>location.href='./';</script>";
}
?>
