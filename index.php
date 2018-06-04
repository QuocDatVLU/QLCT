<?php
	include 'header.php'
?>


<?php
require 'database-config.php';

$sql = "SELECT * from thongtin";
$result = mysqli_query($conn, $sql);
if(!$result){
	die( "Can't query data".mysqli_error($conn) );
}

if (mysqli_num_rows($result) > 0) {
	// 1. Tiêu đề bảng
	?>


<!-- Dashboard -->
<h1>Quản lý cầu thủ</h1>
<div class="wraper">
			<a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm</a>
			<br>
			<table class="table table-bordered table-striped" id="player-table">
				<thead>
					<tr>
						<th>Hình ảnh</th>
						<th>Tên</th>
						<th>Vị trí</th>
						<th>Kinh nghiệm</th>
						<th>Ngày sinh</th>
						<th>Địa chỉ</th>
						<th>Tùy chọn</th>

					</tr>
				</thead>
				<tbody>
					<?php 

					include 'database-config.php';
					$sql = "select * from thongtin";

					 while($row = mysqli_fetch_assoc($result)) {
				    	
				        echo "<tr id='".$row["id"]."'>";
				        	echo "<td class ='image'><img class='thumbnail' src ='".$row["image"]."'></td>";
				        	echo "<td class ='name'>".$row["fullname"]."</td>";
				        	echo "<td class ='position'>".$row["position"]."</td>";
				        	echo "<td class ='exp'>".$row["exp"]."</td>";
				        	echo "<td class ='dob'>".$row["dob"]."</td>";
				        	echo "<td class ='address'>".$row["address"]."</td>";
				        	echo "<td>";
				        	echo "<button class='btn btn-primary edit'>Sửa</button> <button class='btn btn-danger delete'>Xóa</button> ";
				        	echo "</td>";
				        echo "</tr>";
				    }

					 ?>
				</tbody>
			</table>
		</div>

		<?php
		} else {
		    echo "0 results";
		}

		mysqli_close($conn);
		?>
		<!-- Add Product -->
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-plus"></i> Cầu thủ mới</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>

					</div>
					<div class="modal-body">
						<form id="add-player-form" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Tên</label>
								<input type="text" class="form-control" name="fullname" id="name" required>
							</div>
							<div class="form-group">
								<label for="position">Vị trí</label>
								<!-- <input type="text" class="form-control" name="product_code" id="code"> -->
								<select class="form-control" name="position" id="position">
									<option disabled selected hidden>Chọn vị trí</option>
									<option value="Tiền đạo">Tiền đạo</option>
									<option value="Tiền vệ">Tiền vệ</option>
									<option value="Hậu vệ">Hậu vệ</option>
									<option value="Thủ môn">Thủ môn</option>
									<option value="Dự bị">Dự bị</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exp">Kinh nghiệm</label>
								<input type="text" class="form-control" name="exp" id="exp">
							</div>
							<div class="form-group">
								<label for="dob">Ngày sinh</label>
								<input type="text" class="form-control" name="dob" id="dob">
							</div>
							<div class="form-group">
								<label for="address">Địa chỉ</label>
								<textarea class="form-control" name="address" id="address"></textarea>
							</div>
							<div class="form-group">
									<label for="Image">Hình ảnh</label>
									<input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
									<img src="#" id="img-preview" style="height: 150px">
								</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="add-btn" style="width: 20%" data-dismiss="modal">Thêm</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Add Product -->
		<!-- update Product -->
		<!-- Modal -->
		<div id="update" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<form id="update-player-form" method="POST" action="<?php  $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
						    <h4 class="modal-title"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa thông tin</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							
						</div>
						<div class="modal-body">
							
							<input type="hidden" name="id" id="uid">
							<div class="form-group">
								<label for="uname">Tên</label>
								<input type="text" class="form-control" name="fullname" id="uname" required>
							</div>
							<div class="form-group">
								<label for="uposition">Vị trí</label>
								<!-- <input type="text" class="form-control" name="product_code" id="code"> -->
								<select class="form-control" name="position" id="uposition">
									<option disabled selected hidden>Chọn vị trí</option>
									<option value="Tiền đạo">Tiền đạo</option>
									<option value="Tiền vệ">Tiền vệ</option>
									<option value="Hậu vệ">Hậu vệ</option>
									<option value="Thủ môn">Thủ môn</option>
									<option value="Dự bị">Dự bị</option>
								</select>
							</div>
							<div class="form-group">
								<label for="uexp">Kinh nghiệm</label>
								<input type="text" class="form-control" name="exp" id="uexp">
							</div>
							<div class="form-group">
								<label for="udob">Ngày sinh</label>
								<input type="text" class="form-control" name="dob" id="udob">
							</div>
							<div class="form-group">
								<label for="uaddress">Địa chỉ</label>
								<textarea class="form-control" name="address" id="uaddress"></textarea>
							</div>
							<!-- Image -->
								<div class="form-group">
									<label for="Image">Image</label>
									<input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
									<img src="#" id="img-preview-upload" style="height: 150px">
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" id="up-btn" data-dismiss="modal" style="width: 20%">Save</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
<?php
	include 'footer.php'
  ?>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#player-table').DataTable({
  			responsive: true
  		});

  	})
  </script>