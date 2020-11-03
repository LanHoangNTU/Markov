<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		session_start();
		require_once('laws.php');

		function show($arr)
		{
			
			$str = "";
			foreach ($arr as $key => $value) {
				if ($value > 0) {
					$str = $str.$key.": ".$value."%"." ";
				}
			}

			return $str;
		}

		if (isset($_SESSION['array'])) {
			$array = $_SESSION['array'];
			echo "<table border='1' style='border-collapse: collapse;'>";
			echo 
			"<tr>
				<th>STT</th>
				<th>Họ và tên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Tiếng Việt</th>
				<th>Toán</th>
				<th>Ngoại ngữ</th>
				<th>Năng khiếu</th>
			</tr>";
			foreach ($array as $row) {
		 			echo "<tr>";
		 			echo "<td>".$row[0]."</td>";
		 			echo "<td>".$row[1]."</td>";
		 			echo "<td>".$row[2]."</td>";
		 			echo "<td>".($row[3]=="X"?"Nữ":"Nam")."</td>";
		 			echo "<td>".$row[5]."</td>";
		 			echo "<td>".$row[7]."</td>";
		 			echo "<td>".$row[10]."</td>";
		 			echo "<td>".(show($llist->potential($row[5], $row[7], $row[10])))."</td>";
		 			echo "</tr>";
		 		}
		 		echo "</table>";
		}
		
	 ?>
</body>
</html>