<?php
	if(isset($_SESSION["user"]))
	{
		if(isset($_SESSION["phanquyen"]))
		{
			$phanquyen=$_SESSION["phanquyen"];
			if($phanquyen==3)
			{
				header("location:index.php");
			}
		}
	}
?>