<?php 
	include("../ConnectDb/open.php");
	$filter ="";
	if ($_GET['search']!=""){
		$filter = " WHERE TBLDONHANG.TINHTRANG LIKE ".$_GET['search'];
	}
	$sql="select tbldonhang.maDH,tbldonhang.ngaydathang,tbldonhang.tinhtrang,tbldonhang.diachinhanhang,tbldonhang.sdtlienhe,tbltaikhoan.ten,tbltaikhoan.sdt,tbltaikhoan.diachi,tbltaikhoan.email from tbldonhang inner join tbltaikhoan on tbldonhang.maKH=tbltaikhoan.TK $filter  ORDER BY ngaydathang DESC";
	$result=mysqli_query($con,$sql);
?>
	<table border="1px" id="quanli">
					<thead>
					<tr>
						<th>Mã Đơn Hàng</th>
						<th width="150px !important">Tên Khách Hàng</th>
						<th width="100px !important">Địa chỉ</th>
						<th>Số ĐT</th>
						<th>Email</th>
						<th>Ngày Đặt Hàng</th>
						<th>Tình Trạng</th>
						<th>Chi Tiết</th>
					</tr>
					</thead>
					<tbody>
				<?php while($row=mysqli_fetch_array($result))
				{
				?>
					<tr>
						<td><?php echo($row["maDH"]) ?></td>
						<td><?php echo($row["ten"]) ?></td>
						<td><?php echo($row["diachi"]) ?></td>
						<td><?php echo($row["sdt"]) ?></td>
						<td><?php echo($row["email"]) ?></td>
						<td><?php echo($row["ngaydathang"])?></td>
						<td>
							<?php if($row["tinhtrang"]==1) echo('Đang Giao Hàng');
								  if($row["tinhtrang"]==2) echo('Đã Giao Hàng');
								  if($row["tinhtrang"]==0) echo('Đang Xử Lý');
							?>
						
						</td>
						<td><a href="chinhsuadonhang.php?maDH=<?php echo($row["maDH"]) ?>" ><i class="small material-icons brown-text text-darken-2">info</i></a></td>
					</tr>
				<?php
					}
				?>
					</tbody>
				</table>
<?php
?>