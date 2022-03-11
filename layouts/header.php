<?php
	session_start();
	require_once('utils/utility.php');
	require_once('database/dbhelper.php');

	$sql = "select * from loaihanghoa";
	$menuItems = executeResult($sql);


    if(!isset($_SESSION['cart'])) { 
        $_SESSION['cart'] = [];
    }
    $count=0;
    foreach($_SESSION['cart'] as $item) {
        $count += $item['SoLuongHang'];
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="icon" type="image/png" href="https://www.pngitem.com/pimgs/m/6-67022_dslr-camera-vector-icon-camera-vector-icon-png.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">

   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="source/bootstrap/bootstrap.min.css">
    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script src="source/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="source/bootstrap/popper.min.js"></script>
    <script src="source/bootstrap/bootstrap.min.js"></script>

    <style type="text/css">
        #main{
            background-color: rgb(235, 235, 235);
        }
        .product-item{
            background-color: #ffffff;
            padding-bottom: 15px;
            padding-top: 10px;
        }
		.product-item:hover {
			background-color: #eeeeee;
			cursor: pointer;
			margin-bottom: 10px;
		}

        .cart-btn{
            position: relative;
        }
        .cart-btn .cart_icon .cart_count {
            position: absolute;
			background-color: red;
			color: white;
			font-size: 16px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 10px;
			padding-right: 10px;
			font-weight: bold;
			border-radius: 12px;
			bottom: 0px;
			right: 2px;
		}

        .cart_icon_2 {
			position: fixed;
			z-index: 999999;
			right: 0px;
			top: 45%;
		}

		.cart_icon_2 img {
			width: 45px;
		}

		.cart_icon_2 .cart_count_2 {
			background-color: red;
			color: white;
			font-size: 16px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 10px;
			padding-right: 10px;
			font-weight: bold;
			border-radius: 12px;
			position: fixed;
			right: 40px;
		}

	</style>

	
</head>

<body>
    <div id="main">
        <div id="header-logo">
            <span class="header-logo-name" style="color: #ccc; font-weight: bolder; font-size: 30px;">RANGER</span>
            <span style="color: #ccc; font-size: 25px;">Camera Shop</span>

        </div>
        <div id="header-nav">
            <ul id="nav">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href=""></a></li>
                <li><a href="sanpham.php">SẢN PHẨM</a></li>
                <li>
                    <a href="sanpham.php">DANH MỤC SẢN PHẨM <i class="fas fa-sort-down nav-arrow-down"></i></a>

                    <ul class="subnav" style="width: 100%;">
                        <?php
	                    	foreach($menuItems as $item) {
	  		                    echo '<li>
				                        <a href="sanpham.php?id='.$item['MaLoaiHang'].'">'.$item['TenLoaiHang'].'</a>
				                     </li>';
	  	                    }
                        ?>
                    </ul>
                </li>
                <li><a href="sanpham.php?id=PHUKIEN">PHỤ KIỆN KHÁC</a></li>
                <li><a href="lienhe.php">LIÊN HỆ</a></li>
            </ul>
            <div>
                <div class="login-btn" >
                    <a href="admin/"><i class="login-icon fas fa-user-circle"></i> </a>
                </div>
                <div class="cart-btn ">
                    <span class="cart_icon">
                        <span class="cart_count"><?=$count?></span>
                    <a href="giohang.php"><i class="cart-icon fas fa-shopping-cart"></i> </a>
                    </span>
                </div>
                <div class="search-btn">
                    <i class="search-icon fas fa-search "></i>
                </div>
            </div>

        </div>






