﻿<?php
class UserDAO {
  // Recebe a conexão
  public $p = null;
  public $erro = null;
  
  // construtor
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
  }
  
  // inserção
  public function Inserir($obj) {
    try {
	    /* Primeiro, testa se o usuário informado já existe no BD.
	     Se sim, retorna para tratamento no UserController */
      $stmt = $this->p->query("SELECT * FROM usuarios WHERE apelido = '$obj->apelido'");
      if($stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	    return -1;
	
	    /* A partir daqui, o usuário é novo e será salvo no BD */
      $stmt = $this->p->prepare("INSERT INTO usuarios (apelido, senha, email) VALUES (?, ?, ?)");

      // Inicia a transação
      $this->p->beginTransaction();
      $stmt->bindValue(1, $obj->apelido);
      $stmt->bindValue(2, $obj->senha);
      $stmt->bindValue(3, $obj->email);
    
      // Executa a query
      $stmt->execute();

      // Grava a transação
      $this->p->commit();      
      
      // Fecha a conexão
      unset($this->p);
      
      return 1;
    }
    // Em caso de erro, retorna a mensagem:
    catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
      return 0;
    }
  }
  
  // consulta
  public function Consultar($obj) {
    try {
      /* Busca pelo registro... se existir, deve trazer só uma linha,
      pois a coluna apelido é chave primária */
      $stmt = $this->p->query("SELECT * FROM usuarios WHERE apelido = '$obj->apelido'");
      $registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);

      // Fecha a conexão
      unset($this->p);

      if(!$registro) {
        // Não encontrou o usuário
        return -2;
      }
      else {
        if (strcmp($registro["senha"], $obj->senha) !== 0) {
          // Senha não confere
          return -1;
        }
        else {
          // Tudo certo!
          return 1;
        }
      }
    }
    // Em caso de erro, retorna a mensagem:
    catch(PDOException $e) {
      echo "Erro: ". $e->getMessage();
      return 0;
    }
  }
}
?>