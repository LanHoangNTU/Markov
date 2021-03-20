<?php 
	session_start();
	require_once('laws.php');
	require_once('class.array2d.php');
	require_once('class.matrixhandler.php');
	require_once('class.potentialmatrix.php');

	$name = $_POST['name'];
	$math = $_POST['math'];
	$vnamese = $_POST['vnamese'];
	$forlang = $_POST['forlang'];
	$physics = $_POST['physics'];
	$chemistry = $_POST['chemistry'];
	$n = isset($_POST['n']) ? $_POST['n'] : 5;

	$data = "<table class='table table-bordered' align='center' width='100%'>";
	$data .= 
	"<thead class='thead-light'><tr>
		<th>Chu kỳ</th>
		<th>Toán</th>
	 	<th>Hóa học</th>
	 	<th>Vật lý</th>
	 	<th>Anh văn</th>
	 	<th>Ngữ văn</th>
	</tr></thead>";

	$initial_potential = $llist->potential($math, $vnamese, $forlang, $physics, $chemistry);
	$potential = null;
	$matrix = new Array2D();
	$matrix->configure(PotentialMatrixConstant::matrix);

	$data .= "<tbody>";

	if (!empty($initial_potential)) {
		for ($i=0; $i < $n; $i++) { 
			if ($potential == null) {
				$potential = new Array2D();
				$potential->configure(
				array(array(
					$initial_potential["TO"], 
					$initial_potential["VL"], 
					$initial_potential["HH"], 
					$initial_potential["NN"], 
					$initial_potential["NV"]
				)));
			}
			else {
				$potential = MatrixHandler::multiplyArray2D($potential, $matrix);
			}
			
			$potential_format = MatrixHandler::format($potential);
			$data .= "<tr>";
				$data .= "<th>n".$i."</th>";
			 	$data .= "<th>".$potential_format->getValueAt(0, 0)." %</th>";
			 	$data .= "<th>".$potential_format->getValueAt(0, 1)." %</th>";
			 	$data .= "<th>".$potential_format->getValueAt(0, 2)." %</th>";
			 	$data .= "<th>".$potential_format->getValueAt(0, 3)." %</th>";
			 	$data .= "<th>".$potential_format->getValueAt(0, 4)." %</th>";
		 	$data .= "</tr>";
		}
	}
	else {
		$data .= "<tr>";
			$data .= "<th>0</th>";
		 	$data .= "<th>0 %</th>";
		 	$data .= "<th>0 %</th>";
		 	$data .= "<th>0 %</th>";
		 	$data .= "<th>0 %</th>";
		 	$data .= "<th>0 %</th>";
		$data .= "</tr>";
	}

	$data .= "</tbody></table>";
 	echo $data;
 ?>