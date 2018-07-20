<?php
	if(isset($_SESSION["user"]))
	{
		header("location:../SanPham/Danhsachsanpham.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="../pickadate.js-3.5.6/pickadate.js-3.5.6/lib/picker.js"></script>
	<script src="../pickadate.js-3.5.6/pickadate.js-3.5.6/lib/legacy.js"></script>
	<script src="../pickadate.js-3.5.6/pickadate.js-3.5.6/lib/picker.date.js"></script>
	<script src="../pickadate.js-3.5.6/pickadate.js-3.5.6/lib/picker.time.js"></script>
	<script src="../js/materialize.min.js"></script>
	<link rel="stylesheet" href="../css/materialize.min.css">
	
	<script>    
		function validate()
		{
			var user=document.getElementById("txtUser").value;
			var pass=document.getElementById("txtPass").value;
			var nhaplai=document.getElementById("txtNhaplaiPass").value;
			var sdt=document.getElementById("txtSdt").value;
			// lấy Err
			var errUser=document.getElementById("errUser");
			var errPass=document.getElementById("errPass");
			var errNhailai=document.getElementById("errNhaplai");
			var errSdt=document.getElementById("errSdt");
			// validate
			var kt=0;
			if(isNaN(sdt) == true)
				{
					errSdt.innerHTML="Bạn phải nhập số";
				}
			else if(sdt.length>=11 && sdt.length<=9)
				{
					errSdt.innerHTML="phải nhập 9 đến 11 số";
				}else
				{
					errUser.innerHTML="";
					kt++;
				}
			if(user.length==0)
				{
					errUser.innerHTML="Bạn không được bỏ trống";
				}
			else
				{
					errUser.innerHTML="";
					kt++;
				}
			if(pass.length==0)
				{
					errPass.innerHTML="Bạn không được bỏ trống";
				}
			else
				{
					errPass.innerHTML="";
					kt++;
				}
			if(nhaplai!=pass)
				{
					errNhailai.innerHTML="Mật khẩu không khớp";
				}
			else
				{
					errNhailai.innerHTML="";
					kt++;
				}
			if(kt==4)
				{
					document.getElementById("subm").submit();
					return true;
				}
			else
				{
					return false;
				}
		}
	
	</script>
</head>

<body style="background: #efefef">
	<?php
		include("../SanPham/header.php");
		include("../SanPham/nav.php");
	?>
	
	<div class="container">
		<div class="card">
			<h2 class="red-text text-accent-2" align="center">Đăng Ký Tài Khoản</h2>
			<div class="card-content">
			<div class="row">
				<form method="post" action="DangKyprocess.php" id="subm" class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="txtUser" id="txtUser" class="validate">
							<label for="txtUser">Tài Khoản</label>
								<span id="errUser" class="text-danger">
									<?php
										if(isset($_GET["err"]))
										{
											echo("Tài khoản này đã tồn tại!");
										}
									?>
								</span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="txtPass" id="txtPass" class="validate" >
							<label for="txtPass">Mật Khẩu</label>
							<span id="errPass" class="text-danger"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="NhaplaiPass" id="txtNhaplaiPass" class="validate" >
							<label for="txtNhapLaiPass">Nhập Lại Mật Khẩu</label>
							<span id="errNhaplai" class="text-danger"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="txtTen" id="txtTen" class="validate">
							<label for="txtTen">Họ và Tên</label>
							<span id="errTen" class="text-danger"></span>
						</div>
					</div>
					<p>
							<input type="radio" name="rdbgt" id="rdbgt" value="1" checked>
							<label for="rdbgt">Nam</label>
							<input type="radio" name="rdbgt" id="rdbgt1" value="0">
							<label for="rdbgt1">Nữ</label>
							<span id="errgt" class="text-danger"></span>
					</p>
					<div class="row">
						<div class="input-field col s12">
  							<input type="text" class="datepicker" id="datepicker" name="txtNgaysinh" required>
							<script>
							  $('.datepicker').pickadate({
								selectMonths: true, // Creates a dropdown to control month
								selectYears: 100, // Creates a dropdown of 15 years to control year,
								today: 'Hôm nay',
								clear: 'Chọn lại',
								close: 'Ok',
								closeOnSelect: false // Close upon selecting a date,
							  });
							</script>
							<label for="datepicker">Ngày Sinh</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="txtSdt" id="txtSdt" class="validate">
							<label for="txtSdt">Số Điện Thoại</label>
							<span id="errSdt" class="text-danger"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="txtDiachi" id="txtDiachi" class="validate" >
							<label for="txtDiaChi">Địa Chỉ</label>
							<span id="errDiachi" class="text-danger"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s10">
							<input type="email" name="txtEmail" id="txtEmail" class="validate">
							<label for="txtEmail" data-error="Đúng định dạng email" data-success="sai định dạng email">Email</label>
							<span id="errEmail" class="text-danger"></span>
						</div>
					</div>
					<div class="row">
						<div class="col s1"></div>
						<div class="input-field col s10">
							<input type="submit" value="Đăng Ký Ngay" class="btn blue btn-sm btn-block" onClick="return validate()"></div>
						<div class="col s1"></div>
					</div>	
				</form>
				</div>
			</div>
		</div>
	</div>
	<div style="position: relative;top: 100px;background: #514439; margin-top: 5px" align="center" class="footer">
	<?php include("../SanPham/footer.php"); ?> 
</div>
</body>
</html>