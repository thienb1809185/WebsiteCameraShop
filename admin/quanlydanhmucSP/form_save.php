<?php
if(!empty($_POST)) {
    $msg ='';
	$MaLoaiHang = getPost("MaLoaiHang");
    $id = getPost("id");
	$TenLoaiHang = getPost("TenLoaiHang");

	if($id != '') {
		//update
		$sql = "update Loaihanghoa set TenLoaiHang = '$TenLoaiHang' where MaLoaiHang = '$id'";
		execute($sql);
	} else {
		//insert
        $sql = "select * from loaihanghoa where MaLoaiHang = '$MaLoaiHang'";
		$Item = executeResult($sql, true);
		//insert
		if($Item == null) {
			//insert
			$sql = "insert into loaihanghoa (MaLoaiHang, TenLoaiHang) values ('$MaLoaiHang','$TenLoaiHang')";
			execute($sql);
		} else {
			//Tai khoan da ton tai -> failed
			$msg = 'Loại hàng đã có, vui lòng kiểm tra lại!!!';
            echo '<script type="text/javascript"> alert("'.$msg.'"); </script>';
		}
	}
}