<?php
	if(isset($_GET["maTK"]))
	{
		$ma=$_GET["maTK"];
		include("../ConnectDb/open.php");
		$xoa=mysqli_query($con,"delete from tbladmin where maTK=$ma");
		$xoa=mysqli_query($con,"delete from tbltaikhoan where maTK=$ma and maPQ=2");
		header("location:DanhSachAdminThuong.php");
		include("../ConnectDb/close.php");
	}else
	{
		header("location:DanhSachAdminThuong.php");
	}
?>