<?php 
    echo "<h3>Dentro de claseA</h3><br>";

    class claseA {
        public $publico = "soy un atr público";
        protected $protegido = "soy un atr protegido";
        private $privado = "soy un atr privado";

        /* public function __get($publico) {
            echo "Imprimo: $publico";
        } */

        public function __set($publico, $value) {
            echo "Setting '$publico' to '$value'\n";
            $this->data[$publico] = $value;
        }

        /* public function __get($publico) {
            echo "Getting '$publico'\n";
            if (array_key_exists($publico, $this->data)) {
                return $this->data[$publico];
            }
        } */

        /* public function __get($protegido) {
            echo "Imprimo: $protegido";
        }
        public function __get($privado) {
            echo "Imprimo: $publico";
        } */
    }

?>