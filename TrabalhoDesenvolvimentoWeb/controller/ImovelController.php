<?php
require_once("../model/FabricaConexao.php");
require_once("../model/Proprietario.php");
require_once("../model/ProprietarioDAO.php");
require_once("../model/Imovel.php");
require_once("../model/ImovelDAO.php");
require_once("../include/ImovelValidate.php");

class ImovelController {

  public function listaPessoasFK($selectedIndex=-1) {
    $DAO = new ProprietarioDAO();
    $lista = array();
    $lista = $DAO->Consultar(1, null);
    $resultOptions = "";

    if($selectedIndex != -1)
      $selectedIndex--;  // índice de seleção começa em zero
  
    if(count($lista) > 0) {
      // Populando a lista de opções
      for($i = 0; $i < count($lista); $i++) {
        if($i != $selectedIndex)
        {
          // Para casos de inserção ou consulta
          $resultOptions .= "<option value=\"" . $lista[$i]->codigo . "\">" . $lista[$i]->nome . "</option>" . "\n";
        }
        else {
          // Para casos de alteração ou exclusão, deve existir só um item selecionado
          $resultOptions .= "<option selected value=\"" . $lista[$i]->codigo . "\">" . $lista[$i]->nome . "</option>" . "\n";
        }
      }
    }
    else {
      // Cria uma option vazia
      $resultOptions .= "<option value=''></option>\n";
    }
    // Retorna os resultados considerando a chamada php dentro de um <select>
    return $resultOptions;
  }

  private function buscaDados($codigo, $modo)
  {
    $DAO = new ImovelDAO();
  
    $imovel = $DAO->Consultar(2, $codigo);
  
    if(count($imovel) == 1)
    {
      $situacao = $imovel[0]->situacao;
      $tipoimovel  = $imovel[0]->tipoimovel;
      $descricao  = $imovel[0]->descricao;
      $aluguel  = $imovel[0]->aluguel;
      $codproprietario = $imovel[0]->codproprietario;

      if($modo == 0)
        chamaFormAlterar($codigo, $situacao, $tipoimovel, $descricao, $aluguel, $codproprietario);
      else
        chamaFormExcluir($codigo, $situacao, $tipoimovel, $descricao, $aluguel, $codproprietario);
        
  
      print "<script>";
      print "document.formBuscar.buscaCod.value = '$codigo';";
      print "document.formBuscar.buscaCod.disabled = true;";
      print "document.formBuscar.buttonbuscar.disabled  = true;";
      print "</script>";
    }
    else
    {
      print "<script>";
      print "alert('Imóvel não encontrado! Por favor, tente novamente...');";
      print "</script>";          
    }
  
    unset($imovel);
  }  
  
  public function controlaInsercao() {
    if(isset($_POST["situacao"]) && isset($_POST["tipoimovel"]) && isset($_POST["descricao"]) && isset($_POST["aluguel"]) && isset($_POST["dono"])) {
      $erros = array();
      $situacao = $_POST["situacao"];
      $tipoimovel = $_POST["tipoimovel"];
      $descricao = $_POST["descricao"];
      $aluguel = $_POST["aluguel"];
      $dono = $_POST["dono"];
    
      if(count($erros) == 0) {
        $DAO = new ImovelDAO();
        $imovel = new Imovel();
        $imovel->situacao = $situacao;
        $imovel->tipoimovel  = $tipoimovel;
        $imovel->descricao  = $descricao;
        $imovel->aluguel  = $aluguel;
        $imovel->codproprietario = $dono;

        if(!ImovelValidate::testarSituacao($_POST["situacao"]))
          $erros[] = "Situação inválido";
        if(!ImovelValidate::testarTipoimovel($_POST["tipoimovel"]))
          $erros[] = "Tipo inválido";
        if(!ImovelValidate::testarDescricao($_POST["descricao"]))
          $erros[] = "Descrição inválido";
        if(!ImovelValidate::testarAluguel($_POST["aluguel"]))
          $erros[] = "Aluguel inválido";

        if($DAO->Inserir($imovel)) {
          echo "<script>alert(\"Imóvel cadastrado com sucesso!\");</script>";
         // header("Location: ../view/insereimovel.php?result=$res");
        }
        else {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/insereimovel.php?error=$err&situacao=$situacao&tipoimovel=$tipoimovel&descricao=$descricao&aluguel=$aluguel&dono=$dono");
        }
        
        unset($imovel);
      }
      else {
        $err = serialize($erros);
        header("Location: ../view/insereimovel.php?error=$err&situacao=$situacao&tipoimovel=$tipoimovel&descricao=$descricao&aluguel=$aluguel&dono=$dono");
      }
    }
  }
  
