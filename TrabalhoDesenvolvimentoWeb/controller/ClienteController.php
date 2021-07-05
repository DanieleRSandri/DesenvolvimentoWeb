<?php
require_once("../model/FabricaConexao.php");
require_once("../model/Cliente.php");
require_once("../model/ClienteDAO.php");
require_once("../include/ClienteValidate.php");

class ClienteController {

  private function buscaDados($codigo, $modo)
  {
    $DAO = new ClienteDAO();
  
    $cliente = $DAO->Consultar(2, $codigo);

    if(count($cliente) == 1)
    {
      $nome = $cliente[0]->nome;
      $cpf  = $cliente[0]->cpf;
      $fone  = $cliente[0]->fone;
      $endereco  = $cliente[0]->endereco;
      $profissao   = $cliente[0]->profissao;
      $salario   = $cliente[0]->salario;

      if($modo == 0)
        chamaFormAlterar($codigo, $nome, $cpf, $fone, $endereco, $profissao, $salario);
      else
        chamaFormExcluir($codigo, $nome, $cpf, $fone, $endereco, $profissao, $salario);
        
  
      print "<script>";
      print "document.formBuscar.buscaCod.value = '$codigo';";
      print "document.formBuscar.buscaCod.disabled = true;";
      print "document.formBuscar.buttonbuscar.disabled  = true;";
      print "</script>";
    }
    else
    {
      print "<script>";
      print "alert('Cliente não encontrado! Por favor, tente novamente...');";
      print "</script>";          
    }
  
    unset($cliente);
  }

  public function controlaInsercao() {
    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["fone"]) && isset($_POST["endereco"])  && isset($_POST["profissao"]) && isset($_POST["salario"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];
      $fone = $_POST["fone"];
      $endereco = $_POST["endereco"];
      $profissao = $_POST["profissao"];
      $salario = $_POST["salario"];
         
      if(count($erros) == 0) {
        $DAO  = new ClienteDAO();
        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cpf = $cpf;
        $cliente->fone = $fone;
        $cliente->endereco = $endereco;
        $cliente->profissao = $profissao;
        $cliente->salario = $salario;


    if(!ClienteValidate::testarNome($_POST["nome"]))
        $erros[] = "Nome inválido";

        if($DAO->Inserir($cliente)) {
          echo "<script>alert(\"Cliente cadastrado com sucesso!\");</script";
          //header("Location: ../view/inserecliente.php?result=$res");
        }
        else {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/inserecliente.php?error=$err&nome=$nome&cpf=$cpf&fone=$fone&endereco=$endereco");
        }
        
        unset($cliente);
      }
      else {
        $err = serialize($erros);
        header("Location: ../view/insereclientephp?error=$err&nome=$nome&cpf=$cpf&fone=$fone&endereco=$endereco");
      }
    }
  }

  public function controlaConsulta($op) {
    $DAO = new ClienteDAO();
    $lista = array();
    $numCol = 7;
    
    switch($op) {
      case 1:
        $lista = $DAO->Consultar(1);
      break;
    }
    
    if(count($lista) > 0) {
      for($i = 0; $i < count($lista); $i++) {
        $codigo = $lista[$i]->codigo;
        $nome   = $lista[$i]->nome;
        $cpf   = $lista[$i]->cpf;
        $fone   = $lista[$i]->fone;
        $endereco   = $lista[$i]->endereco;
        $profissao   = $lista[$i]->profissao;
        $salario   = $lista[$i]->salario;
      
        echo "<tr>";
        
        if($codigo)
          echo "<td  style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$codigo</td>";
        if($nome)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$nome</td>";
        if($cpf)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$cpf</td>";
        if($fone)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$fone</td>";
        if($endereco)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$endereco</td>";
          if($profissao)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$profissao</td>";
        if($salario)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$salario</td>";

          echo "</tr>";
      }
    }
    else {
      echo "<tr>";
      echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
      echo "</tr>";
    }
  }
  
  
  public function controlaAlteracao()
  {
    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["fone"]) && isset($_POST["endereco"]) && isset($_POST["profissao"])
    && isset($_POST["salario"]) && isset($_POST["selCod"])) {
        $erros = array();
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $fone = $_POST["fone"];
        $endereco = $_POST["endereco"];
        $profissao = $_POST["profissao"];
        $salario = $_POST["salario"];
        $codigo = $_POST["selCod"];   
     
      
      if(count($erros) == 0) {
        $DAO = new ClienteDAO();
        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->cpf  = $cpf;
        $cliente->fone  = $fone;
        $cliente->endereco  = $endereco;
        $cliente->profissao  = $profissao;
        $cliente->salario  = $salario;
        $cliente->codigo = $codigo;        

        if($DAO->Alterar($cliente)) {
          echo "<script>alert(\"Cliente alterado com sucesso!\");</script>";
         // header("Location: ../view/alteracliente.php?resultMode=$res");
        }
        else
        {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/alteracliente.php?errorMode=$err&codigo=$codigo");          
        }
      
        unset($cliente);
      }
      else {
        $err = serialize($erros);  // Caso tenha erro no preenchimento do formulário
        header("Location: ../view/alteracliente.php?errorMode=$err&codigo=$codigo");
      }
    }
    else if(isset($_POST["buscaCod"]))
    {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 0);  // chamaFormAlterar
    }
  }
  
  public function controlaExclusao()
  {
    if(isset($_POST["selCod"]))
    {
      $DAO = new ClienteDAO();
      $cliente = new Cliente();

      $codigo = $_POST["selCod"];
      $cliente->codigo = $codigo;

      if($DAO->Excluir($cliente)) {
        echo "<script>alert(\"Cliente excluido com sucesso!\");</script>";
       // header("Location: ../view/excluicliente.php?resultMode=$res");
      }
      else
      {
        $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
        $err = serialize($erros);
        header("Location: ../view/excluicliente.php?errorMode=$err&codigo=$codigo");          
      }
      
      unset($cliente);
    }
    else if(isset($_POST["buscaCod"]))
    {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 1);  // chamaFormExcluir
    }
  }

}
?>