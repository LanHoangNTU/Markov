<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		$array = array();

		if (isset($_POST['submit']) && isset($_FILES["upload"])) {
			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES["upload"]["name"]);
			move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
			$fp = fopen($target_file, "r");

			while(($line = fgets($fp)) != null){
				$sub_array = explode(",", $line);
				$array[] = $sub_array;
			}

			session_start();
			$_SESSION['array'] = $array;

			fclose($fp);
		}

		if (isset($_POST['potential']) && isset($_FILES["upload"])) {
			header("Location: potential.php");
		}
	 ?>
	 <form action="" method="POST" enctype="multipart/form-data">
	 	<input type="file" name="upload" id="upload">
	 	<input type="submit" name="submit" value="Submit">
	 	<input type="submit" name="potential" value="Potential">
	 </form>
	 <table border="1">
	 	<?php 
	 		if(isset($_POST['submit'])){
	 			
		 		foreach ($array as $row) {
		 			echo "<tr>";
		 			echo "<td>".$row[0]."</td>";
		 			echo "<td>".$row[1]."</td>";
		 			echo "<td>".$row[2]."</td>";
		 			echo "<td>".($row[3]=="X"?"Nữ":"Nam")."</td>";
		 			echo "<td>".$row[4]."</td>";
		 			echo "<td>".$row[5]."</td>";
		 			echo "<td>".$row[6]."</td>";
		 			echo "<td>".$row[7]."</td>";
		 			echo "<td>".$row[8]."</td>";
		 			echo "<td>".$row[9]."</td>";
		 			echo "<td>".$row[10]."</td>";
		 			echo "<td>".$row[11]."</td>";
		 			echo "</tr>";
		 		}
		 	}
	 	 ?>
	 </table>
</body>
</html>