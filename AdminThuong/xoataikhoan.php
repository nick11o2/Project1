<?php
	if(isset($_GET["maTK"]))
	{
		include("../ConnectDb/open.php");
		$ma=$_GET["maTK"];
		$xoa=mysqli_query($con,"delete from tbltaikhoan where maTK=$ma");
		include("../ConnectDb/close.php");
		header("location:quanlitaikhoan.php");
	}else
	{
		header("location:quanlitaikhoan.php");
	}
?>