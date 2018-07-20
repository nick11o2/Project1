<?php
	session_start();
	if(isset($_SESSION["user"]) && isset($_SESSION["phanquyen"]))
	{
		unset($_SESSION["user"]);
		unset($_SESSION["phanquyen"]);
		header("location:LoginKhachHang.php");
	}
?>