<?php
	session_start();
	if(isset($_POST["txtUser"]) && isset($_POST["txtPass"]))
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		include("../ConnectDb/open.php");
		$result=mysqli_query($con,"select * from tbltaikhoan where TK='$user' and pass='$pass'");
		$dem=mysqli_num_rows($result);
		if($dem==0)
		{
			header("location:LoginKhachHang.php?err=1");
		}
		else
		{
			$row=mysqli_fetch_array($result);
			$_SESSION["user"]=$row["TK"];
			$phanquyen=$row["phanquyen"];
			$_SESSION["phanquyen"]=$phanquyen;
			if($phanquyen==3)
			{
				header("location:../SanPham/index.php");
			}else if($phanquyen==2)
			{
				header("location:../AdminThuong/index.php");
			}else
			{
				header("location:../AdminTong/DanhsachAdminThuong.php");
			}
		}
		include("../ConnectDb/close.php");
	}else
	{
		header("location:LoginKhachHang.php");
	}
?>