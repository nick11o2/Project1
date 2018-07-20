<?php
	if(isset($_GET["maTK"]))
	{
		$ma=$_GET["maTK"];
		header("location:chinhsua.php");
		if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]))
		{
			$user=$_POST["txtUser"];
			$pass=$_POST["txtPass"];
			include("../ConnectDb/open.php");
			$result=mysqli_query($con,"update tbltaikhoan set username='$user', pass='$pass' where maTK=$ma");
			header("location:DanhSachAdminThuong.php");
			include("../ConnectDb/close.php");
		}
	}else
	{
		header("location:DanhSachAdminThuong.php");
	}
?>