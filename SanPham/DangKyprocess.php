<?php
	if(isset($_POST["txtUser"])&&isset($_POST["txtPass"])&&isset($_POST["NhaplaiPass"])&&isset($_POST["txtTen"])&&isset($_POST["txtSdt"])&&isset($_POST["txtDiachi"])&&isset($_POST["txtEmail"])&&isset($_POST["txtNgaysinh"])&&isset($_POST["rdbgt"]))
	{
		$user=$_POST["txtUser"];
		$pass=$_POST["txtPass"];
		$ten=$_POST["txtTen"];
		$sdt=$_POST["txtSdt"];
		$diachi=$_POST["txtDiachi"];
		$email=$_POST["txtEmail"];
		$ngaysinh=$_POST["txtNgaysinh"];
		$ngaysinh=strtotime($ngaysinh);
		$ngaysinh=date("Y-m-d",$ngaysinh);
		$gioitinh=$_POST["rdbgt"];
		include("../ConnectDb/open.php");
		$result=mysqli_query($con,"select * from tbltaikhoan where TK='$user'");
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			header("location:Dangky.php?err=1");
			include("../ConnectDb/close.php");
		}else
		{
		mysqli_query($con,"insert into tbltaikhoan(TK,pass,ten,gioitinh,ngaysinh,sdt,diachi,email,phanquyen) values('$user','$pass','$ten',$gioitinh,'$ngaysinh','$sdt','$diachi','$email',3)");
		include("../ConnectDb/close.php");
		header("location: ../SanPham/Danhsachsanpham.php");
		}
	}else header("location: Dangky.php")
?>