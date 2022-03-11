<?php
if(!empty($_POST)) {
	$id = getPost('id');
	$TenHH = getPost('TenHH');
	
	$QuyCach = getPost('QuyCach');
	$Gia = getPost('Gia');
    $SoLuongHang = getPost('SoLuongHang');

	$HinhHangHoa = moveFile('HinhHangHoa');

	
	$MaLoaiHang = getPost('MaLoaiHang');
	$created_at = $updated_at = date('Y-m-d H:s:i');

	if($id > 0) {
		//update
		if($HinhHangHoa != '') {
			$sql = "update hanghoa set HinhHangHoa = '$HinhHangHoa', TenHH = '$TenHH', Gia = $Gia, QuyCach = '$QuyCach', SoLuongHang = $SoLuongHang, updated_at = '$updated_at', MaLoaiHang = '$MaLoaiHang' where MSHH = $id";
		} else {
			$sql = "update hanghoa set TenHH = '$TenHH', Gia = $Gia,  QuyCach= '$QuyCach',  SoLuongHang= $SoLuongHang, updated_at = '$updated_at', MaLoaiHang = '$MaLoaiHang' where MSHH = $id";
		}
		
		execute($sql);

		header('Location: index.php');
		die();
	} else {
		//insert
		$sql = "insert into hanghoa(TenHH, HinhHangHoa, QuyCach, Gia, SoLuongHang, updated_at, created_at, deleted, MaLoaiHang) values ('$TenHH', '$HinhHangHoa', '$QuyCach', $Gia , $SoLuongHang, '$updated_at', '$created_at', 0, '$MaLoaiHang')";
		execute($sql);

		header('Location: index.php');
		die();
	}
}