<?php
header("Content-Type:application/json");
require 'database-config.php';
if (isset($_POST["fullname"])) {
     $target_dir = "img/";
     $target_file=$target_dir .date("YmdHis").basename($_FILES["fileToUpload"]["name"]);
     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $name = $_POST["fullname"];
    $position = $_POST["position"];
    $exp= $_POST["exp"];
    $dob= $_POST["dob"];
    $address = $_POST["address"];
    
    $image = $target_file;
    
    $sql = "INSERT INTO thongtin (fullname, position, exp, dob,address, image) VALUES('".$name."','".$position."','".$exp."','".$dob."','".$address."','".$image."')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Add product successfully";
        // echo header("location: index.php");
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot add product. Error: ".mysqli_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}
echo json_encode($data)
?>