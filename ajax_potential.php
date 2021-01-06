	<?php
		session_start();
		require_once('laws.php');

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

			$data .= "<tbody>";
		 	$data .= "<tr><th>Toán</th><th>".$potential["TO"]." %</th></tr>";
		 	$data .= "<tr><th>Tiếng Việt</th><th>".$potential["NV"]." %</th></tr>";
		 	$data .= "<tr><th>Anh Văn</th><th>".$potential["NN"]." %</th></tr>";
		 	$data .= "<tr><th>Vật Lý</th><th>".$potential["VL"]." %</th></tr>";
		 	$data .= "<tr><th>Hóa Học</th><th>".$potential["HH"]." %</th></tr>";
		 	$data .= "</tbody></table>";

		 	echo $data;
		
	 ?>