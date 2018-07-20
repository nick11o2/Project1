<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
		header("location:../SanPham/Danhsachsanpham.php");
	}
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
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
</head>

<body>
	
	<?php
		include("../ConnectDb/open.php");
		$user=$_SESSION["user"];
		$sql="select * from tblkhachhang inner join tbltaikhoan on tblkhachhang.maTK=tbltaikhoan.maTK where username='$user'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
	?>
	<div class="container">
		<div class="jumbotron">
			<h3> Quản Lý Tài Khoản</h3>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
					<table class="table table-hover">
						  	<tr>
								<td>Họ và Tên:</td>
								<td>
									<span> <?php echo($row["ten"]) ?></span>
								</td>
						  	</tr>
						  	<tr>
								<td>Số Điện thoại:</td>
								<td>
									<span> <?php echo($row["sdt"]) ?></span>
								</td>
						  	</tr>
							<tr>
								<td>Địa Chỉ:</td>
								<td>
									<span> <?php echo($row["diachi"]) ?></span>
								</td>
						  	</tr>
							<tr>
								<td>Email:</td>
								<td>
									<span> <?php echo($row["email"]) ?></span>
								</td>
						  	</tr>
					 </table>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<input type="submit" value="Cập nhật thông tin" class="btn btn-success btn-sm btn-block">
						</div>
						<div class="col-md-2"></div>
					</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>