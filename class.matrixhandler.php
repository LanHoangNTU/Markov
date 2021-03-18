<?php 
	require_once('class.array2d.php');

	class MatrixHandler
	{
		const MIN = 1;
		const MAX = 255;

		private static function validate($m, $n_1, $n_2, $p){
			return (
				$m < self::MIN || $m > self::MAX ||
				$p < self::MIN || $p > self::MAX ||
				$n_1 < self::MIN || $n_2 > self::MAX ||
				$n_2 < self::MIN || $n_2 > self::MAX ||
				$n_1 != $n_2
			);
		}
		
		public static function multiplyArray2D(Array2D $mat_1, Array2D $mat_2): Array2D{
			$m = $mat_1->getNumRows();
			$n_1 = $mat_1->getNumCols();
			$n_2 = $mat_2->getNumRows();
			$p = $mat_2->getNumCols();

			if(!self::validate($m, $n_1, $n_2, $p)){ 
			    $result = new Array2D();
			    for ($i=0; $i < $m; $i++) { 
					$result->addRow();

					for ($j=0; $j < $p; $j++) {
						$value = 0;
						for ($k=0; $k < $n_1; $k++) { 
							$value += $mat_1->getValueAt($i, $k) * $mat_2->getValueAt($k, $j);
						}
						$result->setValueAt($i, $j, $value);
					}
				}
				
				return $result;
			}
			else{
				error_log($m." ".$n_1." ".$n_2." ".$p);
				return null;
			}
		}

		public static function multiply($mat_1, $mat_2){
			$m = count($mat_1);
			$n_1 = count($mat_1[0]);
			$n_2 = count($mat_2);
			$p = count($mat_2[0]);

			if(!self::validate($m, $n_1, $n_2, $p)){ 
			    $result = array();
			    for ($i=0; $i < $m; $i++) { 
					$r_rows = array();
					for ($j=0; $j < $p; $j++) { 
						$value = 0;
						for ($k=0; $k < $n_1; $k++) { 
							$value += $mat_1[$i][$k] * $mat_2[$k][$j];
						}
						$r_rows[] = $value;
					}
				}
				
				return $result;
			}
			else{
				return "Void";
			}
		}



		public function format($potential) {
			$matrix = new Array2D();
			for ($i=0; $i < count($potential->getArray()); $i++) { 
				$matrix->addRow();
				for ($j=0; $j < count($potential->getArray()[0]); $j++) { 
					$matrix->setValueAt($i, $j, round( $potential->getValueAt($i, $j) * 100, 2) );
				}
			}
			return $matrix;
		}

		public function formatArray($arr) {
			foreach ($arr as $key => $value) {
				$arr[$key] = round($arr[$key] * 100, 3);
			}

			return $arr;
		}
	}
 ?>