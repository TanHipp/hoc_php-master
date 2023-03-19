<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="create.css">
	<title></title>
</head>
<body>
	<?php
include("../../include/common.php");

// Xử lý thêm
if (is_method_post()) {
	// upload và nhận lại filename
	// Lưu file vào thư mục student
	//$filename = upload_and_return_filename("img_path", "student");
	// dùng filename nhận được để lưu vào db
	$fullname =$_POST["fullname"]??"";
	$dob =$_POST["dob"]??"";
	$gender =$_POST["gender"]??"";
	$address =$_POST["address"]??"";
	$class_id =$_POST["class_id"]??"";
	$img_path =upload_and_return_filename("img_path","student/img");
	// Chưa hoàn thiện
	$sql = "insert into students (fullname,dob,gender,address,class_id,img_path) 
	values(?,?,?,?,?,?)";
	$params = [$fullname,$dob,$gender,$address,$class_id,$img_path];
	db_execute($sql,$params);
	js_alert("Them lop thanh cong");
	js_redirect_to("/");
}

$_title = "Thêm học sinh";
include("../_header.php");
?>

<form method="post" enctype="multipart/form-data">
	<label>Họ tên: </label>
	<input type="text" name="fullname" />
	<br>
	<label>Ngày sinh: </label>
	<input type="date" name="dob" />
	<br>
	<label>Giới tính: </label>
	<label>
		<input type="radio" name="gender" value="0" />
		Nam
	</label>
	<label>
		<input type="radio" name="gender" value="1"/>
		Nữ
	</label>
	<br>
	<label>Địa chỉ: </label>
	<input type="text" name="address" />
	<br>
	<label>Chọn lớp: </label>
	<select name="class_id" require>
		<option value="">-- Chọn một lớp --</option>
		<?php
			gen_option_ele("classes", "id", "class_name");
		?>
	</select>
	<br>
	<label>Chọn ảnh đại diện: </label>
	<input type="file" name="img_path" accept=".png, .jpg, .jpeg" />
	<br>

	<input type="submit" value="Thêm học sinh" />
</form>

<?php include("../_footer.php"); ?>
</body>
</html>