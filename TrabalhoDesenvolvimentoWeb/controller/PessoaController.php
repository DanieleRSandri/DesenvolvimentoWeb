<?php


require_once("../model/FabricaConexao.php");
require_once("../model/Pessoa.php");
require_once("../model/PessoaDAO.php");
require_once("../include/PessoaValidate.php");

class PessoaController {

  public function controlaConsulta($op) {
    $DAO = new PessoaDAO();
    $lista = array();
    $numCol = 7;
    
    switch($op) {
      case 1:
        $lista = $DAO->Consultar();
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
      
        echo "<tr style=\"border-collapse: collapse;\">";
        
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
  
  public function controlaInsercao() {
    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["fone"]) && isset($_POST["endereco"]) && isset($_POST["profissao"])&& isset($_POST["salario"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];
      $fone = $_POST["fone"];
      $endereco = $_POST["endereco"];
      $profissao = $_POST["profissao"];
      $salario = $_POST["salario"];
      
      
      
      if(!PessoaValidate::testarNome($_POST["nome"]))
        $erros[] = "Nome inválido";
      
      if(count($erros) == 0) {
        $DAO  = new PessoaDAO();
        $pessoa = new Pessoa();
        $pessoa->nome = $nome;
        $pessoa->cpf = $cpf;
        $pessoa->fone = $fone;
        $pessoa->endereco = $endereco;
        $pessoa->profissao = $profissao;
        $pessoa->salario = $salario;
        
        if($DAO->Inserir($pessoa)) {
          echo "<script>alert(\"PESSOA CADASTRADA COM SUCESSO!\");</script";
          //header("Location: ../view/inserepessoa.php?result=$res");
        }
        else {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/inserepessoa.php?error=$err&nome=$nome&cpf=$cpf&fone=$fone&endereco=$endereco&profissao=$profissao&salario=$salario");
        }
        
        unset($pessoa);
      }
      else {
        $err = serialize($erros);
        header("Location: ../view/inserepessoa.php?error=$err&nome=$nome&cpf=$cpf&fone=$fone&endereco=$endereco&profissao=$profissao&salario=$salario");
      }
    }
  }
}
?>