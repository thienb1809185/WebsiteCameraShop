<?php
	$title = 'Thêm/Sửa Tài Khoản Người Dùng';
	$baseUrl = '../';
	require_once('../layouts/header.php');
    $id = $msg = $fullname = $email =$phone = $address = $chucvu ='';
    require_once('form_save.php');

    $id = getGet('id');

    if($id != '') {
		$sql = "select * from nhanvien where MSNV = '$id'";
		$userItem = executeResult($sql, true);
		if($userItem != null) {
			$fullname = $userItem['HoTenNV'];
			$email = $userItem['MSNV'];
			$phone = $userItem['SoDienThoai'];
			$address = $userItem['DiaChi'];
			$chucvu = $userItem['ChucVu'];
		} else {
			$id = '';
		}
	} else {
		$id = '';
	}
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>Thêm/Sửa Tài Khoản Người Dùng</h3>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h5 style="color: red;"><?=$msg?></h5>
			</div>
			<div class="panel-body">
				<form method="post" onsubmit="return validateForm();">
					<div class="form-group">
					  <label for="hoten">Họ & Tên:</label>
					  <input required="true" type="text" class="form-control" id="hoten" name="fullname" value="<?=$fullname?>">
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					<div class="form-group">
					  <label for="phone">Số Điện Thoại:</label>
					  <input required="true" type="tel" class="form-control" id="phone" name="phone" value="<?=$phone?>">
					</div>
					<div class="form-group">
					  <label for="address">Địa Chỉ:</label>
					  <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$address?>">
					</div>
                    <div class="form-group">
					  <label for="chucvu">Chức Vụ:</label>
					  <input required="true" type="text" class="form-control" id="chucvu" name="chucvu" value="<?=$chucvu?>">
					</div>
					<div class="form-group">
					  <label for="pwd">Mật Khẩu:</label>
					  <input <?=($id !=''?'':'required="true"')?> type="password" class="form-control" id="pwd" name="password" minlength="6">
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
					  <input <?=($id != ''?'':'required="true"')?> type="password" class="form-control" id="confirmation_pwd" minlength="6">
					</div>
					<button class="btn btn-success">Đăng Ký</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function validateForm() {
		$pwd = $('#pwd').val();
		$confirmPwd = $('#confirmation_pwd').val();
		if($pwd != $confirmPwd) {
			alert("Mật khẩu không khớp, vui lòng kiểm tra lại")
			return false
		}
		return true
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>
