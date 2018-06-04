<?php 
header("Content-Type:application/json");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["username"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $usernameAD = 'dat';
    $passwordAD = 'dat';


        if($username == $usernameAD && $password == $passwordAD){
          $_SESSION['ad_session'] = 'dat';
            $data["result"] = true;
          $data["message"] =  "Login success";
          // echo header("location: index.php");
          // die();
        }else{
            $data["result"] = false;
          $data["message"] =  "Can't login";
        }
    }else{
      $data["result"] = false;
        $data["message"] = "Invalid login information";
    }
    echo json_encode($data);
}
 ?>