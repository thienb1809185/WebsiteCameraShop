<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteCategory();
			break;
	}
}

function deleteCategory() {
	$id = getPost('id');
    
	$sql = "select count(*) as total from hanghoa where MaLoaiHang = '$id' and deleted = 0";
	$data = executeResult($sql, true);
	// var_dump($data);
	$total = $data['total'];
	if($total > 0) {
		echo 'Danh mục đang chứa sản phẩm, không được xoá!!!';
		die();
	}

	$sql = "delete from loaihanghoa where MaLoaiHang = '$id'";
	execute($sql);
}