  public function controlaConsulta($op) {
    $DAO = new ImovelDAO();
    $lista = array();
    $numCol = 6;
    
    switch($op) {
      case 1:
        $lista = $DAO->Consultar(1);
      break;
    }
    
    if(count($lista) > 0) {
      for($i = 0; $i < count($lista); $i++) {
        $codigo = $lista[$i]->codigo;
        $situacao = $lista[$i]->situacao;
        $tipoimovel  = $lista[$i]->tipoimovel;
        $descricao  = $lista[$i]->descricao;
        $aluguel  = $lista[$i]->aluguel;
        $dono   = $lista[$i]->codproprietario;
      
        echo "<tr>";
          
        if($codigo)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$codigo</td> <";
        if($situacao)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$situacao</td>";
        if($tipoimovel)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$tipoimovel</td>";
        if($descricao)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$descricao</td>";
        if($aluguel)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$aluguel</td>";
        if($dono)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$dono</td>";

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
    if(isset($_POST["situacao"]) && isset($_POST["tipoimovel"]) && isset($_POST["descricao"])&& isset($_POST["aluguel"]) && isset($_POST["dono"])&& isset($_POST["selCod"])) {
      $erros = array();
      $situacao = $_POST["situacao"];
      $tipoimovel = $_POST["tipoimovel"];
      $descricao = $_POST["descricao"];
      $aluguel = $_POST["aluguel"];
      $dono = $_POST["dono"];
      $codigo = $_POST["selCod"];      
      
     
      
      if(count($erros) == 0) {
        $DAO = new ImovelDAO();
        $imovel = new Imovel();
        $imovel->situacao = $situacao;
        $imovel->tipoimovel  = $tipoimovel;
        $imovel->descricao  = $descricao;
        $imovel->aluguel  = $aluguel;
        $imovel->codproprietario = $dono;
        $imovel->codigo = $codigo;        

        if($DAO->Alterar($imovel)) {
          echo "<script>alert(\"Imóvel alterado com sucesso!\");</script>";
         // header("Location: ../view/alteraimovel.php?resultMode=$res");
        }
        else
        {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/alteraimovel.php?errorMode=$err&codigo=$codigo");          
        }
      
        unset($imovel);
      }
      else {
        $err = serialize($erros);  // Caso tenha erro no preenchimento do formulário
        header("Location: ../view/alteraimovel.php?errorMode=$err&codigo=$codigo");
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
      $DAO = new ImovelDAO();
      $imovel = new Imovel();

      $codigo = $_POST["selCod"];
      $imovel->codigo = $codigo;

      if($DAO->Excluir($imovel)) {
        echo "<script>alert(\"Imóvel excluido com sucesso!\");</script>";
      //  header("Location: ../view/excluiimovel.php?resultMode=$res");
      }
      else
      {
        $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
        $err = serialize($erros);
        header("Location: ../view/excluiimovel.php?errorMode=$err&codigo=$codigo");          
      }
      
      unset($imovel);
    }
    else if(isset($_POST["buscaCod"]))
    {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 1);  // chamaFormExcluir
    }
  }

}
?>