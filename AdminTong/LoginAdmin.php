<?php
	session_start();
	include("kiemtra.php");
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
	<style>
		<?php
			include("FormDangNhap.css");
		?>
	</style>
	<script>
		<?php
		if(isset($_GET["err"]))
		{?>
			alert('Tài khoản hoặc mật khẩu không chính xác');
		<?php
		}
		?>
	</script>
</head>

<body>
	<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="../images/sungbo.jpg" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="LoginAdminProcess.php">
                <input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Tài Khoản Admin" required autofocus>
                <input type="password" id="txtPass" name="txtPass" class="form-control" placeholder="Mật khẩu" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>