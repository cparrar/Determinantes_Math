<?php
    
    namespace Services;
    
    class Determinant {
        
        /**
         * @var array
         */
        private $array;
        
        /**
         * @var integer
         */
        private $type;
        
        /**
         * @var array
         */
        private $add;
        
        /**
         * @var array
         */
        private $subtract;
        
        /**
         * Determinant::__construct()
         * 
         * @param mixed $array
         * @return void
         */
        function __construct(array $array = []) {
            
            $this->array = $array;
            $this->type = count($array);
        }
        
        private function process() {
            
            $indexKey = 1;
            $addKey = 0;
            $substractKey = $this->type - 1;
            
        }
        
        private function readMatrixAdd(array $array = [], $index = 0) {
            
            $list = [];
            foreach ($array AS $key => $value) {
                
            }
        }
    }