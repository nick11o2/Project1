<style>
	a:hover{color: white; text-decoration: none}
</style>
<script>
	
$(".dropdown-button").dropdown();
        
</script>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#modal2" style="background-color: #514439 !important; color: white" class=" modal-trigger">Thông tin cá nhân</a></li>
  <li><a href="lichsugiaodich.php" style="background-color: #514439 !important; color: white">Lịch sử giao dịch</a></li>
  <li><a href="doimatkhau.php" style="background-color: #514439 !important; color: white">Đổi mật khẩu</a></li>
  <li><a href="logoutprocess.php" style="background-color: #514439 !important; color: white">Đăng Xuất</a></li>
</ul>
<nav style="background-color: #514439 !important;" class="z-depth-3">
	<div class="nav-wrapper">
      <a href="index.php" class="brand-logo">
      		<i class="fa fa-home" aria-hidden="true"></i>
      </a>
		<a href="#" class="brand-logo center">
     		 (☞ﾟ∀ﾟ)☞
      </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
		<li><a href="xemgiohang.php"><i class="small material-icons">shopping_cart</i></a></li>
        <li><a href="Danhsachsanpham.php">Danh Sách Sản Phẩm</a></li>
		<?php include "navbutton.php" ?>
		
	  </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="Danhsachsanpham.php">Sản Phẩm</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
</nav>
<div id="dangnhap" class="modal modal-fixed-footer" style="z-index: 99 !important">
    <div class="modal-content">
      <h4 class="center-align">Đăng Nhập</h4>
		 <blockquote>
       		Vui lòng nhập tài khoản và mật khẩu để đăng nhập<br>
			Nếu bạn chưa có tài khoản hãy ấn vào nút đăng ký ở dưới
    	</blockquote>
      <form method="post" action="../KhachHang/LoginKhachHangProcess.php">					
		<div class="alert alert-info alert-dismissable fade show" style="height:50px!important">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					Vui lòng nhập tài khoản và mật khẩu để đăng nhập
			</div>
			<input id="user" name="txtUser" class="form-control" type="text" placeholder="Tài khoản của bạn" required>
				<?php 
				if(isset($_GET["err"])) 
				{?> 
					<span class="text-danger">Tài khoản hoặc mật khẩu không chính xác</span> 
				<?php
				} 
				?>
			<br>
			<input id="pass" name="txtPass" class="form-control" type="password" placeholder="Mật khẩu" required>
	<a href="../DangkyKhachHang/Dangky.php" class="left-align waves-effect waves-light btn blue white-text">Đăng Ký</a>
    </div>
    <div class="modal-footer">
      <input type="submit" value="Đăng Nhập" class="btn blue btn-sm btn-block">
    </div>
  </div>
	<?php
		include("ThongTinCaNhan.php");
	?>