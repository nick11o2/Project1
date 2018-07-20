<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
		header("location:LoginAdmin.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
</head>

<body>
	<div class="container">
		<div>
			<form method="post" action="ThemAdminThuongProcess.php">
				<input type="text" name="txtUser" ><br>
				<input type="text" name="txtPass" ><br>
				<input type="submit" value="Thêm">
			</form>
		</div>
	</div>
</body>
</html>