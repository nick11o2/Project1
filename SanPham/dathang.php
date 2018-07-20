<?php
	session_start();
if(isset($_SESSION["phanquyen"]))
{
	$phanquyen=$_SESSION["phanquyen"];
	if(($phanquyen==1) || ($phanquyen==2))
	{
		header("location:../AdminThuong/index.php");
	}
}
if(isset($_SESSION["user"]) && isset($_POST["txtDiaChi"]) && isset($_POST["txtSdT"]))
	{
		$user=$_SESSION["user"];
		$diachi=$_POST["txtDiaChi"];
		$sdt=$_POST["txtSdT"];
		include("../ConnectDb/open.php");
		$laymaKH=mysqli_query($con,"select * from tbltaikhoan where TK='$user'");
		$rowmaKH=mysqli_fetch_array($laymaKH);
		$maKH=$rowmaKH["TK"];
		mysqli_query($con,"insert into tbldonhang(ngaydathang,tinhtrang,maKH,diachinhanhang,sdtlienhe) values(now(),0,'$maKH','$diachi','$sdt')");
		$sqlMaxMa="select max(madh) as maxMa from tbldonhang";
		$resultMaxMa=mysqli_query($con,$sqlMaxMa);
		$rowMaxMa=mysqli_fetch_array($resultMaxMa);
		$maxMa=$rowMaxMa["maxMa"];
		$giohang=$_SESSION["gioHang"];
		foreach($giohang as $maSp=>$soluong)
		{
			$sqlhoadon="insert into tbldonhangchitiet values($maxMa,'$maSp',$soluong)";
			$sqlcapnhat="update tblsanpham set tinhtrang=tinhtrang - $soluong where maSP='$maSp'";
			$hoadon=mysqli_query($con,$sqlhoadon);
			$capnhat=mysqli_query($con,$sqlcapnhat);
		}
		include("../ConnectDb/close.php");
		unset($_SESSION["gioHang"]);
		header("location:lichsugiaodich.php?dathang=1");
		
	}else
{
	header("location:Danhsachsanpham.php?errLogin=1");
}
?>