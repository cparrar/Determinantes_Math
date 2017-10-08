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
        
        /**
         * Determinant::__construct()
         * 
         * @param mixed $array
         * @return void
         */
        function __construct(array $array = []) {
            $this->array = $array;
            $this->calculate();
        }
        
        public function getDet() {
            return $this->determinant;
        }
        
        private function calculate() {
            $column = 0;
            foreach ($this->array AS $row => $array) {
                $this->determinant[] = $this->formatDeterminant($row, $column);
                $column++;
            }
        }
        
        
        
        private function formatDeterminant($row, $column) {
           
           foreach ($this->array AS $key => $array) {
                $list = [];
                if($key != $row) {
                    $list[] = $this->formatDeterminantColumns($column, $array);
                }
                unset($row, $column, $key, $array);
                return $list;
           } 
        }
        
        /**
         * Determinant::formatDeterminantColumns()
         * 
         * @param mixed $column
         * @param mixed $array
         * @return array
         */
        private function formatDeterminantColumns($column = null, array $array = []) {
            $list = [];
            foreach ($array AS $key => $value) {
                if($key != $column) {
                    $list[] = $value;
                }
            }
            unset($column, $array, $key, $value);
            return $list;
        }
        
        private function getDeterminant($column = null, array $array = []) {
            $count = count($array);
            $multiply = new \Services\Calculate\multiply($column, $array);
            if($count > 3) {
                $det = new self($multiply->getArray());
                unset($column, $array, $count, $multiply);
                return $det->getDet();
            }
            else {
                $det = new \Services\Calculate\DetThree($array);
                unset($column, $array, $count, $multiply);
                return $det->getDet();
            }
        }
    }