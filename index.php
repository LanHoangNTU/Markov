<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Markov</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

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
					<input type="text" name="name" id="name" placeholder="Nhập tên...">
				</div>
				<div class="col-4">
					<h4>Toán: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="math" id="math" value='0'>
				</div>

				<div class="col-4">
					<h4>Ngữ Văn: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="vnamese" id="vnamese" value='0'>
				</div>

				<div class="col-4">
					<h4>Anh Văn: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="forlang" id="forlang" value='0'>
				</div>
				<div class="col-4">
					<h4>Lý: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="physics" id="physics" value='0'>
				</div>

				<div class="col-4">
					<h4>Hóa: </h4>
				</div>
				<div class="col-8">
					<input type="number" name="chemistry" id="chemistry" value='0'>
				</div>

				<div class="col-4">
				</div>
				<div class="col-8">
					<button id="submit" class="btn btn-outline-dark">Xem kết quả</button>
					<button id="submit_2" class="btn btn-outline-dark">Xem kết quả</button>
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
	 	$('#submit').click(function(){
	 		
	 			var name = $("#name").val();
	 			var math = $("#math").val();
	 			var vnamese = $("#vnamese").val();
	 			var forlang = $("#forlang").val();
	 			var physics = $("#physics").val();
	 			var chemistry = $("#chemistry").val();

	 			var form_data = new FormData();
	 			form_data.append("name", name);
	 			form_data.append("math", math);
	 			form_data.append("vnamese", vnamese);
	 			form_data.append("forlang", forlang);
	 			form_data.append("physics", physics);
	 			form_data.append("chemistry", chemistry);

	 			$.ajax({
	 				type: 'POST',
    				url: 'ajax_read.php',
    				data: form_data,
    				contentType: false,
					cache: false,
					processData: false,
    				success:function(data){
    					$("#content").html(data);
    				},
    				error:function(){
    					console.log("failed");
    				}
	 			})

	 			$.ajax({
	 				type: 'POST',
    				url: 'ajax_potential.php',
    				data: form_data,
    				contentType: false,
					cache: false,
					processData: false,
    				success:function(data){
    					$("#content_2").html(data);
    				},
    				error:function(){
    					console.log("failed");
    				}
	 			})
	 	});

	 	$('#submit_2').click(function(){
	 		
	 			var name = $("#name").val();
	 			var math = $("#math").val();
	 			var vnamese = $("#vnamese").val();
	 			var forlang = $("#forlang").val();
	 			var physics = $("#physics").val();
	 			var chemistry = $("#chemistry").val();

	 			var form_data = new FormData();
	 			form_data.append("name", name);
	 			form_data.append("math", math);
	 			form_data.append("vnamese", vnamese);
	 			form_data.append("forlang", forlang);
	 			form_data.append("physics", physics);
	 			form_data.append("chemistry", chemistry);

	 			$.ajax({
	 				type: 'POST',
    				url: 'ajax_full_potential.php',
    				data: form_data,
    				contentType: false,
					cache: false,
					processData: false,
    				success:function(data){
    					$("#content_2").html(data);
    				},
    				error:function(){
    					console.log("failed");
    				}
	 			})
	 	});
	 </script>
</body>
</html>