<div class="modal fade" id="myModal">
	
				<div class="modal-dialog modal-lg">
					
					<div class="modal-content">
						<!-- Header -->
						<div class="modal-header jumbotron" align="center">
							
							<h4 class="modal-title text-success">Đăng Nhập</h4>
							
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
						</div>
						<!-- Body -->
						
						<div class="modal-body">
							<form method="post" action="../KhachHang/LoginKhachHangProcess.php">
								
								<div class="alert alert-info alert-dismissable fade show" style="height:50px!important">
    									<button type="button" class="close" data-dismiss="alert">&times;</button>
    										Vui lòng nhập tài khoản và mật khẩu để đăng nhập
 									</div>
									<input id="user" name="txtUser" class="form-control" type="text" placeholder="Tài khoản của bạn" required>
										<?php 
										if(isset($_GET["err"])) 
										{?> 
											<span class="text-danger">Tài khoản hoặc mật khẩu không chính xác</span> 
										<?php
										} 
										?>
									<br>
									<input id="pass" name="txtPass" class="form-control" type="password" placeholder="Mật khẩu" required>
									<br>
									<a href="../DangkyKhachHang/Dangky.php" style="color: green">Đăng Ký Tài Khoản</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="#" style="color: green">Quên Mật Khẩu</a>
    							
						</div>
						<!-- Footer -->
						<div class="modal-footer">
							<input type="submit" value="Đăng Nhập" class="btn btn-success btn-sm btn-block">
						</div>
							</form>
					</div>
					
				</div>
	
</div>