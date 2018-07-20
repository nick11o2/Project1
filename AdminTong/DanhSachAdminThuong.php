<?php
	session_start();
	if($_SESSION["phanquyen"]!=1)
	{
		unset($_SESSION["user"]);
		unset($_SESSION["phanquyen"]);
		header("location:LoginAdmin.php");
	}
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
	<style>
		*[onclick] {
    cursor: pointer;
}
	</style>
	<script>
		<?php
			if(isset($_GET["err"]))
			{
		?>
			alert('Tài khoản này đã tồn tại');
		<?php
			}
		?>
	</script>
</head>

<body>
	 <?php
		include("navbar.php");
	?>
	
	<div class="container">
		<div class="jumbotron">
			<h1>Danh Sách Các Admin</h1>
		</div>
		<?php
			include("../ConnectDb/open.php");
		?>
		<table class="table table-light table-hover">
    			<thead>
				  <tr>
					<th>Tài Khoản</th>
					<th>Mật Khẩu</th>
					<th>Xóa</th>
				  </tr>
   				 </thead>
   				<tbody>
				<?php
					$sql="select * from tbltaikhoan where maPQ=2";
					$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
				?>
					<tr onClick="window.location='chinhsua.php?maTK=<?php echo($row["maTK"]) ?>'">
						<td><?php echo($row["username"]); ?></td>
						<td><?php echo($row["pass"]); ?></td>
						<td><a class="btn btn-danger" href="xoaAdmin.php?maTK=<?php echo($row["maTK"]) ?>">Xóa</a></td>
					</tr>
				<?php
					}
				?>
				
				</tbody>
				
 			 </table>
		<?php
			include("../ConnectDb/close.php");
		?>
		
		<table>
		<tr>
			<form method="post" action="ThemAdminThuongProcess.php">
				<td class="input-field"><label>Tài khoản</label><input type="text" required id="txtUser" name="txtUser" ></td>
				<td class="input-field"><label>Mật khẩu</label><input type="password" required id="txtPass" name="txtPass" ></td>
				<td class="input-field"><input type="submit" value="Thêm admin" onClick="return validate()" class="btn btn-flat"></td>
			</form>
		</tr>
		</table>
	</div>
	<script>
		function validate(){
			$username = document.getElementById("txtUser").value;
			$password = document.getElementById("txtPass").value;
			if (/(\s)/.test($username) || /(\s)/.test($password)){
				Materialize.toast("Không được có dấu cách", 4000);
				return false;
			}
			else if (/(')/.test($username) || /(')/.test($password)){
				Materialize.toast("Không được có kí tự nháy đơn", 4000);
				return false;
			}
			else if (/")/.test($username) || /(")/.test($password)){
				Materialize.toast("Không được có kí tự nháy kép", 4000);
				return false;
			}
			else if (!(/[a-zA-Z0-9]/g.test($username)) || !(/[a-zA-Z0-9]/.test($password))){
				Materialize.toast("Chỉ được nhập chữ cái và số không dấu", 4000);
				return false;
			}
			else {
				return true;	
			}
			
		}
	</script>
	</body>

</html>