<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Markov</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		require_once("laws.php");
		function show($arr)
		{
			if (empty($arr)) {
				return null;
			}

			$a_str = array();
			$max = max($arr);
			foreach ($arr as $key => $value) {
				if ($value == $max) {
					switch ($key) {
						case 'TO':
							$a_str[] = "Toán";
							break;
						case 'NV':
							$a_str[] = "Tiếng Việt";
							break;
						case 'NN':
							$a_str[] = "Anh Văn";
							break;
						case 'VL':
							$a_str[] = "Vật Lý";
							break;
						case 'HH':
							$a_str[] = "Hóa Học";
							break;
					}
				}
			}
			return implode(" - ", $a_str);
		}
		$array = array();

		if (isset($_FILES["upload"]) && !empty($_FILES["upload"]["name"])) {
			$target_dir = "uploads/";
			$file_name = basename($_FILES["upload"]["name"]);
			$target_file = $target_dir.$file_name;
			move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
			$fp = fopen($target_file, "r");
			$header = explode(",", fgets($fp));
			for ($i=0; $i < count($header); $i++) { 
				$header[$i] = preg_replace('/\s+/', '', $header[$i]);
			}
			
			while(($line = fgets($fp)) != null){
				$sub_array = explode(",", $line);
				$sub_array_with_key = array();
				for ($i=0; $i < count($header); $i++) { 
					$sub_array_with_key[preg_replace('/\s+/', '', $header[$i])] = $sub_array[$i];
				}
				$array[] = $sub_array_with_key;
			}

			fclose($fp);
		}
	 ?>
	 <div class="container-fluid text-center mt-5">
		 <form class="mb-2" action="" method="POST" enctype="multipart/form-data">
		 	<input class="btn btn-info" type="file" name="upload" id="upload">
		 	<input class="btn btn-info" type="submit" name="submit" id="submit" value="Submit">
		 	<input class="btn btn-info" type="button" name="potential" id="potential" value="Details">

		 	<!-- <input type="submit" name="outfile" value="Save to file"> -->
		 </form>
		 <button class="btn btn-outline-dark" onclick="window.location.assign('index.php')">Nhập từ bàn phím</button>
		 <div id="content">
		 	<?php 
		 		$data = '<table class="table table-bordered" align="center">';
	 
			 	if(!empty($_POST)){
			 		$str = "STT,Họ và tên,Ngày sinh,Tiếng Việt,Toán,Hóa học,Vật lý,Ngoại Ngữ,Năng Khiếu\n";
					$f_arr = explode(".", $file_name);
					$f_type = array_pop($f_arr);
					$new_f_name = implode(".", $f_arr)."_potential.csv";

					$fp = fopen("uploads/".$new_f_name, "w");
					$data .=  
						"<thead class='thead-light'><tr>
							<th>Họ và tên</th>
							<th>Ngày sinh</th>
							<th>Tiếng Việt</th>
							<th>Toán</th>
							<th>Hóa học</th>
							<th>Vật lý</th>
							<th>Ngoại ngữ</th>
							<th>Năng khiếu</th>
						</tr></thead>";
					$data .= "<tbody>";

			 		foreach ($array as $row) {
			 			$potent = show(
			 				$llist->potential(
				 				$row["TO"], 
				 				$row["NV"], 
				 				$row["NN"], 
				 				$row["VL"], 
				 				$row["HH"]
			 				)
			 			);

			 			$str .= implode(",", $row).$potent.",\n";
			 			$data .= "<tr>";
			 			$data .= "<th>".$row[$header[0]]."</th>";
			 			$data .= "<td>".$row["ngay_sinh"]."</td>";
			 			$data .= "<td>".$row["NV"]."</td>";
			 			$data .= "<td>".$row["TO"]."</td>";
			 			$data .= "<td>".$row["HH"]."</td>";
			 			$data .= "<td>".$row["VL"]."</td>";
			 			$data .= "<td>".$row["NN"]."</td>";
			 			$data .= "<td>".$potent."</td>";
			 			$data .= "</tr></tbody>";
			 		}
			 		fputs($fp, $str);
					fclose($fp);
			 	}
					 
				$data .= '</table>';

				echo $data;
		 	 ?>
		 </div>
	 </div>

</body>
</html>