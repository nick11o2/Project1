<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		if(isset($_GET["maTK"]))
		{
			$ma=$_GET["maTK"];
			include("../ConnectDb/open.php");
			$result=mysqli_query($con,"select * from tbltaikhoan where maTK=$ma");
			$row=mysqli_fetch_array($result);
		
	?>
	<form method="post" action="chinhsuaProcess.php?maTK=<?php echo($row["maTK"]) ?>">
		<input type="text" name="txtUser" value="<?php echo($row["username"]) ?>"><br>
		<input type="text" name="txtPass" value="<?php echo($row["pass"]) ?>"><br>
		<input type="submit" value="Sửa">
	</form>
	<?php
		include("../ConnectDb/close.php");
		}
	else
	{
		header("location:DanhSachAdminThuong.php");
	}
	?>
</body>
</html>