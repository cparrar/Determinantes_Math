<?php
    
    namespace Services\Calculate;
    
    class Determinant {
        
        /**
         * @var array
         */
        private $array;
        
        /**
         * @var array
         */
        private $determinant;
        
        private $result;
        
        /**
         * Determinant::__construct()
         * 
         * @param mixed $array
         * @return void
         */
        function __construct(array $array = []) {
            $this->array = $array;
            
        }
        
        /**
         * Determinant::setCalculate()
         * 
         * @return integer
         */
        private function setCalculate() {
            $count = count($this->array);
            
            if($count > 3) {
                
            }
            else {
                $det = new DetThree($this->array);
                return $det->getDet();
            }
        }
        
        private function setCalculateDet() {
            $column = 0;
            foreach ($this->array AS $row => $value) {
                
            }
        }
        
        private function 
    }