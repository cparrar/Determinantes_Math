<?php
    
    namespace Services\Calculate;
    
    class multiply {
        
        private $number;
        private $array;
        
        /**
         * multiply::__construct()
         * 
         * @param mixed $number
         * @param mixed $array
         * @return void
         */
        function __construct($number = null, array $array = []) {
            
            $this->number = $number;
            $this->array = $this->calculate($array);
        }
        
        /**
         * multiply::getArray()
         * 
         * @return array
         */
        public function getArray() {
            return $this->array;
        }
        
        /**
         * multiply::calculate()
         * 
         * @param mixed $array
         * @return array
         */
        private function calculate($array = []) {
            
            $list = [];
            foreach ($array AS $values) {
                $list[] = $this->multiply($values);
            }
            unset($array, $values);
            return $list;
        }
        
        /**
         * multiply::multiply()
         * 
         * @param mixed $array
         * @return array
         */
        private function multiply($array = []) {
            
            $list = [];
            foreach ($array AS $value) {
                $list[] = $this->number * $value;
            }
            unset($array, $value);
            return $list;
        }
    }