<style>
	a{color: black;}
	a:hover{color: white}
</style>
	 <nav class="navbar navbar-expand-sm bg-dark">
 		 <a class="navbar-brand" href="Danhsachsanpham.php">
			<i class="fa fa-home" aria-hidden="true"></i>	 
  		</a>
  <ul class="navbar-nav mr-auto">

    <li class="nav-item" active>
      	<a class="nav-link" href="index.php">
			Trang chủ
		</a>
    </li>
	<li class="nav-item" active>
      	<a class="nav-link" href="Danhsachsanpham.php">
			Sản Phẩm
		</a>
    </li>
    <li class="nav-item" active>
      	<a class="nav-link" href="#">
			Khuyến mãi
			</a>
    </li>
    <li class="nav-item" active>
      	<a class="nav-link" href="#">
			Tin Tức
			</a>
    </li>
  </ul>  
	  <ul class="navbar-nav ml-auto">
		<li class="navbar-item">
			<a class="nav-link" href="xemgiohang.php" data-toggle="tooltip" data-placement="top" title="Xem giỏ hàng">
				  <i class="fa fa-add_shopping_cart" aria-hidden="true"><img src="../images/giohang.jpg" class="rounded-circle" height="30px" width="30px" ></i>
			</a>
		</li>
		  <?php
				if(!isset($_SESSION["user"]))
				{
			?>
		<li class="navbar-item">
			<a class="nav-link" data-toggle="modal" data-target="#myModal" href="#">
					Đăng Nhập
			</a>
			<?php include("dangnhap.php") ?>
		</li>
		  <li class="navbar-item">
			<a class="nav-link" href="../DangkyKhachHang/Dangky.php">
					Đăng ký
			</a>
		</li>
		  <?php
				}else
				{
					?>
		  <li class="navbar-item">
			<a class="nav-link" href="#">
					Chào &nbsp;<span class="text-white"><?php echo($_SESSION["user"]); ?></span>
			</a>
		  </li>
		  <li class="navbar-item">
			<a class="nav-link" href="lichsugiaodich.php">
					Lịch sử giao dịch
			</a>
		</li>
		  <li class="navbar-item">
			<a class="nav-link" data-toggle="modal" data-target="#myyModal" href="#">
					Thông tin tài khoản
				<?php include("ThongTinCaNhan.php") ?>
			</a>
		</li>
		  <li class="navbar-item">
			<a class="nav-link" href="logoutprocess.php">
				<i class="fa fa-sign-out" aria-hidden="true" title="Đăng Xuất"></i>	
			</a>
		</li>
		  <?php
				}
			?>
	  </ul>
	</nav>
	 <script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	 </script>
