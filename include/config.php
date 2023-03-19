<?php

/*
 * Thay "hoc_php" bằng tên thư mục của bạn ở htdocs
 */

// Thư mục gốc ở htdocs (đối với XAMPP)
define('ROOT_PATH', "/hoc_php-master");

// Thư mục chứa file asset (css/js/img)
define('ASSET_PATH', "/hoc_php-master/asset");

// Thư mục chứa file upload bởi user
define('UPLOAD_PATH', "/hoc_php-master/upload");

// Đường dẫn đầy đủ đến thư mục hiện tại, không cần chỉnh sửa nếu dùng XAMPP
define('DOCUMENT_ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

// Thông tin đăng nhập database
$database = [
	"host" => "localhost",
	"db" => "study_php",
	"username" => "root",
	"password" => "",
	
];

