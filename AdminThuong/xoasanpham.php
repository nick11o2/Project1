<?php
	if(isset($_GET["maSP"]))
	{
		$ma=$_GET["maSP"];
		include("../ConnectDb/open.php");
		$check=mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
		$xoa=mysqli_query($con," delete from tblsanpham where maSP=$ma");
		header("location:index.php");
		include("../ConnectDb/close.php");
	}else
	{
		header("location:index.php");
	}
?>