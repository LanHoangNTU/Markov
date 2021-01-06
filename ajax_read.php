<?php 
	require_once("laws.php");
	function show($arr)
	{
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

	$name = $_POST['name'];
	$math = $_POST['math'];
	$vnamese = $_POST['vnamese'];
	$forlang = $_POST['forlang'];
	$physics = $_POST['physics'];
	$chemistry = $_POST['chemistry'];

	$data = "<p>Bạn ".$name." có các năng khiếu ".show($llist->potential($math, $vnamese, $forlang, $physics, $chemistry))."</p>";

	echo $data;
 ?>