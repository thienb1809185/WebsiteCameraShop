<?php
	$title = 'Thông Tin Chi Tiết Đơn Hàng';
	$baseUrl = '../';
	require_once('../layouts/header.php');

    $SoDonDH = getGet('id');

    $sql = "select chitietdathang.*, hanghoa.TenHH, hanghoa.HinhHangHoa from chitietdathang left join hanghoa on chitietdathang.MSHH = hanghoa.MSHH where chitietdathang.SoDonDH = $SoDonDH";
	$data = executeResult($sql);


    $sql = "select * from (dathang  left join khachhang on dathang.MSKH = khachhang.MSKH) left join diachikh on khachhang.MSKH = diachikh.MSKH  where SoDonDH = $SoDonDH";
	$orderItem = executeResult($sql, true);

?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<h3>Chi Tiết Đơn Hàng</h3>
	</div>
	<div class="col-md-8 table-responsive">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Hình Sản Phẩm</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Tổng Giá</th>
				</tr>
			</thead>
			<tbody>

<?php
	$index = 0;
	foreach($data as $item) {
        $total = $item['GiaDatHang'] * $item['SoLuong'];
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><img src="'.fixUrl($item['HinhHangHoa']).'" style="height: 120px"/></td>
					<td>'.$item['TenHH'].'</td>
					<td>'.$item['GiaDatHang'].'</td>
					<td>'.$item['SoLuong'].'</td>
					<td>'.$total.'</td>
				</tr>';
	}
?>

                <tr>    
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<th>Tổng Tiền</th>
					<th><?=$orderItem['TongTien']?></th>
				</tr>
			</tbody>
		</table>
	</div>
    <div class="col-md-4">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<tr>
				<th>Họ & Tên: </th>
				<td><?=$orderItem['HoTenKH']?></td>
			</tr>
			<tr>
				<th>Email: </th>
				<td><?=$orderItem['email']?></td>
			</tr>
			<tr>
				<th>Địa Chỉ: </th>
				<td><?=$orderItem['DiaChi']?></td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td><?=$orderItem['SoDienThoai']?></td>
			</tr>
		</table>
	</div>
</div>
<?php
	require_once('../layouts/footer.php');
?>