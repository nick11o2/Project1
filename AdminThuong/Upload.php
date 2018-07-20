<?php
include("../ConnectDb/open.php");
$path = "../images/"; // Thư mục upload
$valid_formats = array("jpg", "png", "gif", "bmp","PNG",'JPG','GIF'); // Các đuôi file cho phép
$valid_type = array('image/gif','image/jpeg','image/png','image/bmp'); //Các định dạng cho phép
if (isset($_POST)) { // Kiểm tra tồn tại post request
    $name = $_FILES['file']['name']; // Lấy tên
    $size = $_FILES['file']['size']; // Lấy kích thước
    $type = $_FILES['file']['type']; // Lấy kiểu file
    if (strlen($name)) { // Kiểm tra xem đã có file nào được chọn
        list($txt, $ext) = explode(".", $name); // Lấy đuôi file sau dấu . vào biến $ext
        if (in_array($ext, $valid_formats)) { // Kiểm tra đúng với các đuôi file cho phép
            if(in_array($type, $valid_type)){ // Kiển tra định dạng (Content-Type) của file cho phép
                if ($size < (1024 * 1024)) { // Kiểm tra dung lượng file. Nếu nhỏ hơn 1 Mb = 1024 * 1024 thì tiếp tục
                    $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext; // Đổi tên file upload
                    $tmp = $_FILES['file']['tmp_name']; // Lấy thư mục lưu tạm upload file
                    if (move_uploaded_file($tmp, $path . $actual_image_name)) { // Di chuyển vào thư mục $path
                       if(isset($_POST["txtTen"]) && isset($_POST["txtTinhTrang"]) && isset($_POST["txtMota"]) && isset($_POST["txtGia"]) && isset($_FILES["file"]) && isset($_POST["danhmuc"]))
					   {
						   
						   
						   $ten=$_POST["txtTen"];
						   $tinhtrang=$_POST["txtTinhTrang"];
						   $mota=$_POST["txtMota"];
						   $gia=$_POST["txtGia"];
						   $dm=$_POST["danhmuc"];
						   
						   $queryMaSP = "SELECT max(maSP) FROM TBLSANPHAM WHERE maSP Like '%SP%'";
						   $resultMaSP = mysqli_query($con,$queryMaSP);
						   $maSP = mysqli_fetch_array($resultMaSP)[0];
						   
						   $maSP = substr($maSP, 2);
						   $maSP = (int)$maSP + 1;
						   $maSP = str_pad($maSP, 4, "0", STR_PAD_LEFT);
						   $maSP = "SP" . $maSP;
						   
						   $file='images/'.$actual_image_name;
						   $resultt=mysqli_query($con,"select * from tblsanpham where ten='$ten'");
						   $kiemtra=mysqli_num_rows($resultt);
						   if($kiemtra>0)
						   {
							   include("../ConnectDb/close.php");
							   header("location:themsanpham.php?err=1");
						   }else
						   {
						   $queryInsert = "
						   		insert into 
								tblsanpham(maSP, ten,anh,tinhtrang,mota,gia,maDM)
								values('$maSP', '$ten','$file',$tinhtrang,'$mota',$gia,$dm)";
						  
						  	echo $queryInsert;
						  
						   $result=mysqli_query($con,$queryInsert);
						   
						   include("../ConnectDb/close.php");
					   	   header("location:index.php");
						   }
					   }else
					   {
						   header("location:themsanpham.php");
					   }
                    } else
                        echo "Lỗi không xác đinh"; // Nếu di chuyển không thành công
                } else
                    echo "Tối đa upload 1 MB"; // Nếu file upload lớn hơn 1 MB
            } else
            echo "Không đúng định dạng"; // Nếu Content-Type không nằm trong danh sách cho phép
        } else
            echo "Không đúng định dạng"; // Nếu đuôi file không nằm trong danh sách cho phép
    } else
       header("location:themsanpham.php?errAnh=1"); // Nếu chưa có file gì được gửi đên
}
