<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Markov</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="ajax_handler.js"></script>

	<link rel="stylesheet" href="css/grid.css">
</head>
<body>
	<?php
		session_start();
		$_SESSION['array'] = null;
	 ?>
	 <div class="container-fluid text-center mt-5">
		 <!-- <form class="mb-2" action="" method="POST" enctype="multipart/form-data">
		 	<input class="btn btn-info" type="file" name="upload" id="upload">
		 	<input class="btn btn-info" type="button" name="submit" id="submit" value="Submit">
		 	<input class="btn btn-info" type="button" name="potential" id="potential" value="Details">
		 	<input type="submit" name="outfile" value="Save to file">


		 </form> -->
		<div class="row">
			<div class="row col-6">
				<div class="col-12 text-center">
					<h3>KẾT QUẢ HỌC TẬP</h3>
				</div>
				<div class="col-12">
					<hr>
				</div>
				<div class="col-4">
					<h4>Tên: </h4>
				</div>
				<div class="col-8">
					<input type="text" name="name" id="name"
					value = "<?php 
						echo isset($_POST['name']) ? $_POST['name'] : ''
					 ?>"
					 placeholder="Nhập tên...">
				</div>
				<div class="col-4">
					<h4>Toán: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="math" id="math"
					value = "<?php 
						echo isset($_POST['math']) ? $_POST['math'] : 0
					 ?>" autocomplete="off">
				</div>

				<div class="col-4">
					<h4>Ngữ Văn: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="vnamese" id="vnamese" 
					value = "<?php 
						echo isset($_POST['vnamese']) ? $_POST['vnamese'] : 0
					 ?>" autocomplete="off">
				</div>

				<div class="col-4">
					<h4>Anh Văn: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="forlang" id="forlang" 
					value = "<?php 
						echo isset($_POST['forlang']) ? $_POST['forlang'] : 0
					 ?>" autocomplete="off">
				</div>
				<div class="col-4">
					<h4>Lý: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="physics" id="physics" 
					value = "<?php 
						echo isset($_POST['physics']) ? $_POST['physics'] : 0
					 ?>" autocomplete="off">
				</div>

				<div class="col-4">
					<h4>Hóa: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="chemistry" id="chemistry" 
					value = "<?php 
						echo isset($_POST['chemistry']) ? $_POST['chemistry'] : 0
					 ?>" autocomplete="off">
				</div>

				<div class="col-4">
				</div>
				<div class="col-8">
					<button id="submit" class="btn btn-outline-dark">Xem kết quả</button>
					<button id="submit_2" class="btn btn-outline-dark">Dự đoán các học kỳ sau</button>
				</div>
				<div class="col-4"></div>
				<div class="col-8">
					<button  
						class="btn btn-primary btn-outline-dark"
						onclick="window.location.assign('file_upload.php')">Nhập từ file
					</button>
				</div>
				<div class="col-12">
					<hr>
				</div>
			</div>
			<div class="col-6">
				<div id="content" class="col-12"></div>
		 		<div id="content_2" class="col-12"></div>
			</div>
		</div>
	 </div>
	 
	 <script type="text/javascript">
	 	$(document).ready(function(){
		 	$('#submit').click( () => {
				var name = $("#name").val();
				var math = $("#math").val();
				var vnamese = $("#vnamese").val();
				var forlang = $("#forlang").val();
				var physics = $("#physics").val();
				var chemistry = $("#chemistry").val();

				handleOnce(name, math, vnamese, forlang, physics, chemistry);
		 	});

		 	$('#submit_2').click(() => {
		 		var name = $("#name").val();
				var math = $("#math").val();
				var vnamese = $("#vnamese").val();
				var forlang = $("#forlang").val();
				var physics = $("#physics").val();
				var chemistry = $("#chemistry").val();

				handleMultiple(name, math, vnamese, forlang, physics, chemistry);
		 	});
		 });
	 </script>
</body>
</html>