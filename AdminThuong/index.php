<?php
	session_start();
	include("kiemtra.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/materialize.min.css">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="../js/materialize.min.js"></script>
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function(){
		$('#quanli').DataTable();
		$('select').material_select();
	});
	</script>
	<style>
	.crop {
width: 250px;
height: 200px;
overflow:hidden;
}	
</style>
</head>

<body>
	<?php
			include("navbar.php");
			include("../ConnectDb/open.php");
			$sqlTongSP=mysqli_query($con,"select COUNT(maSP) as tongSP from tblsanpham");
			$rowTongSP=mysqli_fetch_array($sqlTongSP);
			$TongSP=$rowTongSP["tongSP"];
			$sosanphammoitrang=6;
			$sotrang=ceil($TongSP/$sosanphammoitrang);
			$page=0;
			$start=$page*$sosanphammoitrang;
			$result=mysqli_query($con,"select * from tblsanpham inner join tbldanhmuc on tbldanhmuc.maDM=tblsanpham.maDM");
			$row=mysqli_fetch_array($result);
	
			
	?>
	<div class="container" id="content">
		
		<?php
			include("menu.php");
		?>

		<div class="main">
		  <h2>Bảng Quản lý sản phẩm</h2>
		</div>
		<div class="row">
			<div class="col s11 display" style="padding-left: 20px">
				<table id="quanli">
					<thead>
						<tr>
							<th>Mã Sản Shẩm</th>
							<th>Tên Sản Phẩm</th>
							<th>Ảnh</th>
							<th>Giá</th>
							<th>Mô tả</th>
							<th>Số lượng</th>
							<th>Danh Mục</th>
							<th>Sửa</th>
						</tr>
					</thead>
									<tbody>
				<?php while($row=mysqli_fetch_array($result))
				{
				?>
	
					<tr>
						<td><?php echo($row["maSP"]) ?></td>
						<td><?php echo($row["ten"]) ?></td>
						<td><div class="crop"><img class="responsive-img" src="../<?php echo($row["anh"]) ?>" width="200px" height="200px"></div></td>
						<td><?php echo($row["gia"]) ?>đ</td>
						<td><div style="max-height: 220px; max-width: 250px; overflow-y: hidden !important"><p><?php echo($row["mota"]) ?></div></td>
						<td><?php echo($row["tinhtrang"])?></td>
						<td><?php echo($row["tenDM"]) ?></td>
						<td><a href="chinhsuasanpham.php?maSP=<?php echo($row["maSP"]) ?>" class="brown-text text-darken-2" ><i class="material-icons">edit</i></a></td>
					</tr>

				<?php
					}
				?>
															</tbody>
				</table>
				<script>$("select[name='quanli_length']").material_select();</script>
			</div>
		</div>
	</div>
	<?php
		include("../ConnectDb/close.php");
	?>
	
</body>
</html>
