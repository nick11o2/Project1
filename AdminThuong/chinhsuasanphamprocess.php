<?php

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
                       if(isset($_POST["txtTen"]) && isset($_POST["tinhtrang"]) && isset($_POST["txtMota"]) && isset($_POST["txtGia"]) && isset($_FILES["file"]) && isset($_GET["maSP"]) && isset($_POST["danhmuc"]))
					   {
						   $ma=$_GET["maSP"];
						   $ten=$_POST["txtTen"];
						   $tinhtrang=$_POST["tinhtrang"];
						   $mota=$_POST["txtMota"];
						   $gia=$_POST["txtGia"];
						   $dm=$_POST["danhmuc"];
						   $file='images/'.$actual_image_name;
						   include("../ConnectDb/open.php");
						   $sql="update tblsanpham set ten='$ten', anh='$file', tinhtrang=$tinhtrang,mota='$mota', gia=$gia, maDM=$dm where maSP='$ma'";
						   $result=mysqli_query($con,$sql);
						   header("location:index.php");
						   include("../ConnectDb/close.php");
					   }else
					   {
						   header("location:chinhsuasanpham.php?maSP=$ma");
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
        echo "Hãy chọn một hình ảnh !"; // Nếu chưa có file gì được gửi đên
}
