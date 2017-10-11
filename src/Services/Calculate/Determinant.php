<?php
    
    namespace Services\Calculate;
    
    use Services\Calculate\multiply;

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
         * @var int
         */
        private $result;

        /**
         * Determinant::__construct()
         *
         * @param mixed $array
         */
        function __construct(array $array = []) {
            $this->array = $array;
            $this->result = $this->setCalculate();
            
        }

        /**
         * @return int
         */
        public function getDet() {

            return $this->result;
        }
        
        /**
         * Determinant::setCalculate()
         * 
         * @return integer
         */
        private function setCalculate() {
            $count = count($this->array);
            
            if($count > 3) {
                return $this->setCalculateDet();
            }
            else {
                $det = new DetThree($this->array);
                return $det->getDet();
            }
        }

        /**
         * @return int
         */
        private function setCalculateDet() {
            $column = 0;
            foreach ($this->array AS $row => $value) {
                $this->determinant[] = $this->setCalculateDetAttached($column, $row);
            }

            return $this->getResult();
        }

        /**
         * @param null $column
         * @param null $row
         * @return integer
         */
        private function setCalculateDetAttached($column = null, $row = null) {

            $list = [];

            foreach ($this->array AS $key => $value) {
                if($key != $row) {
                    $list[] = $this->setCalculateDetRowFormat($column, $value);
                }
            }

            $multiply = new multiply($this->array[$row][$column], $list);
            unset($column, $row, $key, $value, $list);
            dump($multiply->getArray());
            $det = new self($multiply->getArray());
            return $det->getDet();
        }

        /**
         * @param null $column
         * @param array $array
         * @return array
         */
        private function setCalculateDetRowFormat($column = null, $array = []) {
            $list = [];
            foreach ($array AS $key => $value) {
                if($key != $column) {
                    $list[] = $value;
                }
            }
            unset($column, $array, $key, $value);
            return $list;
        }

        /**
         * @return int
         */
        private function getResult() {

            $total = 0;
            foreach ($this->determinant AS $key => $number) {
                if($key > 0) {
                    if($key % 2 == 0) {
                        $total = $total + $number;
                    }
                    else {
                        $total = $total - $number;
                    }
                }
                else {
                    $total = $total + $number;
                }
            }
            return $total;
        }
    }