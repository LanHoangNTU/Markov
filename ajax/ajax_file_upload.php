<?php 
	require_once("../laws.php");
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
		$target_dir = "../uploads/";
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
				$sub_array_with_key[preg_replace('/\s+/', '', $header[$i])] = 
					($i > 0 
						? preg_replace('/\s+/', '', $sub_array[$i])
						: $sub_array[$i]
					);
			}
			$array[] = $sub_array_with_key;
		}

		fclose($fp);
	}
	$data = '<table class="table table-bordered text-center" align="center">';
	 
 	
	$str = "STT,Họ và tên,Ngày sinh,Tiếng Việt,Toán,Hóa học,Vật lý,Ngoại Ngữ,Năng Khiếu\n";
	$f_arr = explode(".", $file_name);
	$f_type = array_pop($f_arr);
	$new_f_name = implode(".", $f_arr)."_potential.csv";

	$fp = fopen("../uploads/".$new_f_name, "w");
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
			<th></th>
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

			$form_data = '<form action="index.php" method="POST">
				<input type="hidden" id="name" name="name" value="'.$row[$header[0]].'">
				<input type="hidden" id="math" name="math" value="'.$row["TO"].'">
				<input type="hidden" id="vnamese" name="vnamese" value="'.$row["NV"].'">
				<input type="hidden" id="forlang" name="forlang" value="'.$row["NN"].'">
				<input type="hidden" id="physics" name="physics" value="'.$row["VL"].'">
				<input type="hidden" id="chemistry" name="chemistry" value="'.$row["HH"].'">
				<input type="submit" value="Chi tiết">
			</form>';

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
			$data .= "<td>".$form_data."</td>";
			$data .= "</tr></tbody>";
		}
		fputs($fp, $str);
	fclose($fp);
		 
	$data .= '</table>';

	echo $data;
 ?>