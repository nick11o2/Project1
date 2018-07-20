<?php
	session_start();
	include("kiemtra.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  	<script src="../js/bootstrap.min.js"></script>
	<style>
		a.{text-decoration: none}
	</style>
</head>

<body>
	<div class="container">
			<!-- Nút đăng nhập -->
			<button class="btn btn-success" data-toggle="modal" data-target="#myModal">
				Đăng Nhập
			</button>
			<!-- Form đăng nhập -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Header -->
						<div class="modal-header jumbotron" align="center">
							<h4 class="modal-title text-success">Đăng Nhập</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<!-- Body -->
						<div class="modal-body">
							<form method="post" action="LoginKhachHangProcess.php">
								<div class="container">
     								<div class="alert alert-info alert-dismissable fade show">
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
									<br>
									<a href="../DangkyKhachHang/Dangky.php">Đăng Ký Tài Khoản</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="#" >Quên Mật Khẩu</a>
    							</div>
						</div>
						<!-- Footer -->
						<div class="modal-footer">
							<input type="submit" value="Đăng Nhập" class="btn btn-success btn-sm btn-block">
						</div>
							</form>
					</div>
				</div>
			</div>
	</div>
</body>
</html>