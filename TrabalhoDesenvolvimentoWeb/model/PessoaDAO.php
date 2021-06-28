<?php
class PessoaDAO {
  // Recebe a conexão
  public $p = null;
  public $erro = null;
  
  // construtor
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
  }
  
  // inserção
  public function Inserir($pessoa) {
    try {
      $stmt = $this->p->prepare("INSERT INTO pessoas (nome, cpf, fone, endereco, profissao, salario) VALUES (?, ?, ?, ?, ?, ?)");
	  
	  // Inicia a transação
      $this->p->beginTransaction();
      $stmt->bindValue(1, $pessoa->nome);
      $stmt->bindValue(2, $pessoa->cpf);
      $stmt->bindValue(3, $pessoa->fone);
      $stmt->bindValue(4, $pessoa->endereco);
      $stmt->bindValue(5, $pessoa->profissao);
      $stmt->bindValue(6, $pessoa->salario);
      

     
	  
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
  public function Alterar($pessoa) {}

  // exclusão
  public function Excluir($pessoa) {}
  
  // consulta
  public function Consultar($query=null) {
    try {
	  $items = array();
	  
      if($query != null)
        $stmt = $this->p->query($query);
      else
        $stmt = $this->p->query("SELECT * FROM pessoas");

	  while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
	  {
	    $p = new Pessoa();
	  
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