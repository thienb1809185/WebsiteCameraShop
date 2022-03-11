        <div id="footer">
            <div class="container-fluid">
                <div class="row footer-row">
                    <div class="col-md-4 footer-gioithieu">
                        <h4 class="footer-title">GIỚI THIỆU</h4>
                        <p style="text-align: justify;">
                            Chào mừng bạn đến với ngôi nhà Camera Shop!
                            Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn
                            nghệ thuật,
                            và đang không ngừng phát triển lớn mạnh.
                        </p>

                    </div>
                    <div class="col-md-4 footer-diachi">
                        <h4 class="footer-title">ĐỊA CHỈ</h4>

                        <p>
                            <i class="fas fa-map-marker-alt footer-icon"></i>
                            O9-Đường 44-Phường Phú Thứ-Quận Cái Răng
                        </p>
                        <p>
                            <i class="fas fa-phone footer-icon"></i>
                            03838385251
                        </p>

                        <p>
                            <i class="far fa-envelope-open footer-icon"></i>
                            thienb1809185@student.ctu.edu.vn
                        </p>

                    </div>
                    <div class="col-md-4 footer-mangxahoi">
                        <h4 class="footer-title">MẠNG XÃ HỘI</h4>
                        <a href="https://www.facebook.com/"><i
                                class="fab fa-facebook-square footer-mangxahoi-icon"></i></a>
                        <a href=""><i class="fab fa-instagram footer-mangxahoi-icon"></i></a>
                        <a href=""><i class="fab fa-twitter footer-mangxahoi-icon"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
// if(!isset($_SESSION['cart'])) {
// 	$_SESSION['cart'] = [];
// }
// $count=0;
// // var_dump($_SESSION['cart']);
// foreach($_SESSION['cart'] as $item) {
// 	$count += $item['SoLuongHang'];
// }
?>
<script type="text/javascript">
	function addCart(productId, num) {
		$.post('api/ajax_request.php', {
			'action': 'cart',
			'id': productId,
			'num': num
		}, function(data) {
			location.reload()
		})
	}
</script>
<!-- Cart start -->
<!-- <span class="cart_icon_2">
	<span class="cart_count_2"><?=$count?></span>
	<a href="giohang.php"><img src="https://gokisoft.com/img/cart.png"></a>
</span> -->
<!-- Cart stop -->
</body>

</html>