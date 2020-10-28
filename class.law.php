<?php
	require_once('class.condition.php');

	class Law
	{
		public $list_condition;
		public $conclusion;

		function __construct($list_condition, $conclusion){
			$this->list_condition = $list_condition;
			$this->conclusion = $conclusion;
		}

		public function show(){
			$conditions = "";
			foreach ($this->list_condition as $item) {
				$conditions = $conditions.($item->show());
			}

			echo $conditions;
		}
	}

	$array = array();
	$array[] = new Condition("NV", "<=", 8.5);
	$array[] = new Condition("TO", ">=", 9.5);
	$array[] = new Condition("AV", "<", 9.5);
	
	$law = new Law($array, "Toan");

	$law->show();
 ?>