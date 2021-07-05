<?php
require_once("../model/FabricaConexao.php");
require_once("../model/Proprietario.php");
require_once("../model/ProprietarioDAO.php");
require_once("../include/ProprietarioValidate.php");

class ProprietarioController {

  private function buscaDados($codigo, $modo)
  {
    $DAO = new ProprietarioDAO();
  
    $proprietario = $DAO->Consultar(2, $codigo);

    if(count($proprietario) == 1)
    {
      $nome = $proprietario[0]->nome;
      $cpf  = $proprietario[0]->cpf;
      $fone  = $proprietario[0]->fone;
      $endereco  = $proprietario[0]->endereco;

      if($modo == 0)
        chamaFormAlterar($codigo, $nome, $cpf, $fone, $endereco);
      else
        chamaFormExcluir($codigo, $nome, $cpf, $fone, $endereco);
        
  
      print "<script>";
      print "document.formBuscar.buscaCod.value = '$codigo';";
      print "document.formBuscar.buscaCod.disabled = true;";
      print "document.formBuscar.buttonbuscar.disabled  = true;";
      print "</script>";
    }
    else
    {
      print "<script>";
      print "alert('Proprietario não encontrado! Por favor, tente novamente...');";
      print "</script>";          
    }
  
    unset($proprietario);
  }

  public function controlaInsercao() {
    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["fone"]) && isset($_POST["endereco"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];
      $fone = $_POST["fone"];
      $endereco = $_POST["endereco"];
         
      if(count($erros) == 0) {
        $DAO  = new ProprietarioDAO();
        $proprietario = new Proprietario();
        $proprietario->nome = $nome;
        $proprietario->cpf = $cpf;
        $proprietario->fone = $fone;
        $proprietario->endereco = $endereco;


    if(!ProprietarioValidate::testarNome($_POST["nome"]))
        $erros[] = "Nome inválido";

        if($DAO->Inserir($proprietario)) {
          echo "<script>alert(\"Proprietário cadastrado com sucesso!\");</script";
          //header("Location: ../view/insereproprietario.php?result=$res");
        }
        else {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/insereproprietario.php?error=$err&nome=$nome&cpf=$cpf&fone=$fone&endereco=$endereco");
        }
        
        unset($proprietario);
      }
      else {
        $err = serialize($erros);
        header("Location: ../view/insereproprietariophp?error=$err&nome=$nome&cpf=$cpf&fone=$fone&endereco=$endereco");
      }
    }
  }

  public function controlaConsulta($op) {
    $DAO = new ProprietarioDAO();
    $lista = array();
    $numCol = 5;
    
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
    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["fone"]) && isset($_POST["endereco"]) && isset($_POST["selCod"])) {
        $erros = array();
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $fone = $_POST["fone"];
        $endereco = $_POST["endereco"];
        $codigo = $_POST["selCod"];   
     
      
      if(count($erros) == 0) {
        $DAO = new ProprietarioDAO();
        $proprietario = new Proprietario();
        $proprietario->nome = $nome;
        $proprietario->cpf  = $cpf;
        $proprietario->fone  = $fone;
        $proprietario->endereco  = $endereco;
        $proprietario->codigo = $codigo;        

        if($DAO->Alterar($proprietario)) {
          echo "<script>alert(\"Proprietario alterado com sucesso!\");</script>";
         // header("Location: ../view/alteraproprietario.php?resultMode=$res");
        }
        else
        {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/alteraproprietario.php?errorMode=$err&codigo=$codigo");          
        }
      
        unset($proprietario);
      }
      else {
        $err = serialize($erros);  // Caso tenha erro no preenchimento do formulário
        header("Location: ../view/alteraproprietario.php?errorMode=$err&codigo=$codigo");
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
      $DAO = new ProprietarioDAO();
      $proprietario = new Proprietario();

      $codigo = $_POST["selCod"];
      $proprietario->codigo = $codigo;

      if($DAO->Excluir($proprietario)) {
        echo "<script>alert(\"Proprietário excluido com sucesso!\");</script>";
       // header("Location: ../view/excluiproprietario.php?resultMode=$res");
      }
      else
      {
        $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
        $err = serialize($erros);
        header("Location: ../view/excluiproprietario.php?errorMode=$err&codigo=$codigo");          
      }
      
      unset($proprietario);
    }
    else if(isset($_POST["buscaCod"]))
    {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 1);  // chamaFormExcluir
    }
  }

}
?>