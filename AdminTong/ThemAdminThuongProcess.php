<?php
	if(isset($_POST["txtUser"])&&isset($_POST["txtPass"]))
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		include("../ConnectDb/open.php");
		$kiemtra=mysqli_query($con,"select * from tbltaikhoan where username='$user'");
		$dem=mysqli_num_rows($kiemtra);
		if($dem==1)
		{
			header("location:DanhSachAdminThuong.php?err=1");
		}else
		{

			$queryMaTK = "select max(maTK) from tbltaikhoan";
			$resultMaTK = mysqli_query($con, $queryMaTK);
			$maTK = mysqli_fetch_array($resultMaTK)[0];
			$maTK = (int)$maTK + 1;
			
			mysqli_query($con,"insert into tbltaikhoan(maTK,username,pass,maPQ) values('$maTK','$user','$pass',2)");
			mysqli_query($con,"insert into tbladmin(matk) values ('$maTK')");
			header("location:DanhSachAdminThuong.php");
		}
			include("../ConnectDb/close.php");
	}else
	{
		header("location:DanhSachAdminThuong.php");
	}
?>