<?php
if(!empty($_POST)) {
	$fullname = getPost('fullname');
	$id = getPost('id');
	$email = getPost('email');
	$phone = getPost('phone');
	$address = getPost('address');
    $chucvu = getPost('chucvu');
	$password = getPost('password');
	if($password != '') {
		$password = getSecurityMD5($password);
	}

    $created_at = $updated_at = date("Y-m-d H:i:s");

    if($id != '') {
		//update
		$sql = "select * from nhanvien where MSNV <> '$id' and MSNV = '$email'";
		$userItem = executeResult($sql, true);
        if($userItem != null) {
			$msg = 'Email này đã tồn tại trong tài khoản khác, vui lòng kiểm tra lại!!!';
        } else {
			if($password != '') {
				$sql = "update nhanvien set HoTenNV = '$fullname', MSNV = '$email', SoDienThoai = '$phone', DiaChi = '$address',ChucVu = '$chucvu', password = '$password', updated_at = '$updated_at' where MSNV = '$id' ";
			} else {
				$sql = "update nhanvien set HoTenNV = '$fullname', MSNV = '$email', SoDienThoai = '$phone', DiaChi = '$address', ChucVu ='$chucvu' , updated_at = '$updated_at' where MSNV = '$id'";
			}
			execute($sql);
			header('Location: index.php');
			die();
		}
    } else {
		$sql = "select * from nhanvien where MSNV = '$email'";
		$userItem = executeResult($sql, true);
		//insert
		if($userItem == null) {
			//insert
			$sql = "insert into nhanvien( MSNV, password, HoTenNV, ChucVu, SoDienThoai, DiaChi,   created_at, updated_at, deleted) values ('$email','$password','$fullname', '$chucvu', '$phone', '$address',   '$created_at', '$updated_at', 0)";
			execute($sql);
			header('Location: index.php');
			die();
		} else {
			//Tai khoan da ton tai -> failed
			$msg = 'Email đã được đăng ký, vui lòng kiểm tra lại!!!';
		}
	}
}     