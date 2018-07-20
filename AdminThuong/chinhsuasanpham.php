<?php
	session_start();
	include("kiemtra.php");
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
<style type="text/css">
.thumb-image{
 float:left;width:200px;height: 200px;
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
	<div class="container" id="content">
		
		<?php
			include("menu.php");
		?>

		<div class="main">
		  <h2>Sửa sản phẩm</h2>
		</div>
		<div class="row" style="padding-left: 40px">
			<div class="col s12 m6">
				<?php 
					if(isset($_GET["maSP"]))
					{
						$ma=$_GET["maSP"];
						include("../ConnectDb/open.php");
						$result=mysqli_query($con,"select tblsanpham.maSP,tblsanpham.ten,tblsanpham.anh,tblsanpham.tinhtrang,tblsanpham.mota,tblsanpham.gia,tbldanhmuc.maDM,tbldanhmuc.tenDM from tblsanpham inner join tbldanhmuc on tbldanhmuc.maDM=tblsanpham.maDM where maSP='$ma'");
						$row=mysqli_fetch_array($result)
				
				?>
					<div class="row">
						<form action="chinhsuasanphamprocess.php?maSP=<?php echo($row["maSP"]) ?>" method="post" class="col s12" enctype="multipart/form-data">
							<div class="row">
								<div class="input-field col s12">
									<input type="text" id="ma" name="txtMa" disabled value="<?php echo($row["maSP"]) ?>">
									<label for="ma">Mã Sản Phẩm:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" name="txtTen" id="ten" class="validate" value="<?php echo($row["ten"]) ?>" required>
									<label for="ten">Tên Sản Phẩm:</label>
								</div>
							</div>
							<div class='row'>
								<div class="file-field col-10 input-field">
									<div class="btn">
										<span>Ảnh</span>
										<input type="file" name="file" id="fileUpload">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" value="<?php echo($row["anh"]) ?>">
									</div>
								</div>
								<div class="input-field col-2">
									<button class="btn z-depth-0 waves-effect waves-light" id="macdinh" type="button">
										Ảnh Mặc Định
									</button>
									<script>
											$('#macdinh').on('click', function(){
												$('#image-holder').html("<img src='../<?php echo($row['anh']) ?>' height='200px' width='200px'>");
											})
									</script>
								</div>
							</div>
							<div class="row">
								<div class="col s6">
									<div id="image-holder">
										<img src="../<?php echo($row["anh"]) ?>" height="200px" width="200px">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" id="gia" name="txtGia" class="validate" value="<?php echo($row["gia"]) ?>" >
									<label for="gia">Giá:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<textarea name="txtMota" required style="width: 100%" class="materialize-textarea" id="mota"><?php echo($row["mota"]) ?></textarea>
									<label for="mota">Mô tả:</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									<select name="danhmuc" required>
										<option selected disabled>Danh Mục Sản Phẩm</option>
										<?php
											$laydanhmuc=mysqli_query($con,"select * from tbldanhmuc");
											while($row1=mysqli_fetch_array($laydanhmuc))
											{
										?>
										<option <?php if($row["maDM"]==$row1["maDM"]){echo("selected");} ?> value="<?php echo($row1["maDM"]) ?>"><?php echo($row1["tenDM"]) ?></option>
										
										<?php
											}
										?>
									</select>
									<label>Danh Mục</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="number" min="0" max="<?php echo($row["tinhtrang"]) ?>" id="so" name="tinhtrang" class="validate" value="<?php echo($row["tinhtrang"]) ?>" required>
									<label for="so">Số lượng</label>
								</div>
							</div>
							<div class="row">
								<div class="col s2"></div>
								<div class="input-field col s8">
									<input type="submit" class="waves-effect waves-light btn" value="Sửa Sản Phẩm" >
								</div>
								<div class="col s2"></div>
							</div>
						</form>
				<?php
					
						include("../ConnectDb/close.php");
					}
				?>
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
</script>
</body>
</html>