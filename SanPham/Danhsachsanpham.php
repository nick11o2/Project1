<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://use.fontawesome.com/78e47248c7.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	
	<script src="../js/materialize.min.js"></script>
	<script>
		<?php if(isset($_GET["lichsu"]))
{
	?>
		 alert('Bạn phải đăng nhập trước đã!');
		<?php
}?>
	</script>
</head>
<style>
	
body {
  margin: 0;
}



.header {
  margin: auto;
  background-color:#514439 ;
  color: #f1f1f1;
  width:100%;
	
}

.content {
	width:100%;
	height: 800px;
    margin: auto;
	background-color: transparent;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
	.sticky1 + .content {
  padding-top: 102px;
}
	.header a:hover {
    background-color: #000;
		
}
	.line{
		border-top-color: white;
        height: 1px;
}
	
	.maincontent{
		position: relative;
		height: 1000px;
		width: 100%;
		float:right;
		
	}
	
	.anh{
	height: 120px;
	width: 100%;
	position: relative;
	left: 9px;
	bottom: 20px;
	}
	.show{
		height: 600px;
		width: 100%;
	}
	.container{
		padding-right: 15px;
	}
	td {
		color: aqua
	}
	.searchh{
	width: 250px;
	position:absolute;
	z-index:9;
	left: 10%;
	bottom: 65%;
	}
input[type=text] {
    width: 190px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url("images/searchion.jpg");
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;

}
</style>
	<script>
		<?php 
			if(isset($_GET["errLogin"]))
			{
		?>
				alert('Bạn phải đăng nhập để đặt hàng!');
		<?php
			}
		?>
		<?php
			if(isset($_GET["dathang"]))
			{
		?>
				alert('Đặt Hàng Thành Công!');
		<?php
				header("location:lichsugiaodich.php");
			}
		?>
	</script>
	<script>
		$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
	</script>
<body style="background: #efefef">
	
<?php include("header.php") ?>
<div class="line"></div>
	<?php include("nav.php") ?>
<div class="searchh">
	<a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Tìm kiếm"></a>
        <form method="get" action="Danhsachsanpham.php">
			<input type="text" name="txtsearch" placeholder="Tìm Kiếm..">
		</form>
	</div>
<div class="content" style="margin-top: 50px">
     <div class="anh" id="myAnh" align="center" >
  	     <img src="../images/title_cake.png" >
	</div>
			 <br/>
		 
       <div class="maincontent">
	        <div id="search" class="container">
	        <div class="row">
        <div class="col-md-12">						     
                    
<?php 
	include("../ConnectDb/open.php");
	$keyWord = "";
	 if(isset($_GET["txtsearch"]))
	 {
       	$keyWord=$_GET["txtsearch"];
	 }					 
?>           		
<div id="menu">
	<div id="menu-content">
		<?php
		$dem=0;
		$queryDM="SELECT * FROM tbldanhmuc";
		$result_test_1=mysqli_query($con,$queryDM);
		while($rowDM=mysqli_fetch_array($result_test_1))
		{
			$dem++;
			?>
			<div style="padding-top: 3px">
				 <span class="center-align"><a href="Danhsachsanpham.php?maDM=<?php echo($rowDM["maDM"]) ?>" class="grey-text text-darken-4"><?php echo($rowDM["tenDM"]);?></a></span>
			</div>
			<?php
		}
		?>
	</div>
	<div id="reveal" class="valign-wrapper">
		<i class="material-icons medium"><strong>chevron_right</strong></i>
	</div>
</div>
<style>
	#menu{
		position: fixed;
		left: -190px;
		top: 250px;
		width: 230;
		z-index: 99;
		opacity: 0.6;
		padding:0.5em 1em;
		background: white;
		transition: left 0.5s;
	}
	#menu-content {border-left: 5px solid rgba(0,125,225,0.47);
		padding: 0.5em;
		display: inline-block;
		width: 87%;
	}
	#menu:hover{
		opacity: 1;
		left: 0; 
		transition: left 0.5s;
	}
	#reveal {
		width: 10%;
		display: inline-block;
		height: inherit;
		opacity: 1;
	}
	#menu:hover #reveal {opacity: 0;}
