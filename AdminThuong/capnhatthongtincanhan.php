<?php
	if(isset($_POST["matk"]) && isset($_POST["ten"]) && isset($_POST["tuoi"]) && isset($_POST["email"]) && isset($_POST["diachi"]) && isset($_POST["sdt"]))
	{
	    $ma=$_POST["matk"];
	    $ten=$_POST["ten"];
        $tuoi=$_POST["tuoi"];
		$email=$_POST["email"];
		$diachi=$_POST["diachi"];
		$sdt=$_POST["sdt"];
		include("../ConnectDb/open.php");
		
		$sql="update tbladmin set ten='$ten', tuoi='$tuoi', email='$email', diachi='$diachi', sdt='$sdt' where TK='$ma'' ";
		$result=mysqli_query($con,$sql);	
		include("../ConnectDb/close.php");
		echo $sql;
		header("location:ThongTinCaNhan.php");
	}else
	{
		header("location:ThongTinCaNhan.php?loi=1");
	}
?>