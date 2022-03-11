<?php
$fullname = $email = $msg = '';

if(!empty($_POST)) {
	$email = getPost('email');
	$pwd = getPost('password');
	$pwd = getSecurityMD5($pwd);

	$sql = "select * from nhanvien where MSNV = '$email' and password = '$pwd' and deleted = 0";
	$userExist = executeResult($sql, true);
	if($userExist == null) {
		$msg = 'Đăng nhập không thành công, vui lòng kiểm tra email hoặc mật khẩu!!!';
	} else {
		//login thanh cong
		$token = getSecurityMD5($userExist['MSNV'].time());
		setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
		$created_at = date('Y-m-d H:i:s');

		$_SESSION['nhanvien'] = $userExist;

		$userId = $userExist['MSNV'];
		$sql = "insert into tokens (MSNV, token, created_at) values ('$userId', '$token', '$created_at')";
		execute($sql);

		header('Location: ../');
		die();
	}
}