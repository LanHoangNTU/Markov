<?php 
	class Condition
	{
		public $subject;
		public $comparator;
		public $score;
		const GT = ">";
		const LT = "<";
		const EGT = ">=";
		const ELT = "<=";

		public function __construct($subject, $comparator, $score)
		{
			$this->subject = $subject;
			$this->comparator = $comparator;
			$this->score = $score;
		}

		public function show(){
			return $this->subject." ".$this->comparator." ".$this->score;
		}

		public function checkCondition($my_score){
			switch ($this->comparator) {
				case self::GT:
					return ($my_score > $this->score);
					break;

				case self::EGT:
					return ($my_score >= $this->score);
					break;

				case self::LT:
					return ($my_score < $this->score);
					break;

				case self::ELT:
					return ($my_score <= $this->score);
					break;
			}
		}
	}
 ?>