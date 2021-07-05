<?php
class ContratoDAO {
  // Recebe a conexão
  public $p = null;
  public $erro = null;
  
  // construtor
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
  }
  
  // inserção
  public function Inserir($contrato) {
    try {
      $stmt = $this->p->prepare("INSERT INTO contrato (dtInicial, dtFinal, valor, codcliente) VALUES (?, ?, ?, ?)");
      
      // Inicia a transação
      $this->p->beginTransaction();
      $stmt->bindValue(1, $contrato->dtInicial);
      $stmt->bindValue(2, $contrato->dtFinal);
      $stmt->bindValue(3, $contrato->valor);
      $stmt->bindValue(4, $contrato->codcliente);
    
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
  public function Alterar($contrato) {
    try {
      $stmt = $this->p->prepare("UPDATE contrato SET dtInicial=?, dtFinal=?, valor=?, codcliente=?  WHERE codigo=?");
      // Inicia a transação
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
     
      $stmt->bindValue(1, $contrato->dtIncial);
      $stmt->bindValue(2, $contrato->dtFinal);
      $stmt->bindValue(3, $contrato->valor);
      $stmt->bindValue(4, $contrato->codcliente);
      $stmt->bindValue(5, $contrato->codigo);
    
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
  public function Excluir($contrato) {
    try {
      $stmt = $this->p->prepare("DELETE FROM contrato WHERE codigo=?");
      // Inicia a transação
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $contrato->codigo);
    
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
          $sql = "SELECT contrato.codigo, contrato.dtInicial, contrato.dtFinal, contrato.valor, clientes.nome
          FROM `contrato`, `clientes` WHERE contrato.codcliente = clientes.codigo";
          break;
        case 2:
          $sql = "SELECT * FROM contrato WHERE codigo = $param";  // volta só um registro
          break;
      }
     
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
      {
        $p = new Contrato();
      
        // Sempre verifica se a query SQL retornou a respectiva coluna
        if(isset($registro["codigo"]))
          $p->codigo = $registro["codigo"];
        if(isset($registro["dtInicial"]))
          $p->dtInicial = $registro["dtInicial"];
        if(isset($registro["dtFinal"]))
          $p->dtFinal = $registro["dtFinal"];
        if(isset($registro["valor"]))
          $p->valor = $registro["valor"];
        if($op == 1) {
            if(isset($registro["nome"]))
              $p->codcliente = $registro["nome"];
          }
        if ($op == 2) {
            if(isset($registro["nome"]))
              $p->codcliente = $registro["nome"];          
          }
        

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