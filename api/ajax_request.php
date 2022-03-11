<?php
session_start();
require_once('../utils/utility.php');
require_once('../database/dbhelper.php');


$action = getPost('action');

switch ($action) {
	case 'cart':
		addToCart();
		break;
	case 'update_cart':
		updateCart();
		break;
	case 'checkout':
		checkout();
		break;
}

function checkout() {
	if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
		return;
	}


	$HoTenKH = getPost("HoTenKH");
	$email = getPost("email");
	$SoDienThoai = getPost("SoDienThoai");
	$TenCongTy = getPost("TenCongTy"); 
	$DiaChi = getPost("DiaChi");

	// Create connection
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');
	// Check connection
	$sql = "insert into khachhang(email,HoTenKH, TenCongTy, SoDienThoai, deleted) values ('$email', '$HoTenKH', '$TenCongTy', '$SoDienThoai', 0)";
	// execute($sql); 
	$last_id=null;
	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
	  }
	

	$sql = "insert into diachikh(DiaChi, MSKH) values ('$DiaChi', $last_id)";
	execute($sql);	


	$orderDate = date('Y-m-d H:i:s');

	$totalMoney = 0;
	foreach($_SESSION['cart'] as $item) {
		$totalMoney += $item['Gia'] * $item['SoLuongHang'];
	}

	$orderId = null;
	$sql = "insert into dathang(MSKH, MSNV, NgayDH, NgayGH, TrangThaiDH, TongTien) values ( $last_id, '', '$orderDate', '', 0, $totalMoney)";
	if (mysqli_query($conn, $sql)) {
		$orderId = mysqli_insert_id($conn);
	}

	mysqli_close($conn);
	
	foreach($_SESSION['cart'] as $item) {
		$product_id = $item['MSHH'];
		$price = $item['Gia'];
		$num = $item['SoLuongHang'];
		$giagiam = $price*0.1;
		$totalMoney = $price * $num - $giagiam;

		$sql = "insert into chitietdathang(SoDonDH, MSHH, SoLuong, GiaDatHang, GiamGia, TongTienHH) values ($orderId, $product_id, $num,$price,$giagiam, $totalMoney)";
		execute($sql);
	}

	unset($_SESSION['cart']);
}

function updateCart() {
	$id = getPost('id');
	$num = getPost('num');

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}

	for($i=0;$i<count($_SESSION['cart']);$i++) {
		if($_SESSION['cart'][$i]['MSHH'] == $id) {
			$_SESSION['cart'][$i]['SoLuongHang'] = $num;
			if($num <= 0) {
				array_splice($_SESSION['cart'], $i, 1);
			}
			break;
		}
	}
}

function addToCart() {
	$id = getPost('id');
	$num = getPost('num');

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}
	// var_dump($_SESSION['cart']);
	$isFind = false;
	for($i=0;$i<count($_SESSION['cart']);$i++) {
		if($_SESSION['cart'][$i]['id'] == $id) {
			$_SESSION['cart'][$i]['num'] += $num;
			$isFind = true;
			break;
		}
	}

	if(!$isFind) {
		$sql = "select hanghoa.*, loaihanghoa.TenLoaiHang as category_name from hanghoa left join loaihanghoa on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang where hanghoa.MSHH = $id";
		$product = executeResult($sql, true);
		$product['SoLuongHang'] = $num;
		$_SESSION['cart'][] = $product;
	}
}