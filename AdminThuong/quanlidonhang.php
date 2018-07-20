<?php
	session_start();
	include("kiemtra.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include("../lib/thuvien.php")
	?>
	<script>
	$(document).ready(function(){
    $('#quanli').DataTable();
	$('select').material_select();
	
});
</script>
</head>

<body>
	<?php
		include("navbar.php");
		include("../ConnectDb/open.php");
		$sql="select tbldonhang.maDH,tbldonhang.ngaydathang,tbldonhang.tinhtrang,tbldonhang.diachinhanhang,tbldonhang.sdtlienhe,tbltaikhoan.ten,tbltaikhoan.sdt,tbltaikhoan.diachi,tbltaikhoan.email from tbldonhang inner join tbltaikhoan on tbldonhang.maKH=tbltaikhoan.TK ORDER BY ngaydathang DESC";
		$result=mysqli_query($con,$sql);
		?>
	
		
	
		<div class="container" id="content">
		
		<?php
			include("menu.php");
		?>
		
		<div class="row">
			<div class="input-field col s3">
				<select>
					  <option value="" disabled selected>Tình Trạng Đơn Hàng</option>
					  <option value="1">Đang xử lý</option>
					  <option value="2">Đang giao hàng</option>
					  <option value="3">Đã giao hàng</option>
					  <option value="4">Đã Hủy</option>
				</select>
			</div>
			<div class="col s3"></div>
			<div class="col s3"></div>
			<div class="col s1"></div>
		</div>
		
		<div class="main">
		  <h2>Bảng Quản lý Đơn Hàng</h2>
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-11">
				<div id="quanlidonhang"></div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			tinhTrang = "";
			function GetDonHang(){
				$url="ajaxquanlidonhang.php";
				$data={
					"search" : tinhTrang
				};
				$.get($url, $data, function(donHang){
					$("#quanlidonhang").html(donHang);
				})
			}
			GetDonHang();
			$('select').on('change',function(){
				tinhTrang = $(this).val();
				GetDonHang();
			})
		})
	</script>
	
	<?php
		include("../ConnectDb/close.php");
	?>
</body>
</html>