<?php
	session_start();
	include("../ConnectDb/open.php");
	include("kiemtra.php");
	$userID = $_SESSION['user'];
	$query = "
		SELECT 
			* FROM TBLTAIKHOAN 
		WHERE TK = '$userID'";
	$result = mysqli_query($con, $query);
	$rowInfo = mysqli_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
		include("../lib/thuvien.php");
	?>
</head>

<body>
	<script>
		function validate(){
			var $sdt = document.getElementById("sdt").value;
			if ($sdt.length == 0) {
				Materialize.toast("Ko dc bo trong", 4000);
				return false;
			}
			else if (!/^[0-9]{9,11}$/.test($sdt)){
				Materialize.toast("SDT khong dung dinh dang", 4000);
				return false;
			}
			return true;
		}
	</script>
	<?php
		include("navbar.php");
		include("menu.php");
	?>
	<div class="container" style="padding-left: 30px !important">
		<h2 class="center-align">Thông tin Cá Nhân</h2>
		<form method="post" action="capnhatthongtincanhan.php">
			<div class="input-field" style="display: none;">
				<label for="ten">tên</label>
				<input type="text" value="<?=$rowInfo['TK']?>" name="matk" class="validate" required />
			</div>
			<div class="input-field">
				<label for="ten">tên</label>
				<input type="text" value="<?=$rowInfo['ten']?>" name="ten" class="validate" required />
			</div>
			<div class="input-field">
				<label for="tuoi">tuổi</label>
				<input type="text" id="datepicker" value="<?=$rowInfo['ngaysinh']?>" name="tuoi" class="validate" required />
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
			</div>
			<div class="input-field">
				<label for="email">email</label>
				<input type="email" value="<?=$rowInfo['email']?>" name="email" class="validate" required />
			</div>
			<div class="input-field">
				<label for="diachi">địa chỉ</label>
				<input type="text" value="<?=$rowInfo['diachi']?>" name="diachi" class="validate" required />
			</div>
			<div class="input-field">
				<label for="sdt">số điện thoại</label>
				<input type="text" id="sdt" value="<?=$rowInfo['sdt']?>" name="sdt" class="validate" required />
			</div>
			<div class="input-field">
				<button type="submit" onClick="return validate()" class="waves-effect waves-light btn">
					Cập nhật thông tin
				</button>
			</div>
		</form>
	</div>
</body>
</html>