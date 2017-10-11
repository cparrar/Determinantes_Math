<?php
    
    namespace Command;
    
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Output\OutputInterface;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Style\SymfonyStyle;
    
    class CalculateCommand extends Command {
        
        protected function configure() {
            $this->setName('det');
            $this->setDescription('Calcula la determinante correspondiente');
            $this->addArgument('row', InputArgument::REQUIRED|InputArgument::IS_ARRAY, 'Fila de datos separadas por comas');
        }
        
        protected function execute(InputInterface $input, OutputInterface $output) {
            
            $argument = $input->getArgument('row');
            $formatArray = $this->formatArray($argument);
            $count = count($formatArray);
            
            $io = new SymfonyStyle($input, $output);
            $io->title('Calculo de Determinantes Cuadrados');
            $io->text('Se genera el calculo general en el proceso de descomposición para encontrar el valor requerido.');
            $io->newLine(2);
            
            if($count > 1) {
                if($this->validateArray($formatArray) == true) {
                    
                    if($count == 2) {
                        
                        $io->section('Determinante Cuadrado 2x2');
                        
                        $det = new \Services\Calculate\DetTwo($formatArray);
                        $io->table([], $formatArray);
                        $io->text($det->getRules());
                        $io->text($det->getRule());
                        $io->success(sprintf('det A = %s', $det->getDet()));
                        
                    }
                    elseif($count == 3) {
                        
                        $io->section('Determinante Cuadrado 3x3');
                        
                        $det = new \Services\Calculate\DetThree($formatArray);
                        $io->table([], $formatArray);
                        $io->text($det->getRules());
                        $io->text($det->getRule());
                        $io->success(sprintf('det A = %s', $det->getDet()));
                    }
                    else {
                       
                       $io->section(sprintf('Determinante Cuadrado %sx%s', $count, $count));
                       $det = new \Services\Calculate\Determinant($formatArray);
                       $io->table([], $formatArray);
                       $io->success(sprintf('det A = %s', $det->getDet()));
                    }
                }
                else {
                    $io->error('Debe ingresar una matriz:'.count($formatArray).'x'.count($formatArray));
                }
            }
            else {
                $io->error('Debe ingresar una matriz minimo 2x2 para el proceso correspondiente');
            }
            
            /*
            $array = $this->formatArray($input->getArgument('row'));
            $determinant = new \Services\Calculate\DetThree($array);
            
            $io->text('matriz A = ');
            $io->table([], $formatArray);
            dump('El valor del determinante es: '.$determinant->getDet());
            dump($determinant->getRules());
            dump($determinant->getRule());
            */
        }
        
        private function showDeterminante(SymfonyStyle $io, $object) {
            
        }
        
        /**
         * CalculateCommand::formatArray()
         * 
         * @param mixed $array
         * @return array
         */
        private function formatArray(array $array = []) {
            
            $list = [];
            foreach ($array AS $string) {
                $list[] = explode(',', $string);
            }
            return $list;
        }
        
        /**
         * CalculateCommand::validateArray()
         * 
         * @param mixed $array
         * @return bool
         */
        private function validateArray(array $array = []) {
            $rows = count($array);
            $validate = true;
            
            foreach ($array AS $value) {
                if($rows != count($value)) {
                    $validate = false;
                }
            }
            return $validate;
        }
    }