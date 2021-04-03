<?php

    class Mensagem{
        private $para = NULL;
        private $assunto = NULL;
        private $mensagem = NULL;
        public $status = array('cod_status' => null, 'desc_status' => '');

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            return $this->$atributo = $valor;
        }

        public function mensagemValida(){
            if(empty($this->para) || empty($this->assunto || empty($this->mensagem))){
                return false;
            }

            return true;
        }
    }


?>