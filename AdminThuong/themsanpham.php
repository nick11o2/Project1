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
	<link rel="stylesheet" href="../css/materialize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="../js/materialize.min.js"></script>
	<script src="https://use.fontawesome.com/78e47248c7.js"></script>
 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../css/w3.css">
</head>
<style type="text/css">
.thumb-image{
 float:left;width:200px;
 position:relative;
 padding:5px;
}
</style>
<script>
	$(document).ready(function() {
    $('select').material_select();
  });
</script>
<body>
	<?php
			include("navbar.php");
	?>
	<?php
		include("../ConnectDb/open.php");
		$query=mysqli_query($con,"select * from tbldanhmuc");
	?>
<div class="container" id="content">
	<?php
			include("menu.php");
		?>
	<h2>Thêm Sản Phẩm</h2>
	<div class="row" style="padding-left: 40px">
		<div class="col s12 m6">
			<div class="row">
				
				<form method="post" action="Upload.php" enctype="multipart/form-data" class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="txtTen" id="txtTen" class="validate">
							<label for="txtTen">Tên Sản Phẩm</label>
						</div>
					</div>
					<div class="file-field input-field">
						<div class="btn">
							<span>Ảnh</span>
							<input type="file" name="file" id="fileUpload">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
   					</div>
					<div class="row">
						<div class="col s6">
							<div id="image-holder" class=""></div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" pattern="[0-9].{1,9}" required title="Chỉ nhập số" name="txtTinhTrang" id="tinhtrang" class="validate">
							<label for="tinhtrang">Số Lượng Sản Phẩm</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea name="txtMota" id="mota" class="materialize-textarea" required></textarea>
							<label for="mota">Mô tả</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="text" pattern="[0-9].{1,20}" required title="Chỉ nhập số" name="txtGia" class="validate" id="gia">
							<label for="gia">Giá Sản Phẩm</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<select name="danhmuc" required>
						<option selected disabled >Danh Mục Sản Phẩm </option>
						<?php
						while($row=mysqli_fetch_array($query))
						{
						?>
						<option value="<?php echo($row["maDM"]) ?>"><?php echo($row["tenDM"]) ?></option>
						<?php
						}
						?>
							</select>
							<label>Danh Mục</label>
						</div>
					</div>
					<div class="row">
						<div class="col s2"></div>
						<div class="input-field col s8">
							<input type="submit" value="Thêm Sản Phẩm" class="btn blue btn-sm btn-block">
						</div>
						<div class="col s2"></div>
					</div>
					<?php
					include("../ConnectDb/close.php");
				?>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
	<?php if(isset($_GET["err"]))
		{
			?>
			Materialize.toast("Sản phẩm này đã tồn tại",4000);
			<?php
		}
		if(isset($_GET["errAnh"]))
		{
			?>
			Materialize.toast("Vui lòng chọn ảnh!",4000);
			<?php
		}
	?>
</script>
</body>
</html>