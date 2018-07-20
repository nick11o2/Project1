<?php
	include("../ConnectDb/open.php");	
	$search = $_POST["data"];	
	$query=mysqli_query($con,"select * from tblsanpham inner join tbldanhmuc on tbldanhmuc.maDM=tblsanpham.maDM where ten like '%$search%' ");
	$num= mysqli_num_rows($query);
	if($num>0)
	{
		while($row=mysqli_fetch_array($query))
		{
			?>
	
			<tr>
				<td><?php echo($row["maSP"]) ?></td>
				<td><?php echo($row["ten"]) ?></td>
				<td><div class="crop"><img class="responsive-img" src="../<?php echo($row["anh"]) ?>" width="200px" height="200px"></div></td>
				<td><?php echo($row["gia"]) ?>đ</td>
				<td><?php echo($row["mota"]) ?></td>
				<td><?php echo($row["tinhtrang"])?></td>
				<td><?php echo($row["tenDM"]) ?></td>
				<td><a href="chinhsuasanpham.php?maSP=<?php echo($row["maSP"]) ?>" class="brown-text text-darken-2" ><i class="material-icons">edit</i></a></td>
				<td><a href="xoasanpham.php?maSP=<?php echo($row["maSP"]) ?>" onClick="return confirm('Bạn có muốn xóa không?')" class="brown-text text-darken-2"><i class="material-icons">delete</i></a></td>
			</tr>


<?php
		}
	}
?>
