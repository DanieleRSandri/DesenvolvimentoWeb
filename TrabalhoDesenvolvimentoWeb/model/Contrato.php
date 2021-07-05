<?php

class Contrato {
  private $codigo;
  private $dtInicial;
  private $dtFinal;
  private $valor;
  private $codcliente;
  

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>