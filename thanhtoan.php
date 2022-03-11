<?php 
require_once('layouts/header.php');
?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px; height: 550px;">
	<form method="post" onsubmit="return completeCheckout();">
	<div class="row">
		<div class="col-md-6">
			<div style="text-align: center;">
				<h3>Vui Lòng Nhập Thông Tin</h3>
			</div>
			<div class="form-group" style = "margin: 15px 0px">
				<label for="usr">Nhập Họ và Tên: </label><br>
				<input required="true" type="text" class="form-control" id="usr" name="fullname" placeholder="Nguyễn Thanh Thiện">
			</div>
			<div class="form-group" style = "margin: 15px 0px">
				<label for="email">Nhập email: </label><br>
				<input required="true" type="email" class="form-control" id="email" name="email" placeholder="thien@gmail.com">
			</div>
			<div class="form-group" style = "margin: 15px 0px">
				<label for="phone">Nhập Số Điện Thoại: </label><br>
				<input required="true" type="tel" class="form-control" id="phone" name="phone" placeholder="038383xxxx">
			</div>
			<div class="form-group" style = "margin: 15px 0px">
				<label for="company">Nhập Tên Công Ty: </label><br>
				<input required="true" type="text" class="form-control" id="company" name="company" placeholder="Công Ty Ranger">
			</div>
			<div class="form-group" style = "margin: 15px 0px">
				<label for="address">Nhập Địa Chỉ giao Hàng: </label><br>
				<input required="true" type="text" class="form-control" id="address" name="address" placeholder="KTX B, Đại Học Cần Thơ, Đường 3/2, Phường Ninh Kiều, Quận Cái Răng, TP Cần Thơ">
			</div>
			
		</div>
		<div class="col-md-6">
			<table class="table table-bordered">
			<tr>
				<th>STT</th>
				<th>Tiêu Đề</th>
				<th>Giá</th>
				<th>Số Lượng</th>
				<th>Tổng Giá</th>
			</tr>
<?php
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];
}
$index = 0;
foreach($_SESSION['cart'] as $item) {
	echo '<tr>
			<td>'.(++$index).'</td>
			<td>'.$item['TenHH'].'</td>
			<td>'.number_format($item['Gia']).' VND</td>
			<td>
				'.$item['SoLuongHang'].'
			</td>
			<td>'.number_format($item['Gia'] * $item['SoLuongHang']).' VND</td>
		</tr>';
}
?>
		</table>
		<a href="checkout.php"><button class="btn btn-success" style="border-radius: 0px; font-size: 26px; width: 100%;">THANH TOÁN</button></a>
		</div>
	</div>
</form>
</div>

<script type="text/javascript">
	function completeCheckout() {
		$.post('api/ajax_request.php', {
			'action': 'checkout',
			'HoTenKH': $('[name=fullname]').val(),
			'email': $('[name=email]').val(),
			'SoDienThoai': $('[name=phone]').val(),
			'TenCongTy': $('[name=company]').val(),
			'DiaChi': $('[name=address]').val(),
			
		}, function() {
			window.open('checkout.php', '_self');

			}
		)

		return false;
	}
</script>
<?php
require_once('layouts/footer.php');
?>