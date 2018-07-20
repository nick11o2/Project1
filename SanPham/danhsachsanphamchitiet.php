<?php
	session_start();
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8"/>
<title>Untitled Document</title>
<script src="https://use.fontawesome.com/78e47248c7.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="../js/materialize.min.js"></script>
</head>
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
    $('.materialboxed').materialbox();
  });
	
</script>
<body style="background: #efefef">
	<div class="top-container z-depth-5">
  <h1 style="padding-top: 20px;color:#E4F8F1;font-family:'Lemonade Stand' ">LaBor Of Love</h1>
  <h5 style="padding-top: -5px;color:#E4F8F1;font-family:'Lemonade Stand' ">Bakery</h5>
</div>
	 <?php
		include("nav.php");
	 ?>
<div id="Content" class="container">
<?php
if(isset($_GET["maSP"]))
{
	$ma=$_GET["maSP"];
	include("../ConnectDb/open.php");
	$sql="select  tbldanhmuc.tenDM,tblsanpham.ten,tblsanpham.anh,tblsanpham.gia,tblsanpham.mota,tblsanpham.tinhtrang,tblsanpham.maSP from tblsanpham inner join tbldanhmuc on tblsanpham.maDM=tbldanhmuc.maDM where tblsanpham.maSP='$ma'";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	?>
	<div class="row" style="padding-top: 50px">
		<div class="col s6">
			<img src="../<?php echo($row["anh"]);?>" class="materialboxed responsive-img" style="width: 400px; height: 400px !important" />
		</div>
		<div class="col s6">
			<table>
				<tr>
					<td><h3>Tên: <?php echo($row["ten"]);?></h3></td>
				</tr>
				<tr>

					<td><h4>GIÁ: <span class="red-text text-accent-2"><?php echo($row["gia"]);?></span></h4></td>
				</tr>
				 <tr>

					<td><?php echo($row["mota"]);?></td>
				</tr>
				<tr>

					<td>Tình Trạng: <?php if($row["tinhtrang"]>1){echo("Sản phẩm vẫn còn!");}else{echo("Liên Hệ");?> <i class="fa fa-phone" aria-hidden="true"></i>
		 <?php }?></td>
				</tr>
				<?php
					if($row["tinhtrang"]>0)
					{
				?>
					<tr>
						 <td><a class="waves-effect waves-light btn" href="gioHang.php?maSP=<?php echo($row["maSP"]);?>">Thêm Vào Giỏ Hàng</a></td>
					</tr>
				<?php
					}else
					{
				?>

				<?php		
					}
				?>
			</table>
		</div>
    <?php
	
	include("../ConnectDb/close.php");
	
}
else
{	
	
	?>
    <meta http-equiv="refresh" content="0,danhsachsanpham.php" />
    <?php
}
?>
	</div>
</div>
<div style="position: relative;top: 200px;background: #514439; margin-top: 50px" align="center" class="footer">
	<?php include("footer.php"); ?> 
</div>
</body>
</html>