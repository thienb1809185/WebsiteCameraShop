<?php
    $title = 'Quản Lý Danh Mục Sản Phẩm';
	$baseUrl = '../';
    require_once('../layouts/header.php');

	require_once('form_save.php');
	$msg = $MaLoaiHang = $TenLoaiHang = '';
	if(isset($_GET['id'])) {
		$id = getGet('id');
		$sql = "select * from loaihanghoa where MaLoaiHang = '$id'";
		$data = executeResult($sql, true);

		if($data != null) {
			$MaLoaiHang = $data['MaLoaiHang'];
            $TenLoaiHang = $data['TenLoaiHang'];

		}

	}
    
	$sql = "select * from loaihanghoa";
	$data = executeResult($sql);

?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3>Quản Lý Danh Mục Sản Phẩm</h3>
    
	</div>
	<div class="col-md-4">
		<form method="post" action="index.php" onsubmit="return validateForm();">
			<div class="form-group">
			  <label for="maloai" style="font-weight: bold;">Mã  Danh Mục:</label>
			  <input required="true" type="text" class="form-control" id="maloai" name="MaLoaiHang" value="<?=$MaLoaiHang?>">
              <input type="text" name="id" value="<?=$MaLoaiHang?>" hidden="true">
			</div>
            <div class="form-group">
			  <label for="tenloai" style="font-weight: bold;">Tên Danh Mục:</label>
			  <input required="true" type="text" class="form-control" id="tenloai" name="TenLoaiHang" value="<?=$TenLoaiHang?>">
			</div>

			<button class="btn btn-success">Lưu</button>
		</form>
	</div>
	<div class="col-md-8 table-responsive">
		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
                    <th>Mã Danh Mục</th>
					<th>Tên Danh Mục</th>
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
                    <td>'.$item['MaLoaiHang'].'</td>
					<td>'.$item['TenLoaiHang'].'</td>
					<td style="width: 50px">
						<a href="?id='.$item['MaLoaiHang'].'"><button class="btn btn-warning">Sửa</button></a>
					</td>
					<td style="width: 50px">
						<button onclick="deleteCategory(\''.$item['MaLoaiHang'].'\')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
	}
?>
			</tbody>
		</table>
	</div>
</div>


<script type="text/javascript">
    
	function deleteCategory(id) {
		option = confirm('Bạn có chắc chắn muốn xoá danh mục sản phẩm này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			if(data != null && data != '') {
				alert(data);
				return;
			}
			location.reload()
		})
	}
</script>



<?php
    require_once('../layouts/footer.php');
?>