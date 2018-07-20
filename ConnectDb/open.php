<?php
	$con = new MySQLi("localhost","root","","project1edit");
	if($con->error)
	{
		echo('Loi roi!');
	}else
		mysqli_set_charset($con,"UTF8");
?>