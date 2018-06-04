<?php
header("Content-Type:application/json");
require 'database-config.php';
if (isset($_POST["product_name"]) && isset($_POST["product_code"]) && isset($_POST["category"]) && isset($_POST["description"])) {
	$name = $_POST["product_name"];
	$code = $_POST["product_code"];
	$category= $_POST["category"];
	$description= $_POST["description"];
	$target_dir = "img/";
	$target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);
	// $image = $target_file;
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	$sql = "INSERT INTO products(product_name, product_code, category, description,image) VALUES('".$name."','".$code."','".$category."','".$description."','".$target_file."')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		$data["result"] = true;
		$data["message"]  ="Add product successfully";
		// echo header("location: index.php");
	}else{
		$data["result"] = false;
		$data["message"]  ="Cannot add product. Error: ".mysql_error($conn);
	}
}else{
	$data["result"] = false;
	$data["message"]  ="Invalid";
}
echo json_encode($data)
?>