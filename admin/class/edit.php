<?php
include("../../include/common.php");

$id = $_GET["id"] ?? -1;

if (is_method_get()) {
	// Lấy dữ liệu hiển thị ra màn hình cho thao tác update
	$sql = "select * from classes where id=?";
	$data = db_select($sql, [$id]);
	if (empty($data)) {
		// quay về trang chủ nếu không có dữ liệu
		redirect_to("/");
	}
	$data = $data[0];
} else if (is_method_post()) {
	// Cập nhật dữ liệu
	$name = $_POST["class_name"];
	$sql = "update classes set class_name=? where id=?";
	db_execute($sql, [$name, $id]);
	js_alert("Cập nhật thành công");
	js_redirect_to("/");	// chuyển hướng về trang chủ
}

$_title = "Cập nhật lớp";
include("../_header.php");
?>

<h2>Cập nhật lớp</h2>
<form method="post">
	<label>Tên lớp: </label>
	<input type="text" name="class_name" required value="<?php echo $data["class_name"]; ?>" />
	<input type="submit" value="Cập nhật lớp" />
</form>

<?php include("../_footer.php"); ?>
