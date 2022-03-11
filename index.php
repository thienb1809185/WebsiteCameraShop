<?php 
require_once('layouts/header.php');

$sql = "select hanghoa.*, loaihanghoa.TenLoaiHang as category_name from hanghoa left join loaihanghoa on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang order by hanghoa.updated_at desc limit 0,8";
$lastestItems = executeResult($sql);
?>

        <div id="slider">
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/photos/slider/slider1.jpeg" class="d-block w-100 slider-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/photos/slider/slider2.jpg" class="d-block w-100 slider-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/photos/slider/slider3.jpg" class="d-block w-100 slider-img" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

<div class="container">
	<h3 style="text-align: center; margin-top: 35px; margin-bottom: 20px;">SẢN PHẨM MỚI NHẤT</h3>
	<div class="row">
	<?php
		foreach($lastestItems as $item) {
			echo '<div class="col-md-3 col-6 product-item">
					<a href="chitietsanpham.php?id='.$item['MSHH'].'"><img src="'.$item['HinhHangHoa'].'" style="width: 100%; height: 220px;"></a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="chitietsanpham.php?id='.$item['MSHH'].'"><p style="font-weight: bold; text-decoration: none;">'.$item['TenHH'].'</p></a>
					<p style="color: red; font-weight: bold;">'.number_format($item['Gia']).' VND</p>
					<p><button class="btn btn-success" onclick="addCart('.$item['MSHH'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
				</div>';
		}
	?>
	</div>
</div>


<?php
    $count = 0;
    foreach($menuItems as $item) {
	    $sql = "select hanghoa.*, loaihanghoa.TenLoaiHang as category_name from hanghoa left join loaihanghoa on hanghoa.MaLoaiHang = loaihanghoa.MaLoaiHang where hanghoa.MaLoaiHang = '".$item['MaLoaiHang']."' order by hanghoa.updated_at desc limit 0,4";
    	$items = executeResult($sql);
	    if($items == null || count($items) < 4) continue;
?>
<div style="background-color: <?=($count++%2 == 0)?'#f7f9fa':''?>;">
<div class="container">
<h3 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><?=$item['TenLoaiHang']?></h3>
<div class="row" >
<?php
	foreach($items as $pItem) {
		echo '<div class="col-md-3 col-6 product-item">
				<a href="chitietsanpham.php?id='.$pItem['MSHH'].'"><img src="'.$pItem['HinhHangHoa'].'" style="width: 100%; height: 220px;"></a>
				<p style="font-weight: bold;">'.$pItem['category_name'].'</p>
				<a href="chitietsanpham.php?id='.$pItem['MSHH'].'"><p style="font-weight: bold;">'.$pItem['TenHH'].'</p></a>
				<p style="color: red; font-weight: bold;">'.number_format($pItem['Gia']).' VND</p>
				<p><button class="btn btn-success" onclick="addCart('.$pItem['MSHH'].', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
			</div>';
	}
?>
</div>
</div>
</div>
<?php
}
?>

<?php
require_once('layouts/footer.php');
?>