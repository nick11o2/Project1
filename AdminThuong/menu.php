<style>
	body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 240px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
	background-color:#fafafa !important ;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #000000;
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
	#Menu{padding-top: 0px;}
	#content{padding-top: 55px}
</style>
<div class="sidenav black z-depth-2" id="Menu">
	<div ><img id="logo" src="../images/ThuyetBanh.png"></div>
	<script>
		$(document).ready(function(){
			$("#logo").width($("#Menu").width());
		})
	</script>
	<a href="index.php">Danh Sách Sản Phẩm</a>
	<a href="themsanpham.php">Thêm Sản Phẩm</a>
	<a href="quanlidonhang.php">Đơn Hàng</a>
	<a href="quanlitaikhoan.php">Quản Lý Tài Khoản</a>
</div>

