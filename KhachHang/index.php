<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
		header("location:LoginKhachHang.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/78e47248c7.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link">Left Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link">Left Link 2</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link">Right Link 1</a>
    </li>
    <li class="navbar-item">
      <i class="fa fa-power-off" aria-hidden="true"><a class="nav-link" href="logoutprocess.php">Đăng xuất</a></i>
    </li>
  </ul>
</nav>
	<a href="ThongTinTaiKhoan.php">Quản lý Tài Khoản</a>
	<a href="logoutprocess.php">Đăng xuất</a>
</body>
</html>