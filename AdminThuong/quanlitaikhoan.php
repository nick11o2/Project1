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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
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
</head>

<body>
	<?php
			include("navbar.php");
			include("../ConnectDb/open.php");
			$result=mysqli_query($con,"select * from tbltaikhoan where phanquyen=3 ");
			
	?>
	<div class="container" id="content">
		
		<?php
			include("menu.php");
		?>

		<div class="main">
		  <h2>Bảng Quản lý Tài Khoản Khách Hàng</h2>
		</div>
		<div class="row">
			<div class="col s12" style="padding-left: 20px">
				<table id="quanli">
					<thead>
						<tr>
							<th>Tên Khách Hàng</th>
							<th>Số Điện Thoại</th>
							<th>Địa Chỉ</th>
							<th>Email</th>
							<th>Tài Khoản</th>
							<th>Mật Khẩu</th>
						</tr>
					</thead>
					<tbody>
				<?php while($row=mysqli_fetch_array($result))
				{
				?>
					<tr>
						<td><?php echo($row["ten"]) ?></td>
						<td><?php echo($row["sdt"]) ?></td>
						<td><?php echo($row["diachi"]) ?></td>
						<td><?php echo($row["email"]) ?></td>
						<td><?php echo($row["TK"]) ?></td>
						<td><?php echo($row["pass"])?></td>
					</tr>
				<?php
					}
				?>
					</tbody>
				
				</table>
			</div>
		</div>
	</div>
	<?php
		include("../ConnectDb/close.php");
	?>
</body>
</html>