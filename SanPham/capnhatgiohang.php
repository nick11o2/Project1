<?php
	session_start();
	if(isset($_POST["arrSl"]))
	{
		
		$arrSl=array();
		$arrSl=$_POST["arrSl"];
		$giohang=array();
		$giohang=$_SESSION["gioHang"];
		$dem=0;
		foreach($giohang as $maSp=>$soluong)
		{
			$_SESSION["gioHang"][$maSp]=$arrSl[$dem];
			$dem++;
		}
		header("location:xemgiohang.php");
	}else
	{
		header("location:xemgiohang.php");
	}
?>