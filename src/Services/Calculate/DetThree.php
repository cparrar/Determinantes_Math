<?php
    
    namespace Services\Calculate;
    
    use Services\Intefaces\InterfaceCalculate;
    
    /**
     * class DetThree
     */
    class DetThree implements InterfaceCalculate {
        
        /**
         * @var array
         */
        private $array;
        
        /**
         * DetThree::__construct()
         * 
         * @param mixed $array
         * @return void
         */
        function __construct(array $array = []) {
            $this->array = $array;
        }
        
        /**
         * DetThree::getArray()
         * 
         * @return array
         */
        public function getArray() {
            return $this->array;
        }
        
        /**
         * DetThree::getRule()
         * 
         * @return string
         */
        public function getRule() {
            
            return sprintf(
                'det A = [%s] + [%s] + [%s] - [%s] - [%s] - [%s] = %s',
                $this->multiply([0, 0], [1, 1], [2, 2]),
                $this->multiply([1, 0], [2, 1], [0, 2]),
                $this->multiply([2, 0], [0, 1], [1, 2]),
                $this->multiply([0, 2], [1, 1], [2, 0]),
                $this->multiply([1, 2], [2, 1], [0, 0]),
                $this->multiply([2, 2], [0, 1], [1, 0]),
                $this->getDet()
            );
        }
        
        /**
         * DetThree::getRules()
         * 
         * @return string
         */
        public function getRules() {
            
            return sprintf(
                'det A = [%s*%s*%s] + [%s*%s*%s] + [%s*%s*%s] - [%s*%s*%s] - [%s*%s*%s] -[%s*%s*%s] = %s',
                $this->array[0][0],
                $this->array[1][1],
                $this->array[2][2],
                $this->array[1][0],
                $this->array[2][1],
                $this->array[0][2],
                $this->array[2][0],
                $this->array[0][1],
                $this->array[1][2],
                $this->array[0][2],
                $this->array[1][1],
                $this->array[2][0],
                $this->array[1][2],
                $this->array[2][1],
                $this->array[0][0],
                $this->array[2][2],
                $this->array[0][1],
                $this->array[1][0],
                $this->getDet()
            );
        }
        
        /**
         * DetThree::getDet()
         * 
         * @return int
         */
        public function getDet() {
            
            return $this->multiply([0, 0], [1, 1], [2, 2]) + $this->multiply([1, 0], [2, 1], [0, 2]) + $this->multiply([2, 0], [0, 1], [1, 2]) - 
            $this->multiply([0, 2], [1, 1], [2, 0]) - $this->multiply([1, 2], [2, 1], [0, 0]) - $this->multiply([2, 2], [0, 1], [1, 0]);
        }
        
        /**
         * DetThree::multiply()
         * 
         * @param array $first
         * @param array $second
         * @param array $third
         * @return int
         */
        private function multiply(array $first = [], array $second = [], array $third = []) {
            return $this->getKeys($first) * $this->getKeys($second) * $this->getKeys($third);
        }
        
        /**
         * DetThree::getKeys()
         * 
         * @param mixed $array
         * @return int
         */
        private function getKeys(array $array = []) {
            list($row, $column) = $array;
            return $this->array[$row][$column];
        }
    }