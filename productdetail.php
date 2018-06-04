<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mycss-product.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TA PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Shop House</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="indexhome.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="guide.php">Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Đăng nhập</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="dangky.php">Đăng ký</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  




<section class="main-content"> 




<form method="productdetail.php" action="GET">
  <table>
      <?php
        require 'database-config.php';
         $id = $_GET['id'];
        // echo "Connected successfully";
        $sql = "SELECT products.id, image, product_name,product_code, price, description, categories.name FROM products, categories where products.id = $id and products.category_id= categories.id";

        $result = mysqli_query($conn, $sql);
       
        if (!$result) {

        die("Can't query data. Error occure.".mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0 ) {
            
                  
                
                            
                                if ($row = mysqli_fetch_assoc($result) ){
                                    
                                         # code...
                                          
                                  
                                
                                echo "<tr>";
                                echo "<td>";
                                echo "<div class='col-lg-3 col-md-3 col-sm-4 col-xs-12'  >";
                                  
                                
                                    echo "<img src='".$row["image"]."' height='500px'>";
                                     
                                


                                echo "</td>";
                                echo "<td>";
                                      echo "<address>";
                                       echo "<div style='font-size: 24px;font-family: 'OpenSans Semibold';margin-bottom: 20px; margin-left: 20px;' >";
                                        
                                        echo "<strong style='color: #ff7e5f'>Loại:</strong> <span>".$row["name"]."</span><br>";
                                      echo "</div><br>";
                                        echo "<div style='font-size: 24px;font-family: 'OpenSans Semibold';margin-bottom: 20px; margin-left: 20px;' >";
                                        
                                        echo "<strong style='color: #ff7e5f'>Tên sản phẩm:</strong> <span>".$row["product_name"]."</span><br>";
                                      echo "</div>";
                                      
                                      echo "</address>";

                                      echo "<div style='font-size: 24px;font-family: 'OpenSans Semibold';margin-bottom: 20px; margin-left: 20px;'>";
                                        
                                      echo "<strong style='color: #ff7e5f'>Giá:</strong> <span>" .$row["price"]."</span>";
                                      echo "</div>";
                                      echo "<br>";

                                      echo "<div style='font-size: 24px;font-family: 'OpenSans Semibold';margin-bottom: 20px; margin-left: 20px;'>";
                                        echo "<span class='' aria-hidden='true'></span>";
                                      echo " <span>" .$row["description"]."</span>";
                                      echo "</div>";
                                     
                                    
                                      
                                      echo "<br>";
                                    
                                      
                                      echo "<i class='fa fa-eye' aria-hidden='true' ></i> <a class='preview' href='".$row["image"]."' style='font-size: 30px;'>Xem ảnh đầy đủ</a><br>";
                             echo "</td>";

                              }
                
                  echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                    
                
            
            } else {
            echo "0 results";
            }
            mysqli_close($conn);
            ?>

    </div>
    </table>       
       </form> 
       <br>





    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Final Project 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- My script -->
    <script type="text/javascript" src="js/myjs-product.js"></script>

  </body>

</html>
