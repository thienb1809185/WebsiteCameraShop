<?php
    $title = 'Quản Lý Đơn Hàng';
	$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select dathang.*, khachhang.*, nhanvien.HoTenNV, diachikh.* from ((dathang LEFT JOIN khachhang ON dathang.MSKH = khachhang.MSKH ) LEFT JOIN nhanvien ON dathang.MSNV = nhanvien.MSNV) left JOIN diachikh ON khachhang.MSKH = diachikh.MSKH order by TrangThaiDH asc, NgayDH desc";
    
	$data = executeResult($sql);

?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Đơn Hàng</h3>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & Tên</th>
					<th>SĐT</th>
					<th>Email</th>
					<th>Địa Chỉ</th>
					<th>Nhân Viên</th>
					<th>Tổng Tiền</th>
					<th>Ngày Tạo</th>
                    <th>Ngày Giao</th>
					<th style="width: 120px"></th>
				</tr>
			</thead>
			<tbody>

<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td><a href="detail.php?id='.$item['SoDonDH'].'">'.$item['HoTenKH'].'</a></td>
					<td><a href="detail.php?id='.$item['SoDonDH'].'">'.$item['SoDienThoai'].'</a></td>
					<td><a href="detail.php?id='.$item['SoDonDH'].'">'.$item['email'].'</a></td>
					<td>'.$item['DiaChi'].'</td>
					<td>'.$item['MSNV'].'</td>
					<td>'.$item['TongTien'].'</td>
					<td>'.$item['NgayDH'].'</td>
                    <td>'.$item['NgayGH'].'</td>
					<td style="width: 50px">';
		if($item['TrangThaiDH'] == 0) {
			echo '<button onclick="changeStatus('.$item['SoDonDH'].', 1)" class="btn btn-sm btn-success" style="margin-bottom: 10px;">Đã duyệt</button>
			<button onclick="changeStatus('.$item['SoDonDH'].', 2)" class="btn btn-sm btn-danger">Hủy đơn</button>';
		} else if($item['TrangThaiDH'] == 1) {
			echo '<label class="badge badge-success">Đã duyệt</label>';
		} else {
			echo '<label class="badge badge-danger">Hủy đơn</label>';
		}
		echo '</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>    

<script type="text/javascript">
	function changeStatus(id, status) {
        option = confirm('Bạn có chắc chắn muốn duyệt đơn này không!!!')
		if(!option) return;
		$.post('form_api.php', {
			'id': id,
			'status': status,
			'action': 'update_status'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
    require_once('../layouts/footer.php');
?>


