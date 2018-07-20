<!--navigation-bar-->
<?php include("../ConnectDb/open.php");	?>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
            	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                	<span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span></a>
            </div>
            <div  id="menu" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
				<!--Thanh menu-->
                    
                    <?php 
						
						if(isset($_SESSION['user']) && isset($_SESSION["phanquyen"]))
						{ 
							$check = 1;
							if($_SESSION["phanquyen"]==2){			
					?>
                    <li><a href="quanLiHocPhi.php">Học phí</a></li>
                    <li><a href="quanLiLopTinChi.php">Lớp học</a></li>
                    <li><a href="quanLiMonHoc.php">Môn học</a></li>
                    <li><a href="quanLiSinhVien.php">Sinh Viên</a></li>
                 <?php 	}
					}
				?>
                <!--Thanh menu-->
                </ul>
                <div class="navbar-right">
                <?php
				if($check==1){
				$ten = mysqli_fetch_array(
					mysqli_query($con,"select 
							ten 
						from tbladmin 
						where maTK='".$_SESSION['user']."'
					")	
				); ?>
                    <h4 style="display:inline"><span class="label label-lg label-success">
                    	Xin chào <i><?php echo($ten['ten']);?></i>
                        </span></h4>&nbsp;
                    <button type="button" class="btn navbar-btn btn-info">
                    	<span class="glyphicon glyphicon-user"></span>
                    </button>
                    <button type="button" class="btn navbar-btn btn-warning" >
                    	<span class="glyphicon glyphicon-cog"></span>
                    </button>
                    <button type="button" class="btn navbar-btn btn-danger" onclick="location.href='xuLy/logOut.php'">
                    	<span class="glyphicon glyphicon-log-out"></span>
                    </button>
               <?php } ?>
                </div>
            </div>
        </div>
    </nav>
<!--navigation-bar-->
<?php include("../ConnectDb/close.php");	?>