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
</head>
<body>
	<?php
	 ?>
	 <div class="container-fluid text-right mt-5">
	 	<div>
		 	<input class="btn btn-info" type="file" name="upload" id="upload">
		 	<input class="btn btn-info" type="submit" name="submit" id="submit" value="Bắt đầu">

		 	<button class="btn btn-outline-dark" onclick="window.location.assign('index.php')">Nhập từ bàn phím</button>
		 </div>
		 <div id="content">
		 </div>
	 </div>
	 <script type="text/javascript">
	 	$(document).ready(function(){
		 	$('#submit').click( () => {
				var file = document.getElementById('upload').files[0];

				handleFile(file);
		 	});
		 });
	 </script>
</body>
</html>