</style>
					
     			</div>
	            </div>
		            <?php
					$queryDM="SELECT tenDM FROM tbldanhmuc";
					$result_test=mysqli_query($con,$queryDM);
					?>
				<?php
					
					if(isset($_GET["txtsearch"]))
					{
						$queryTSP="Select tbldanhmuc.tenDM,tblsanpham.ten,tblsanpham.anh,tblsanpham.gia,tblsanpham.tinhtrang,tblsanpham.maSP, count(maSP) as TSP,tblsanpham.mota from tblSanpham inner join tbldanhmuc on tblsanpham.maDM=tbldanhmuc.maDM 
					 			where ten like '%$keyWord%' ";
					}
					else
					{
						$queryTSP="Select tbldanhmuc.tenDM,tblsanpham.ten,tblsanpham.anh,tblsanpham.gia,tblsanpham.tinhtrang,tblsanpham.maSP, count(maSP) as TSP,tblsanpham.mota from tblSanpham inner join tbldanhmuc on tblsanpham.maDM=tbldanhmuc.maDM";
					}
					 
					 $resultTSP=mysqli_query($con,$queryTSP);
					 $rowTSP=mysqli_fetch_array($resultTSP);
					 $TSP=$rowTSP["TSP"];
				?>
				<?php
				
					 $soSPtren1trang=12;
					 $sotrang=ceil($TSP/$soSPtren1trang);
					 $page=0;
					 $start=0;
					 if(isset($_GET["page"]))
					 { 
						  $page=$_GET["page"];	
					 }
					 $start=$page*$soSPtren1trang;
					 if(isset($_GET["maDM"]))
					 {
						 $maDM=$_GET["maDM"];
						 $query="select * from tblsanpham where maDM=$maDM limit $start,$soSPtren1trang";
					 }else
					 {
					 $query="select * from tblSanpham where ten like '%".$keyWord."%' limit $start,$soSPtren1trang";
					 }
					 $result=mysqli_query($con,$query);
					 
					echo "<script>alert($query);</script>";	
                   
					 
				?>
				<div class="row">
					<div class="col s12 m7 align-top">
				<table align="center"  border="0.5px" cellpadding="0" cellspacing="0" bordercolor="#453326">
					<tr>
						<?php
						$dem=0;
						while($row=mysqli_fetch_array($result))
						{
						$dem++;	
						?>	
							<td>	
								<div class="card" style="width: 250px !important">
									<div class="card-image" style="width: 250px !important">
										<a href="danhsachsanphamchitiet.php?maSP=<?php echo($row["maSP"]);?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Click vào ảnh để xem chi tiết!" >
											<img src="../<?php echo($row["anh"]);?>" height="200px" width="200px">
										</a>
									</div>
									<div class="card-content">
										<span class="card-title activator grey-text text-darken-4">
											<font size="+1" class="red-text text-accent-2">
												<?php echo($row["ten"]);?>
											</font>
											<i class="material-icons right">more_vert</i>
										</span>
										<font size="+2" class="black-text" ><?php echo($row["gia"]);?><sup>đ</sup></font>
									</div>
									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4"><font size="+1" class="red-text text-accent-2"><?php echo($row["ten"]);?></font><i class="material-icons right">close</i></span>
										<p class="black-text"><?php echo($row["mota"]) ?> </p>
									</div>
									
								</div>
							</td>
						
							<?php
							  if($dem%4==0)
							  {
							 ?>
							 
								 </tr>
                                 <tr>
	                           <?php
							  }
							 
						}
						?>
					</tr>
				</table>
					</div>
				</div>
				<div></div>
				<?php
				
					for($i=0;$i<$sotrang;$i++)
				   {
						 ?>
						  <a href="?page=<?php echo($i);?>" class="red-text text-accent-2" ><?php echo($i+1);?></a>
						 <?php	
				   }
				include("../ConnectDb/close.php");
				?>
				</div>
	
</div>
	</div>
<div style="position: relative;top: 200px;background: #514439; margin-top: 500px; z-index: 99" align="center" class="footer">
	<?php include("footer.php"); ?> 
</div>
</body>
	</html>