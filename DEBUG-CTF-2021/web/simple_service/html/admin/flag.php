<?php
session_start();
if ($_SESSION['id'] !== 'admin') {
	echo "<script>alert('YOU ARE NOT ADMIN');location.href='../';</script>";
} else {
	$a='debugCTF{h0w_m@ny_vu1n_1n_thi3_s3rv1ce}';
	echo 'FLAG is here!!';
}
?>
