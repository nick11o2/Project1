
<div id="modal2" class="modal">
		<div class="modal-content">
				<h4 class="center-align">Thông Tin Cá Nhân</h4>
							<form method="post" action="../KhachHang/LoginKhachHangProcess.php">
								<?php
								include("../ConnectDb/open.php");
								$user=$_SESSION["user"];
								$sql="select * from tbltaikhoan where TK='$user'";
								$result=mysqli_query($con,$sql);
								$row=mysqli_fetch_array($result);
								?>
							<div>
							
									<table>
										<tbody>
											<tr>
												<td class="black-text text-black">Họ và Tên:</td>
												<td>
													<p class="black-text text-black"> <?php echo($row["ten"]) ?></p>
												</td>
											</tr>
											<tr>
												<td class="black-text text-black">Ngày Sinh:</td>
												<td>
													<p class="black-text text-black"> <?php echo($row["ngaysinh"]) ?></p>
												</td>
											</tr>
											<tr>
												<td class="black-text text-black">Giới Tính:</td>
												<td>
													<p class="black-text text-black"><?php if($row["gioitinh"]==1)  echo("Nam"); else echo("Nữ"); ?></p>
												</td>
											</tr>
											<tr >
												<td class="black-text text-black">Số Điện thoại:</td>
												<td class="black-text text-black">
													<p> <?php echo($row["sdt"]) ?></p>
												</td>
											</tr>
											<tr>
												<td class="black-text text-black">Địa Chỉ:</td>
												<td class="black-text text-black">
													<p> <?php echo($row["diachi"]) ?></p>
												</td>
											</tr>
											<tr>
												<td class="black-text text-black">Email:</td>
												<td class="black-text text-black">
													<p> <?php echo($row["email"]) ?></p>
												</td>
											</tr>
										 </tbody>	
									 </table>
								<div>	
									<a class="btn brown lighten-1 " href="doimatkhau.php" >Đổi Mật Khẩu</a>
									<a class="btn brown lighten-1" href="lichsugiaodich.php">Lịch sử giao dịch</a>
								</div>
							</div>
						</div>
						<!-- Footer -->
						<div class="modal-footer">
								<a class="btn brown lighten-1 modal-close" href="#">Đóng</a>
						</div>
							<?php include("../ConnectDb/close.php"); ?>
							</form>
		</div>		 
</div>