<?php

$fullname = $email = $msg =$phone = $address = '';

if(!empty($_POST)) {
	$fullname = getPost('fullname');
	$email = getPost('email');
	$pwd = getPost('password');
    $phone = getPost('phone');
    $address = getPost('address');

	//validate
	if(empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) < 6 || empty($phone) || empty($address)) {
	} else {
		//Validate thanh cong
		$userExist = executeResult("select * from nhanvien where MSNV = '$email'", true);
		if($userExist != null) {
			$msg = 'Email đã được đăng ký trên hệ thống';
		} else {
			$created_at = $updated_at = date('Y-m-d H:i:s');
			//Su dung ma hoa 1 chieu -> md5 
			$pwd = getSecurityMD5($pwd);

			$sql = "insert into nhanvien (MSNV, password, HoTenNV, ChucVu,SoDienThoai ,DiaChi,created_at, updated_at, deleted) values ('$email', '$pwd','$fullname','user','$phone','$address', '$created_at', '$updated_at', 0)";
			execute($sql);
			header('Location: login.php');
			die();
		}
	}
}