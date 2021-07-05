<?php

class Cliente {
  private $codigo;
  private $nome;
  private $cpf;
  private $fone;
  private $endereco;
  private $profissao;
  private $salario;


  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>