<?php

class Pessoa {
  private $codigo;
  private $nome;
  private $fone;

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>