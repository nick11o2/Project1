<?php
	session_start();
	if(isset($_SESSION["user"]))
	{
		$user=$_SESSION["user"];
		if(isset($_POST["txtPasscu"]) && isset($_POST["txtPassmoi"]))
		{
			$passcu=$_POST["txtPasscu"];
			$passmoi=$_POST["txtPassmoi"];
			include("../ConnectDb/open.php");
			$sql="select pass from tbltaikhoan where TK='$user' and pass='$passcu'";
			$result=mysqli_query($con,$sql);
			$dem=mysqli_num_rows($result);
			if($dem==1)
			{
				mysqli_query($con,"update tbltaikhoan set pass='$passmoi' where TK='$user'");
				header("location:Danhsachsanpham.php");
			}else
			{
				header("location:doimatkhau.php?err=1");
			}
			include("../ConnectDb/close.php");

		}else
		{
			header("location:doimatkhau.php");
		}
	}
?>