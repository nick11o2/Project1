<?php
	session_start();
if(!isset($_SESSION["user"]))
{
	header("location:Danhsachsanpham.php?lichsu=1");
}
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
			$('#lichsu').DataTable();
			$('select').material_select();
		});
	</script>
	<script>
	  $(document).ready(function(){
		$('.modal').modal();
	  });
	</script>
	<style>
		.top-container {
  background-color: #514439;
  margin: auto;
  text-align: center;
  height: 150px;
  width:100%;
  
}
	</style>
	<style>
		.container{min-height:40vh}
	</style>
</head>
<body>
	<?php
		include("header.php");
	?>
	<?php
	include("nav.php");
	?>
	<?php
		if(isset($_SESSION["user"]))
		{
			$user=$_SESSION["user"];
			include("../ConnectDb/open.php");
			$sqlTongDonHang=mysqli_query($con,"select COUNT(*) as tongDH from tbldonhangchitiet");
			$rowTongDonHang=mysqli_fetch_array($sqlTongDonHang);
			$tongDonHang=$rowTongDonHang["tongDH"];
			$sodonhangMoiTrang=4;
			$sotrang=ceil($tongDonHang/$sodonhangMoiTrang);
			$page=0;
			$start=0;
			$start=$page*$sodonhangMoiTrang;
			$sql="select tbldonhang.tinhtrang,tbldonhang.ngaydathang,tbldonhang.maDH,tbldonhang.diachinhanhang,tbldonhang.sdtlienhe,
			tbltaikhoan.diachi,tbltaikhoan.sdt,tbltaikhoan.TK 
			from tbldonhang inner join tbltaikhoan on tbltaikhoan.TK=tbldonhang.maKH where TK='$user'";
			$result=mysqli_query($con,$sql);
			
			
	?>
	<div class="container">
		<h2 class="brown-text darken-1">Lịch Sử Giao Dịch</h2>
		<table class="table table-hover" id="lichsu">
			<thead>
				<tr>
					<th>Mã Đơn Hàng</th>
					<th>Ngày Đặt Hàng</th>
					<th>Nơi Nhận Hàng</th>
					<th>SĐT Liên Lạc</th>
					<th>Tình Trạng</th>
					<th>Chi Tiết</th>
				</tr>
			</thead>
			<tbody>
	<?php
		while($row=mysqli_fetch_array($result))
		{
	?>
			<tr>
				<td><?php echo($row["maDH"]) ?></td>
				<td><?php echo($row["ngaydathang"]) ?></td>
				<td><?php if($row["diachinhanhang"]=="") { echo($row["diachi"]); }else{ echo($row["diachinhanhang"]); } ?></td>
				<td><?php if($row["sdtlienhe"]=="") { echo($row["sdt"]); }else{ echo($row["sdtlienhe"]); } ?></td>
				<td><?php 
						if($row["tinhtrang"]==1)
						{
							echo('Đang Giao Hàng');
						}
						if($row["tinhtrang"]==2)
						{
							echo('Đã Giao Hàng');
						}
						if($row["tinhtrang"]==0)
						{
							echo('Đang xử lý');
						}
					?></td>
				<td><a href="chitietdonhang.php?maDH=<?php echo($row["maDH"]) ?>" ><i class="small material-icons brown-text text-darken-2">info</i></a></td>
			</tr>
	<?php	
		}
	?>	
		</tbody>
		</table>
	</div>
	<?php
		
			include("../ConnectDb/close.php");
		}
	?>
	<div style="position: relative;top: 50px;background: #514439; margin-top: 100px; z-index: 99" align="center" class="footer">
	<?php include("footer.php"); ?> 
</div>
	<script>
		<?php
			if(isset($_GET["dathang"]))
			{
		?>
			Materialize.toast('Đặt hàng thành công!',4000);
		<?php
			}
		?>
	</script>
</body>
</html>