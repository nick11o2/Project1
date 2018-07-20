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
		include("../lib/thuvien.php");
	?>
	
	<script>
	$(document).ready(function(){
    $('').DataTable();
	$('select').material_select();
});
</script>
</head>
<body>
	
	<?php
	include("navbar.php");
	
	if(isset($_GET["maDH"]))
	{
		$ma=$_GET["maDH"];
	include("../ConnectDb/open.php");
	$query1=mysqli_query($con,"select * from tbldonhang inner join tbltaikhoan on tbldonhang.maKH=tbltaikhoan.TK where tbldonhang.maDH='$ma'");
	$query2=mysqli_query($con,"select tbldonhang.maDH,tbldonhang.ngaydathang,tbldonhang.diachinhanhang,tbldonhang.sdtlienhe,tbltaikhoan.ten as tenKH,tbltaikhoan.sdt,tbltaikhoan.diachi,tblsanpham.maSP,tblsanpham.ten,tblsanpham.anh,tblsanpham.gia,tbldonhangchitiet.soluong,tbldonhang.tinhtrang,tbltaikhoan.email from tbldonhang inner join tbldonhangchitiet on tbldonhangchitiet.maDH=tbldonhang.maDH inner join tbltaikhoan on tbltaikhoan.TK=tbldonhang.maKH inner join tblsanpham on tblsanpham.maSP=tbldonhangchitiet.maSP where tbldonhang.maDH='$ma'");
	$query=mysqli_query($con,"select tbldonhang.maDH,tbldonhang.ngaydathang,tbldonhang.diachinhanhang,tbldonhang.sdtlienhe,tbltaikhoan.ten as tenKH,tbltaikhoan.sdt,tbltaikhoan.diachi,tblsanpham.maSP,tblsanpham.ten,tblsanpham.anh,tblsanpham.gia,tbldonhangchitiet.soluong,tbldonhang.tinhtrang,tbltaikhoan.email from tbldonhang inner join tbldonhangchitiet on tbldonhangchitiet.maDH=tbldonhang.maDH inner join tbltaikhoan on tbltaikhoan.TK=tbldonhang.maKH inner join tblsanpham on tblsanpham.maSP=tbldonhangchitiet.maSP where tbldonhang.maDH='$ma'");
		$row=mysqli_fetch_array($query);
		$row1=mysqli_fetch_array($query1);
	?>
	<div class="container" id="content" style="padding-left: 30px !important">
	<?php
			include("menu.php");
	?>
	<div class="main">
		  <h2>Bảng Quản lý Đơn Hàng</h2>
	</div>	
		<div class="row">
    		<div class="col s6">Thông Tin Khách Hàng
		  <div class="row">
			<form class="col s12">
			  <div class="row">
				<div class="input-field col s12">
				  <input id="tenkh" type="text" class="validate" readonly value="<?php echo($row["tenKH"]) ?>">
				  <label for="tenkh">Tên Khách Hàng</label>
				</div>
			  </div>
			  <div class="row">
			  	<div class="input-field col s12">
				  <input id="SDT" type="text" class="validate" readonly value="<?php echo($row["sdt"]) ?>">
				  <label for="SDT">Số Điện Thoại</label>
				</div>
			  </div>
			  <div class="row">
				<div class="input-field col s12">
				  <input id="diachi" type="text" class="validate" readonly value="<?php echo($row["diachi"]) ?>">
				  <label for="diachi">Địa Chỉ</label>
				</div>
			  </div>
			  <div class="row">
				<div class="input-field col s12">
				  <input id="email" type="email" class="validate" readonly value="<?php echo($row["email"]) ?>">
				  <label for="email" data-error="Không Được Sửa" data-success="right">Email</label>
				</div>
			  </div>
			</form>
		  </div>
	  </div>
    		<div class="col s6">Thông Tin Đặt Hàng
		<div class="row">
			<form class="col s12" method="post" action="capnhatdonhang.php?maDH=<?php echo($row["maDH"]); ?>">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" class="validate" name="txtDiaChi" id="nhanHang" value="<?php if($row["diachinhanhang"]=="") echo($row1["diachi"]); else echo($row["diachinhanhang"]);  ?>" >
						<label for="nhanHang">Địa Chỉ Nhận Hàng</label>
					</div>
				</div>
				<div class="row">
				<div class="input-field col s12">
				  <input id="SDTlienhe" type="text" class="validate" name="txtSdt" value="<?php if($row["sdtlienhe"]=="") echo($row1["sdt"]); else echo($row["sdtlienhe"]); ?>">
				  <label for="SDTlienhe">Số Điện Thoại Liên Hệ</label>
				</div>
			 	</div>
				<div class="row">
					<div class="input-field col s12">
						<select name="tinhtrang">
							<option value="" disabled selected>Tình Trạng Đơn Hàng</option>
							<option value="0" <?php if($row["tinhtrang"]==0){ echo "selected"; } ?>>Đang Xử Lí</option>
							<option value="1" <?php if($row["tinhtrang"]==1){ echo "selected"; } ?>>Đang Giao Hàng</option>
							<option value="2" <?php if($row["tinhtrang"]==2){ echo "selected"; } ?>>Đã Giao Hàng</option>
						</select>
						<script>
							$(document).ready(function(){
							$('select').material_select();
						});
						</script>
					</div>
				</div>
				<div class="row">
					<div class="col s2"></div>
					<div class="input-field col s8">
						<input type="submit" class="waves-effect waves-light btn" value="Cập Nhật Thông Tin" >
					</div>
					<div class="col s2"></div>
				</div>
			</form>
		</div>		
	  </div>
		</div>
		<div class="row">
			<div class="col s12"><h2>Chi Tiết Đơn Hàng</h2>
				<div class="row">
					<div class="input-field col s12">
							<form method="post" id="edit-don-hang-chi-tiet" action="chinhdonhangchitiet.php?maDH=<?php echo($ma)?>">
							<table id="chitiet">
								<thead>
									<tr>
										<th>Tên Sản Phẩm</th>
										<th>Ảnh</th>
										<th>Số lượng</th>
										<th>OK</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Tên Sản Phẩm</th>
										<th>Ảnh</th>
										<th>Số lượng</th>
										<th></th>
									</tr>
								</tfoot>
								<tbody>
									
										<?php
											while($row2=mysqli_fetch_array($query2))
											{
										?>		<input type="text" name="maSP[]" value="<?php echo($row2["maSP"]) ?>" style="display: none">
												<tr>
													<td><?php echo($row2["ten"]) ?></td>
													<td><div class="crop"><img src="../<?php echo($row2["anh"]) ?>" width="200" height="200"></div></td>
													<td>
														<div class="input-field">
														<input type="number" min="1" max="10" value="<?php echo($row2["soluong"]) ?>" name="soluong[]">
														</div>
													</td>
													<td>
														
													</td>
												</tr>
										<?php
											}
										?>
										
								</tbody>
							</table>
								<input type="submit" value="OK" class="waves-effect waves-light btn" >
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
					}
			include("../ConnectDb/close.php");
					?>
			
	</div>
</body>
</html>