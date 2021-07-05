<?php
class ClienteDAO {
  // Recebe a conexão
  public $p = null;
  public $erro = null;
  
  // construtor
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
  }
  
  // inserção
  public function Inserir($cliente) {
    try {
      $stmt = $this->p->prepare("INSERT INTO clientes (nome, cpf, fone, endereco, profissao, salario) VALUES (?, ?, ?, ?, ?, ?)");
	  
	  // Inicia a transação
      $this->p->beginTransaction();
      $stmt->bindValue(1, $cliente->nome);
      $stmt->bindValue(2, $cliente->cpf);
      $stmt->bindValue(3, $cliente->fone);
      $stmt->bindValue(4, $cliente->endereco); 
      $stmt->bindValue(5, $cliente->profissao);
      $stmt->bindValue(6, $cliente->salario); 
    
	  
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
  public function Alterar($cliente) {
    try {
      $stmt = $this->p->prepare("UPDATE clientes SET nome=?, cpf=?, fone=?, endereco=?, profissao=?, salario=? WHERE codigo=?");
      // Inicia a transação                     
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $cliente->nome);
      $stmt->bindValue(2, $cliente->cpf);
      $stmt->bindValue(3, $cliente->fone);
      $stmt->bindValue(4, $cliente->endereco);
      $stmt->bindValue(5, $cliente->profissao);
      $stmt->bindValue(6, $cliente->salario);
      $stmt->bindValue(7, $cliente->codigo);
    
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
  public function Excluir($cliente) {
    try {
      $stmt = $this->p->prepare("DELETE FROM clientes WHERE codigo=?");
      // Inicia a transação
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $cliente->codigo);
    
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
          $sql = "SELECT * FROM clientes ";
          break;
        case 2:
          $sql = "SELECT * FROM clientes WHERE codigo = $param";  // volta só um registro
          break;
      }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
      {
	    $p = new cliente();
	  
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
        if(isset($registro["profissao"]))
	      $p->profissao = $registro["profissao"];
        if(isset($registro["salario"]))
	      $p->salario = $registro["salario"];

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