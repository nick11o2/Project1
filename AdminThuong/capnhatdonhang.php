<?php
	$submited = isset($_GET["maDH"]);
	$submited &= isset($_POST["txtSdt"]);
	$submited &= isset($_POST["txtDiaChi"]);
	$submited &= isset($_POST["tinhtrang"]);

	if($submited)
	{
		$ma=$_GET["maDH"];
		$diachi=$_POST["txtDiaChi"];
		$sdt=$_POST["txtSdt"];
		$tinhtrang=$_POST["tinhtrang"];
		
		include("../ConnectDb/open.php");
		$sql="update tbldonhang set diachinhanhang='$diachi', sdtlienhe='$sdt', tinhtrang='$tinhtrang' where maDH='$ma'";
		echo($sql);
		$query=mysqli_query($con,"update tbldonhang set diachinhanhang='$diachi', sdtlienhe='$sdt', tinhtrang='$tinhtrang' where maDH='$ma'");
		include("../ConnectDb/close.php");
		
		header("location:chinhsuadonhang.php?maDH=$ma");

	}
	else
	{
		header("location:quanlidonhang.php");
	}
?>