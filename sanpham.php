<?php 
require_once('layouts/header.php');

$category_id = getGet('id');




if($category_id == null || $category_id == '') {
	$sql = "select hanghoa.*, loaihanghoa.TenLoaihang as category_name from hanghoa left join loaihanghoa on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang order by hanghoa.updated_at desc";
} else {
	$sql = "select hanghoa.*, loaihanghoa.TenLoaiHang as category_name from hanghoa left join loaihanghoa on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang where hanghoa.MaLoaiHang = '$category_id' order by hanghoa.updated_at desc ";
}

$lastestItems = executeResult($sql);
?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <h3 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$category_id?></h3>
    <div class="row">
	<?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item">
					<a href="chitietsanpham.php?id='.$item['MSHH'].'"><img src="'.$item['HinhHangHoa'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="chitietsanpham.php?id='.$item['MSHH'].'"><p style="font-weight: bold;">'.$item['TenHH'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($item['Gia']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['MSHH'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
		}
	?>
	</div>
</div>

<?php
require_once('layouts/footer.php');
?>