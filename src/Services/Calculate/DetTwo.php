<?php
    
    namespace Services\Calculate;
    
    use Services\Intefaces\InterfaceCalculate;
    
    /**
     * class DetTwo
     */
    class DetTwo implements InterfaceCalculate {
        
        /**
         * @var array
         */
        private $array;
        
        /**
         * DetTwo::__construct()
         * 
         * @param mixed $array
         * @return void
         */
        function __construct(array $array = []) {
            $this->array = $array;
        }
        
        /**
         * DetTwo::getArray()
         * 
         * @return array
         */
        private function getArray() {
            return $this->array;
        }
        
        /**
         * DetTwo::getDet()
         * 
         * @return int
         */
        public function getDet() {
            return ($this->array[0][0] * $this->array[1][1]) - ($this->array[0][1] * $this->array[1][0]);
        }
        
        /**
         * DetTwo::getRule()
         * 
         * @return string
         */
        public function getRule() {
            
            return sprintf(
                'det A = [%s] - [%s] = %s',
                $this->array[0][0] * $this->array[1][1],
                $this->array[0][1] * $this->array[1][0],
                $this->getDet()
            );
        }
        
        /**
         * DetTwo::getRules()
         * 
         * @return string
         */
        public function getRules() {
            
            return sprintf(
                'det A = [%s*%s] - [%s*%s] = %s', 
                $this->array[0][0], 
                $this->array[1][1], 
                $this->array[0][1], 
                $this->array[1][0],
                $this->getDet()
            );
        }
    }