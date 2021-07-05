<?php
require_once("../model/FabricaConexao.php");
require_once("../model/Contrato.php");
require_once("../model/ContratoDAO.php");
require_once("../include/ContratoValidate.php");
require_once("../model/Cliente.php");
require_once("../model/ClienteDAO.php");

class ContratoController {

  public function listaPessoasFK2($selectedIndex=-1) {
    $DAO = new ClienteDAO();
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
    $DAO = new ContratoDAO();
  
    $contrato = $DAO->Consultar(2, $codigo);
  
    if(count($contrato) == 1)
    {
      $dtInicial  = $contrato[0]->dtInicial;
      $dtFinal  = $contrato[0]->dtFinal;
      $valor  = $contrato[0]->valor;
      $codcliente = $contrato[0]->codcliente;
     

      if($modo == 0)
        chamaFormAlterar($codigo, $dtInicial, $dtFinal, $valor, $codcliente);
      else
        chamaFormExcluir($codigo, $dtInicial, $dtFinal, $valor, $codcliente);
        
  
      print "<script>";
      print "document.formBuscar.buscaCod.value = '$codigo';";
      print "document.formBuscar.buscaCod.disabled = true;";
      print "document.formBuscar.buttonbuscar.disabled  = true;";
      print "</script>";
    }
    else
    {
      print "<script>";
      print "alert('Contrato não encontrado! Por favor, tente novamente...');";
      print "</script>";          
    }
  
    unset($contrato);
  }  
  
  public function controlaInsercao() {
    if(isset($_POST["dtInicial"]) && isset($_POST["dtFinal"]) && isset($_POST["valor"]) && isset($_POST["codcliente"]) ) {
      $erros = array();
      $dtInicial = $_POST["dtInicial"];
      $dtFinal = $_POST["dtFinal"];
      $valor = $_POST["valor"];
      $codcliente = $_POST["codcliente"];
    
      if(count($erros) == 0) {
        $DAO = new ContratoDAO();
        $contrato = new Contrato();
        $contrato->dtInicial  = $dtInicial;
        $contrato->dtFinal  = $dtFinal;
        $contrato->valor  = $valor;
        $contrato->codcliente = $codcliente;

        if(!ContratoValidate::testarDtInicial($_POST["dtInicial"]))
          $erros[] = "Data Inicial inválida";
        if(!ContratoValidate::testarDtFinal($_POST["dtFinal"]))
          $erros[] = "Data Final inválida";
        if(!ContratoValidate::testarValor($_POST["valor"]))
          $erros[] = "Valor inválido";

        if($DAO->Inserir($contrato)) {
          echo "<script>alert(\"Contrato cadastrado com sucesso!\");</script>";
         // header("Location: ../view/insereimovel.php?result=$res");
        }
        else {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/inserecontrato.php?error=$err&dtInicial=$dtInicial&dtFinal=$dtFinal&valor=$valor&codcliente=$codcliente");
        }
        
        unset($contrato);
      }
      else {
        $err = serialize($erros);
        header("Location: ../view/inserecontrato.php?error=$err&dtInicial=$dtInicial&dtFinal=$dtFinal&valor=$valor&codcliente=$codcliente");
      }
    }
  }
  
  public function controlaConsulta($op) {
    $DAO = new ContratoDAO();
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
        $dtInicial  = $lista[$i]->dtInicial;
        $dtFinal  = $lista[$i]->dtFinal;
        $valor  = $lista[$i]->valor;
        $codcliente   = $lista[$i]->codcliente;
      
        echo "<tr>";
          
        if($codigo)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$codigo</td> <";
        if($dtInicial)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$dtInicial</td>";
        if($dtFinal)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$dtFinal</td>";
        if($valor)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$valor</td>";
        if($codcliente)
          echo "<td style=\"border: 1px solid #ddd; padding: 8px; text-align:center\">$codcliente</td>";

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
    if(isset($_POST["dtInicial"]) && isset($_POST["dtFinal"]) && isset($_POST["valor"]) && isset($_POST["codcliente"])&& isset($_POST["codigo"]) ) {
      $erros = array();
  
      $dtInicial = $_POST["dtInicial"];
      $dtFinal = $_POST["dtFinal"];
      $valor = $_POST["valor"];
      $codcliente = $_POST["codcliente"];
      $codigo = $_POST["codigo"];
      
      if(count($erros) == 0) {
      
        $DAO = new ContratoDAO();
        $contrato = new Contrato();
       
        $contrato->dtInicial  = $dtInicial;
        $contrato->dtFinal  = $dtFinal;
        $contrato->valor  = $valor;
        $contrato->codcliente = $codcliente; 
        $contrato->codigo = $codigo;      

        if($DAO->Alterar($contrato)) {
          echo "<script>alert(\"Contrato alterado com sucesso!\");</script>";
         // header("Location: ../view/alteraimovel.php?resultMode=$res");
        }
        else
        {
          $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
          $err = serialize($erros);
          header("Location: ../view/alteracontrato.php?errorMode=$err&codigo=$codigo");          
        }
      
        unset($contrato);
      }
      else {
        $err = serialize($erros);  // Caso tenha erro no preenchimento do formulário
        header("Location: ../view/alteracontrato.php?errorMode=$err&codigo=$codigo");
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
      $DAO = new ContratoDAO();
      $contrato = new Contrato();
      $codigo = $_POST["selCod"];
      $contrato->codigo = $codigo;

      if($DAO->Excluir($contrato)) {
        echo "<script>alert(\"Contrato excluido com sucesso!\");</script>";
      //  header("Location: ../view/excluicontrato.php?resultMode=$res");
      }
      else
      {
        $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
        $err = serialize($erros);
        header("Location: ../view/excluicontrato.php?errorMode=$err&codigo=$codigo");          
      }
      
      unset($contrato);
    }
    else if(isset($_POST["buscaCod"]))
    {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 1);  // chamaFormExcluir
    }
  }

}
?>