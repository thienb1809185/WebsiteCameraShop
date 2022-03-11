<?php
function fixSqlInject($sql) {
	$sql = str_replace('\\', '\\\\', $sql);
	$sql = str_replace('\'', '\\\'', $sql);
	return $sql;
}

function getGet($key) {
	$value = '';
	if(isset($_GET[$key])) {
		$value = $_GET[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getPost($key) {
	$value = '';
	if(isset($_POST[$key])) {
		$value = $_POST[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getRequest($key) {
	$value = '';
	if(isset($_REQUEST[$key])) {
		$value = $_REQUEST[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getCookie($key) {
	$value = '';
	if(isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getSecurityMD5($pwd) {
	return md5(md5($pwd).PRIVATE_KEY);
}

function getUserToken() {
	if(isset($_SESSION['nhanvien'])) {
		return $_SESSION['nhanvien'];
	}
	$token = getCookie('token');
	$sql = "select * from tokens where token = '$token'";
	$item = executeResult($sql, true);
	if($item != null) {
		$userId = $item['MSNV'];
		$sql = "select * from nhanvien where MSNV = '$userId' and deleted = 0";
		$item = executeResult($sql, true);
		if($item != null) {
			$_SESSION['nhanvien'] = $item;
			return $item;
		}
	}

	return null;
}

function moveFile($key, $rootPath = "../../") {
	if(!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name'] == '') {
		return '';
	}

	$pathTemp = $_FILES[$key]["tmp_name"];

	$filename = $_FILES[$key]['name'];
	//filename -> remove special character, ..., ...

	$newPath="assets/photos/".$filename;

	move_uploaded_file($pathTemp, $rootPath.$newPath);

	return $newPath;
}

function fixUrl($thumbnail, $rootPath = "../../") {
	if(stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
	} else {
		$thumbnail = $rootPath.$thumbnail;
	}

	return $thumbnail;
}


?>