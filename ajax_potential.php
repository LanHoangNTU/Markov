	<?php
		session_start();
		require_once('laws.php');
		require_once('class.matrixhandler.php');

		$name = $_POST['name'];
		$math = $_POST['math'];
		$vnamese = $_POST['vnamese'];
		$forlang = $_POST['forlang'];
		$physics = $_POST['physics'];
		$chemistry = $_POST['chemistry'];

		
			$data = "<table class='table table-bordered' align='center' width='100%'>";
			$data .= 
			"<thead class='thead-light'><tr>
				<th>Họ và tên</th>
				<th>$name</th>
			</tr></thead>";

			$potential = $llist->potential($math, $vnamese, $forlang, $physics, $chemistry);
			$potential = MatrixHandler::formatArray($potential);
			$isEmpty = empty($potential);

			$data .= "<tbody>";
		 	$data .= "<tr><th>Toán</th><th>".      ($isEmpty ? 0 : $potential["TO"])." %</th></tr>";
		 	$data .= "<tr><th>Tiếng Việt</th><th>".($isEmpty ? 0 : $potential["NV"])." %</th></tr>";
		 	$data .= "<tr><th>Anh Văn</th><th>".   ($isEmpty ? 0 : $potential["NN"])." %</th></tr>";
		 	$data .= "<tr><th>Vật Lý</th><th>".	   ($isEmpty ? 0 : $potential["VL"])." %</th></tr>";
		 	$data .= "<tr><th>Hóa Học</th><th>".   ($isEmpty ? 0 : $potential["HH"])." %</th></tr>";
		 	$data .= "</tbody></table>";

		 	echo $data;
		
	 ?>