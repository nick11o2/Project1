<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?php include("../lib/thuvien.php"); ?>
<style>
	#hoa{
		padding-left: 150px
	}
	#maincontent{
		position: absolute; top: 400px
	}
	#myAnh{
		
	}
	#slide{
		width: 500px; height: 600px;
	}
body {
  margin: 0;
}

.top-container {
  background-color: #514439;
  margin: auto;
  text-align: center;
  height: 150px;
  width:100%;
  
}

.header {
  margin: auto;
  background-color:#514439 ;
  color: #f1f1f1;
  width:100%;
	
}

.content {
	width:100%;
	height: auto;
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
	bottom: 46px;
	}
	.show{
		height: 600px;
		width: 100%;
	}
	.container{
		padding-right: 15px;
	}
	td {color: aqua}
</style>
<script>
		
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
</head>
<body>
	
<div class="top-container z-depth-5">
  <h1 style="padding-top: 20px;color:#E4F8F1;font-family:'Lemonade Stand' ">Bakeology</h1>
  <h5 style="padding-top: -5px;color:#E4F8F1;font-family:'Lemonade Stand' ">Bakery</h5>
</div>
<div class="line"></div>
	 <!--<div class="header" id="myHeader">
		 <table border="0px" cellspacing="0" align="center" border-radius="15px">
				<tr>
					<td>
						   <a class="navbar-brand" href="Danhsachsanpham.php">
									 <i class="fa fa-home" aria-hidden="true"></i>	 
						   </a>
					</td>
					<td>
							<a class="nav-link" href="Danhsachsanpham.php">
								 <font color="#E4F8F1" size="+2">Sản phẩm</font>  
							</a>
					</td>
					<td>
							<a class="nav-link" href="#">
								  <font color="#E4F8F1" size="+2">Khuyến mãi</font> 
							</a>
					</td>
					<td>
				    <a class="nav-link" href="#">
			              <font color="#E4F8F1" size="+2">Tin tức</font> 
			        </a>
			</td>
					<td>
				<a class="nav-link" data-toggle="modal" data-target="#myModal" href="#">
					 <font color="#E4F8F1" size="+2">Đăng nhập</font>
				</a>
					</td>
					<td>
							<a class="nav-link" href="giohang.php" data-toggle="tooltip" data-placement="top" title="Xem giỏ hàng">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>

						</a>
					</td>
					
				</tr>
			</table>
		</div>-->
	<?php include("nav.php") ?>
	<div>
		
		<div class="content" >
				 <img src="../images/title_cake.png" style="position: relative;left: 200px;top: 32px" width="980" id="hoa">
			 <br/>

			 <div class="maincontent" id="maincontent">
                <div class="show">
                	<?php
					include("slideshow.php");
					?>
                </div>
				<div class="container" style="position: relative;left: 104px">
			  			<h1>Store</h1>
				  <div class="row">
					<div class="col-sm-4" style="padding-left: 15px">
							<figure class="figure">
								<img src="../images/laboroflove3.jpg" class="figure-img img-fluid" alt="..." height="200px" width="300px">
								<figcaption class="figure-caption red-text accent-2">LaBor Of Love Bakery</figcaption>
							</figure>
							<figure class="figure">
								<img src="../images/laboroflove5.jpg" class="figure-img img-fluid" alt="..." height="200px" width="300px">
								<figcaption class="figure-caption red-text accent-2">LaBor Of Love Bakery</figcaption>
							</figure>
							<figure class="figure">
								<img src="../images/laboroflove4.jpg" class="figure-img img-fluid" alt="..." height="200px" width="300px">
								<figcaption class="figure-caption red-text accent-2">LaBor Of Love Bakery</figcaption>
							</figure>
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-6" style="position: relative;left: 47px">
								<?php include("slideshow2.php"); ?>
					</div>
			</div>
				</div>
			</div>
	</div>
<div style="position: relative;top: 1460px;background: #514439" align="center">
	<?php include("footer.php"); ?> 
</div>			
<script>
window.onscroll = function() {myFunction()};

var sticky = header.offsetTop;
var anh = document.getElementById("myAnh");
var sticky1 = anh.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }

	if (window.pageYOffset >= sticky1) {
    anh.classList.add("sticky1");
  } else {
    anh.classList.remove("sticky1");
  }
}
</script>
</body>
</html>