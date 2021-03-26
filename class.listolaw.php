<?php 
	require_once('class.law.php');

	class LawList
	{
		public $list_o_law;

		public function potential($math, $vnmese, $forlang, $physics, $chemistry){
			$arr = array("TO"=>0,"NV"=>0,"NN"=>0,"VL"=>0,"HH"=>0);
			$scores = array(
				"TO"=>$math,
				"NV"=>$vnmese,
				"NN"=>$forlang,
				"VL"=>$physics,
				"HH"=>$chemistry
			);
			$s = 0;
			foreach ($this->list_o_law as $law) {
				$k = true;
				foreach ($law->list_condition as $condition) {
					// Kiem tra dieu kien
					foreach ($scores as $key => $score) {
						if ($condition->subject == $key && !$condition->checkCondition($score)) {
							$k = false;
						}

						if(!$k) break;
					}
				}

				if ($k == true) {
					$arr[$law->conclusion]++;
					$s++;
				}
			}

			foreach ($arr as $key => $value) {
				$arr[$key] = $s == 0 ? 0 : round($arr[$key] / $s, 3);
			}

			return $s == 0 ? array() : $arr;
		}
	}

 ?>