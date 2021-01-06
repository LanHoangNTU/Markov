<?php 
    class Array2D
    {
        private $array;
    
        public function getRows($index){
            if($index < $this->num_rows && $index >= 0)
                return $this->array[$index];
            else
                throw new Exception("Invalid row index");
        }

        public function configure($array){
            $this->array = $array;
        }

        public function addRow(){
            $this->array[] = array();

            return $this;
        }

        public function getValueAt($row, $col){
            return $this->array[$row][$col];
        }

        public function setValueAt($row, $col, $value){
            $this->array[$row][$col] = $value;
        }

        public function getArray()
        {
            return $this->array;
        }

        public function getNumRows(){
            return count($this->array);
        }

        public function getNumCols(){
            return count($this->array[0]);
        }
}
    
?>