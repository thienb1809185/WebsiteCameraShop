<?php
    $title = 'Quản Lý Người Dùng';
	$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select * from nhanvien where deleted = 0";
	$data = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>Quản Lý Người Dùng</h3>

		<a href="editor.php"><button class="btn btn-success">Thêm Tài Khoản</button></a>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & Tên</th>
					<th>Email</th>
					<th>SĐT</th>
					<th>Địa Chỉ</th>
					<th>Chức Vụ</th>
					<th style="width: 50px"></th>
					<th style="width: 50px"></th>
				</tr>
			</thead>
			<tbody>
<?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
				<th>'.(++$index).'</th>
				<td>'.$item['HoTenNV'].'</td>
				<td>'.$item['MSNV'].'</td>
				<td>'.$item['SoDienThoai'].'</td>
				<td>'.$item['DiaChi'].'</td>
				<td>'.$item['ChucVu'].'</td>
				<td style="width: 50px">
					<a href="editor.php?id='.$item['MSNV'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td style="width: 50px">';
					if($user['MSNV'] != $item['MSNV'] && $item['ChucVu'] != 'admin'  ) {
						echo '<button onclick="deleteUser(\''.$item['MSNV'].'\')" class="btn btn-danger">Xoá</button>';
					}
		echo '
				</td>
			</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteUser(id) {
		option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>


<?php
    require_once('../layouts/footer.php');
?>