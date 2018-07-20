<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="../js/materialize.min.js"></script>
	<script>
		 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
	</script>
	<style>
		.container{min-height:50vh}
	</style>
	<script>
		function validate()
		{
			var sdt=document.getElementById("txtSdt").value;
			var errsdt=document.getElementById("errSdt");
			var kt=0;
			if(isNaN(sdt) == true)
			{
				errsdt.innerHTML="Bạn phải nhập số điện thoại";
			}else if(sdt.length>=11 && sdt.length<=9)
			{
				errSdt.innerHTML="phải nhập 9 đến 11 số";
			}else
			{
				errUser.innerHTML="";
				kt++;
			}
			if(kt==1)
			{
				document.getElementById("submm").submit();
				return true;
			}
			else
			{
				return false;
			}
		}
	</script>
</head>	
<body style="background: #efefef">
<?php
	include("nav.php");
	
	if(isset($_SESSION["gioHang"]))
	{
		$giohang=array();
		$giohang=$_SESSION["gioHang"];
		?>
	
	<div class="container">
		<h3>Thông tin nhận hàng</h3>
		<form id="submm" action="dathang.php" method="post">
			<div class="input-field">
				<input name="txtDiaChi" id="txtDiaChi" class="form-control validate" type="text" required style="width: 300px !important">
				<label for="txtDiaChi" data-error="Không được bỏ trống" data-success="OK">Nơi Nhận Hàng</label>
			</div>
			<div class="input-field">
				<input name="txtSdT" id="txtSdt" class="form-control validate" type="text" required style="width: 300px !important">
				<label for="txxSdt" >Số điện thoại liên hệ</label>
				<span id="errSdt" class="red-text"></span>
			</div>
			<input type="submit" class="btn btn-success" value="Đặt Hàng" onClick="return validate()">
		</form>
		<form method="post" action="capnhatgiohang.php" id="subm">
		<table class="table table-hover">
			<tr>
				<th>Mã Sản Phẩm</th>
				<th>Ảnh</th>
				<th>Tên Sản Phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành Tiền</th>
				<th></th>
			</tr>
		<?php
			$tongtien=0;
			foreach($giohang as $maSp=>$soluong)
			{
				include("../ConnectDb/open.php");
				$sql="select * from tblsanpham where maSP='$maSp'";
				$result=mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
				$thanhtien=$row["gia"]*$soluong;
				$tongtien+=$thanhtien;
		?>
			<tr>
				<td><?php echo($row["maSP"]) ?></td>
				<td><img src="../<?php echo($row["anh"]) ?>" height="100px" width="100px" class="materialboxed"></td>
				<td><?php echo($row["ten"]) ?></td>
				<td><?php echo($row["gia"]) ?></td>
				<td><input type="number" min="1" max="<?php echo($row["tinhtrang"]) ?>" required value="<?php echo($soluong) ?>" name="arrSl[]"></td>
				<td><?php echo($thanhtien) ?>VNĐ</td>
				<td><a href="xoagiohang.php?maSP=<?php echo($row["maSP"]) ?>" onClick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng?')">Xóa</a></td>
			</tr>
		<?php
				include("../ConnectDb/close.php");
			}
		?>
		</table>
			<input type="submit" value="Cập Nhật Giỏ Hàng" onClick="return soluong()" class="btn btn-success">
	<h3 align="right">Tổng tiền:<?php echo($tongtien) ?>VNĐ</h3>
			</form>
	</div>
	<?php
	}else
	{
		?>
		<div class="container">
		<?php
		echo('Giỏ hàng chưa có gì cả');
		?>
		</div>
		<?php
	}
	?>
	<div style="position: relative;top:50px;background: #514439; margin-top: 50px; z-index: 99" align="center" class="footer">
	<?php include("footer.php"); ?> 
</div>
</body>
