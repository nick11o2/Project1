<?php
	if(isset($_GET["maDH"])&& isset($_POST["soluong"]) && isset($_POST["maSP"]))
	{
		$ma=$_GET["maDH"];
		$soluong=$_POST["soluong"];
		$masp=$_POST["maSP"];
		print_r($masp);
		print_r($soluong);
		include("../ConnectDb/open.php");
		foreach($masp as $i=> $sp)
		{
			$sl = $soluong[$i];
			$query="UPDATE tbldonhangchitiet SET soluong=$sl where maDH='$ma' and maSP='$sp'";
			mysqli_query($con,$query);
			echo $query; echo "<br>";
		}
		include("../ConnectDb/open.php");
		header("location:chinhsuadonhang.php?dathang=1");
	}
	else
	{
		header("location:quanlidonhang.php");
	}
?>