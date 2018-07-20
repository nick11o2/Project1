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
    $('#chitiet').DataTable();
	$('select').material_select();
});
</script>
	<script>
		
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
</head>

<body>
	<?php
		include("header.php");
		include("nav.php");
	?>
	<?php
		if(isset($_GET["maDH"]))
		{
			$ma=$_GET["maDH"];
			include("../ConnectDb/open.php");
			$sql="select tbldonhang.maDH,tblsanpham.ten,tblsanpham.anh,tblsanpham.gia,tbldonhangchitiet.soluong,tblsanpham.gia*tbldonhangchitiet.soluong as tongtien from tbldonhang inner join tbldonhangchitiet on tbldonhang.maDH=tbldonhangchitiet.maDH inner join tblsanpham on tblsanpham.maSP=tbldonhangchitiet.maSP where tbldonhang.maDH=$ma";
			$result=mysqli_query($con,$sql);
			
			
	?>
	<div class="container">
		<h3 class="brown-text darken-1">Lịch Sử Giao Dịch</h3>
		<table class="table table-hover" id="chitiet">
			<thead>
				<tr>
					<th>Tên Sản Phẩm</th>
					<th>Ảnh</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Tổng Tiền</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Tên Sản Phẩm</th>
					<th>Ảnh</th>
					<th>Giá</th>
					<th>Số Lượng</th>
					<th>Tổng Tiền</th>
				</tr>
			</tfoot>
			<tbody>
	<?php
		while($row=mysqli_fetch_array($result))
		{
	?>
			<tr>
				<td><?php echo($row["ten"]) ?></td>
				<td><img src="../<?php echo($row["anh"]) ?>" height="200px" width="200px" ></td>
				<td><?php echo($row["gia"]) ?></td>
				<td><?php echo($row["soluong"]) ?></td>
				<td><?php echo($row["tongtien"]) ?></td>
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
</body>
</html>