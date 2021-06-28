<?php

class Imovel {
  private $codigo;
  private $situacao;
  private $tipoimovel;
  private $descricao;
  private $aluguel;
  private $codpessoa;

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>