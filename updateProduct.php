<?php 
header("Content-Type:application/json");
require 'database-config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["id"]) && isset($_POST["fullname"])){
       
        $id = $_POST["id"];
        $name = $_POST["fullname"];
        $position = $_POST["position"];
        $exp = $_POST["exp"];
        $dob = $_POST["dob"];
        $address = $_POST["address"];
        $target_dir = "img/";
        $target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $sql = "UPDATE  thongtin SET fullname ='".$name."',position='".$position."', exp='" .$exp."',dob='".$dob."',address='".$address."',image='".$target_file."' WHERE id =".$id;

        $result = mysqli_query($conn, $sql);
        if($result){
            $data["result"] = true;
          $data["message"] =  "Add product successfully";
          // echo header("location: index.php");
          // die();
        }else{
            $data["result"] = false;
          $data["message"] =  "Can not add product. Error: ".mysqli_error($conn);
        }
    }else{
      $data["result"] = false;
        $data["message"] = "Invalid product information";
    }
    echo json_encode($data);
}
 ?>