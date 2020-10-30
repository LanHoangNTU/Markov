<?php 
	require_once('class.law.php');

	class LawList
	{
		public $list_o_law;

		public function potential($math, $vnmese, $forlang){
			$arr = array("TO"=>0,"NV"=>0,"NN"=>0);
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

	$array = array();
	$llist = new LawList();

	$array[] = new Condition("NV", "<=", 8.5);
	$array[] = new Condition("TO", ">=", 9.5);
	$array[] = new Condition("NN", "<", 9.5);
	$law = new Law($array, "TO");
	$llist->list_o_law[] = $law;

	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", "<", 9.5);
	$array[2] = new Condition("NN", ">", 9.5);
	$law1 = new Law($array, "NN");
	$llist->list_o_law[] = $law1;

	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", ">=", 9.0);
	$array[2] = new Condition("NN", "<", 9.0);
	$law2 = new Law($array, "TO");
	$llist->list_o_law[] = $law2;

 ?>