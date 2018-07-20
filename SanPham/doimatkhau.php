<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
		header("location:Danhsachsanpham.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="../js/materialize.min.js"></script>
	<style>
		.top-container {
  background-color: #514439;
  margin: auto;
  text-align: center;
  height: 150px;
  width:100%;
  
}
	</style>
	<script>
		$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
	</script>
</head>
<body>
	<div class="top-container">
   <h1 style="padding-top: 20px;color:#E4F8F1;font-family:'Lemonade Stand' ">LaBor Of Love</h1>
  <h5 style="padding-top: -5px;color:#E4F8F1;font-family:'Lemonade Stand' ">Bakery</h5>
</div>
	<?php include("nav.php") ?>
	<div class="container">
		<h2 class="red-text text-accent-2">Đổi Mật Khẩu</h2>
		<div class="row">
			<form action="doimatkhauprocess.php" method="post" class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="txtPasscu" required id="txtPasscu">
						<label for="txtPasscu">Mật Khẩu Cũ</label>
						<span><?php if(isset($_GET["err"])) echo('Mat khau cu khong chinh xac') ?></span>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="txtPassmoi" required id="txtPassmoi">
						<label for="txtPassmoi">Mật Khẩu Mới</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="password" name="NhaplaiPass" required id="NhaplaiPass">
						<label for="NhaplaiPass">Nhập lại Mật Khẩu</label>
					</div>
				</div>
				<div class="row">
					<div class="col s2"></div>
					<div class="col s8">
					<input type="submit" value="Đổi mật khẩu" class="waves-effect waves-light btn">
					</div>
					<div class="col s2"></div>
				</div>
			</form>
		</div>
	</div>
<div style="position: relative;top: 50px;background: #514439; margin-top: 50px; z-index: 99" align="center" class="footer">
	<?php include("footer.php"); ?> 
</div>
</body>
</html>