<?php
	if(isset($_GET["maDH"]))
	{
		$ma=$_GET["maDH"];
		include("../ConnectDb/open.php");
		$check=mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
		$xoa=mysqli_query($con,"delete from tbldonhang where maDH=$ma");
		$check2=mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
		$xoa2=mysqli_query($con,"delete from tbldonhangchitiet where maDH=$ma");
		include("../ConnectDb/open.php");
		header("location:quanlidonhang.php");
	}else
	{
		header("location:quanlidonhang.php");
	}
?>