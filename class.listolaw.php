<?php 
	require_once('class.law.php');

	class LawList
	{
		public $list_o_law;

		public function potential($math, $vnmese, $forlang, $physics, $chemistry){
			$arr = array("TO"=>0,"NV"=>0,"NN"=>0,"VL"=>0,"HH"=>0);
			$s = 0;
			foreach ($this->list_o_law as $law) {
				foreach ($law->list_condition as $condition) {
					switch ($condition->subject) {
						case 'TO':
							if($condition->checkCondition($math)){
								$arr[$law->conclusion]++;
								$s++;
							}	
							break;
						case 'NV':
							if($condition->checkCondition($vnmese)){
								$arr[$law->conclusion]++;
								$s++;
							}	
							break;
						case 'NN':
							if($condition->checkCondition($forlang)){
								$arr[$law->conclusion]++;
								$s++;
							}	
							break;
						case 'VL':
							if($condition->checkCondition($physics)){
								$arr[$law->conclusion]++;
								$s++;
							}	
							break;
						case 'HH':
							if($condition->checkCondition($chemistry)){
								$arr[$law->conclusion]++;
								$s++;
							}	
							break;
						
						default:
							echo "loi khong co subject";
							break;
					}
				}
			}

			foreach ($arr as $key => $value) {
				$arr[$key] = round($arr[$key] / $s * 100,3);
			}

			return $arr;
		}
	}

 ?>