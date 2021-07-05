﻿<?php
// Classe herda métodos e atributos da classe PDO
// Mais informações: https://php.net/manual/en/book.pdo.php
class FabricaConexao extends PDO {
  private $dbn = "mysql:host=localhost;port=3306;dbname=trabalho_desenvolvimento_web";
  // private $dbn = "pgsql:host=localhost;port=5432;dbname=bancoteste";
  private $usr = "root";
  private $pwd = "";
  public $handle = null;

  // Construtor do objeto de conexão
  function __construct() {
    try {
      // Retorna o PDO em si, acessando o construtor da classe PDO
      if($this->handle == null) {
        $dbh = parent::__construct($this->dbn, $this->usr ,$this->pwd);
        $this->handle = $dbh;
        return $this->handle;
      }
    }
    catch(PDOException $e) {
      echo "Conexão falhou. Erro: " . $e->getMessage() . "\n";
      return false;
    }
  }

  // Destrutor do objeto de conexão
  function __destruct() {
    $this->handle = NULL;
  }
}
?>
