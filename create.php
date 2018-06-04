<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style type="text/css">
        .form-container{
            max-width: 400px;
            margin: 40px auto;
        }
        #add-btn{
            width: 100%;
        }
    </style>
</head>
<body>
<?php 
 
if(isset($_POST["code"])){
    require "database-config.php";
    $target_dir = "img/";
    $target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);
 
    $code = $_POST["code"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
 
    // Move uploaded file to img folder
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
 
    $sql = "INSERT INTO products(product_code, product_name, category, description, image) VALUES('".$code."','".$name."','".$category."','".$description."', '".$target_file."')";
    $result = mysqli_query($conn, $sql);
 
    if($result){
        // echo '<h2>Add product successfully</h2>';
        header("location: index.php");
        die();
    }else{
        echo '<h2>Can not add product with error: '.mysqli_error($conn).'</h2>';
    }
}else{
    // echo 'No product code';
}
 
 ?>
<div class="container">
    <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <!-- Mã sản phẩm -->
            <div class="form-group">
                <label for="code">Product Code</label>
                <input type="text" name="code" id="code" class="form-control">
            </div>
            <!-- Tên sản phẩm -->
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <!-- Loại sản phẩm -->
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" class="form-control">
            </div>
            <!-- Mô tả -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            </div>
            <!-- Hinnh anh  -->
            <div class="form-group">
                <label for="fileToUpload">Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <img src="#" style="width: 200px" class="thumbnail" id="uploadphoto">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="add-btn">Add</button>
            </div>
 
        </form>
    </div>
</div>
 
 
<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-- bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    function loadImage(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#uploadphoto").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    $("#fileToUpload").change(function(){
        loadImage(this);
    })
</script>
</body>
</html>