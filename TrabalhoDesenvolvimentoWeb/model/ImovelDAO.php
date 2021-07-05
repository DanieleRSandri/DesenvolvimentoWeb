<?php
class ImovelDAO {
  // Recebe a conexão
  public $p = null;
  public $erro = null;
  
  // construtor
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
  }
  
  // inserção
  public function Inserir($imovel) {
    try {
      $stmt = $this->p->prepare("INSERT INTO imovel (situacao, tipoimovel, descricao, aluguel, codproprietario) VALUES (?, ?, ?, ?, ?)");
      
      // Inicia a transação
      $this->p->beginTransaction();
      $stmt->bindValue(1, $imovel->situacao);
      $stmt->bindValue(2, $imovel->tipoimovel);
      $stmt->bindValue(3, $imovel->descricao);
      $stmt->bindValue(4, $imovel->aluguel);
      $stmt->bindValue(5, $imovel->codproprietario);
    
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
  public function Alterar($imovel) {
    try {
      $stmt = $this->p->prepare("UPDATE imovel SET situacao=?, tipoimovel=?, descricao=?, aluguel=?, codproprietario=? WHERE codigo=?");
      // Inicia a transação
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $imovel->situacao);
      $stmt->bindValue(2, $imovel->tipoimovel);
      $stmt->bindValue(3, $imovel->descricao);
      $stmt->bindValue(4, $imovel->aluguel);
      $stmt->bindValue(5, $imovel->codproprietario);
      $stmt->bindValue(6, $imovel->codigo);
    
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
  public function Excluir($imovel) {
    try {
      $stmt = $this->p->prepare("DELETE FROM imovel WHERE codigo=?");
      // Inicia a transação
      $this->p->beginTransaction();
      // Vincula um valor a um parâmetro da sentença SQL, na ordem
      $stmt->bindValue(1, $imovel->codigo);
    
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
          $sql = "SELECT imovel.codigo, imovel.situacao, imovel.tipoimovel, imovel.descricao, imovel.aluguel, proprietario.nome
          FROM `imovel`, `proprietario` WHERE imovel.codproprietario = proprietario.codigo";
          break;
        case 2:
          $sql = "SELECT * FROM imovel WHERE codigo = $param";  // volta só um registro
          break;
      }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
      {
        $p = new Imovel();
      
        // Sempre verifica se a query SQL retornou a respectiva coluna
        if(isset($registro["codigo"]))
          $p->codigo = $registro["codigo"];
        if(isset($registro["situacao"]))
          $p->situacao = $registro["situacao"];
        if(isset($registro["tipoimovel"]))
          $p->tipoimovel = $registro["tipoimovel"];
        if(isset($registro["descricao"]))
          $p->descricao = $registro["descricao"];
        if(isset($registro["aluguel"]))
          $p->aluguel = $registro["aluguel"];
        if($op == 1) {
          if(isset($registro["nome"]))
            $p->codproprietario = $registro["nome"];
        }
        else {  // $op == 2
          if(isset($registro["codproprietario"]))
            $p->codproprietario = $registro["codproprietario"];          
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