<?php
class ProprietarioDAO {
  // Recebe a conexão
  public $p = null;
  public $erro = null;
  
  // construtor
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
  }
  
  // inserção
  public function Inserir($proprietario) {
    try {
      $stmt = $this->p->prepare("INSERT INTO proprietario (nome, cpf, fone, endereco) VALUES (?, ?, ?, ?)");
	  
	  // Inicia a transação
      $this->p->beginTransaction();
      $stmt->bindValue(1, $proprietario->nome);
      $stmt->bindValue(2, $proprietario->cpf);
      $stmt->bindValue(3, $proprietario->fone);
      $stmt->bindValue(4, $proprietario->endereco); 
    
	  
	  // Executa a query
      $stmt->execute();
      
	  // Grava a transação
      $this->p->commit();      
      
    // Fecha a conexão
    unset($this->p);
	    
      return true;
    }
  	// Em caso de erro, retorna a mensagem:
	  catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
	    return false;
    }
  }
  
  // alteração
  public function Alterar($proprietario) {
    try {
      $stmt = $this->p->prepare("UPDATE proprietario SET nome=?, cpf=?, fone=?, endereco=? WHERE codigo=?");
      // Inicia a transação                     
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $proprietario->nome);
      $stmt->bindValue(2, $proprietario->cpf);
      $stmt->bindValue(3, $proprietario->fone);
      $stmt->bindValue(4, $proprietario->endereco);
      $stmt->bindValue(5, $proprietario->codigo);
    
      // Executa a query
      $stmt->execute();
  
      // Grava a transação
      $this->p->commit();
    
      // Fecha a conexão
      unset($this->p);

      return true;
    }
    // Em caso de erro, retorna a mensagem:
    catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
    return false;
    }
  }

  // exclusão
  public function Excluir($proprietario) {
    try {
      $stmt = $this->p->prepare("DELETE FROM proprietario WHERE codigo=?");
      // Inicia a transação
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $proprietario->codigo);
    
      // Executa a query
      $stmt->execute();
      
      // Grava a transação
      $this->p->commit();
      
      // Fecha a conexão
      unset($this->p);

      return true;
    }
    // Em caso de erro, retorna a mensagem:
    catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
      return false;
    }
  }
  
  // consulta
  public function Consultar($op, $param=null) {
    try {
      $items = array();

      switch($op) {
        case 1:
          $sql = "SELECT * FROM proprietario ";
          break;
        case 2:
          $sql = "SELECT * FROM proprietario WHERE codigo = $param";  // volta só um registro
          break;
      }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
      {
	    $p = new Proprietario();
	  
	    // Sempre verifica se a query SQL retornou a respectiva coluna
	    if(isset($registro["codigo"]))
	      $p->codigo = $registro["codigo"];
	    if(isset($registro["nome"]))
	      $p->nome = $registro["nome"];
      if(isset($registro["cpf"]))
	      $p->cpf = $registro["cpf"];
	    if(isset($registro["fone"]))
	      $p->fone = $registro["fone"];
      if(isset($registro["endereco"]))
	      $p->endereco = $registro["endereco"];
    

	    // Ao final, adiciona o registro como um item do array de retorno
	    $items[] = $p;
	  }
    // Fecha a conexão
    unset($this->p);  
	  
      return $items;
    }
	  // Em caso de erro, retorna a mensagem:
	  catch(PDOException $e) {
      echo "Erro: ". $e->getMessage();
    }
  }
}
?>