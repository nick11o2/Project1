<?php 
	$loggedIn = isset($_SESSION['user']);
	
	if(!$loggedIn){
		?>
		<li><a href="Dangky.php">Đăng Ký</a></li>
		<li><a class=" modal-trigger" href="#dangnhap" >Đăng Nhập</a></li>
		<?php
	}
	else{
		?>
		<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Chào <?php echo($_SESSION["user"]) ?><i class="material-icons right">arrow_drop_down</i></a></li> 
		<?php
	}
?>