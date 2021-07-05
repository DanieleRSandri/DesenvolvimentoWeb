<?php
  if(isset($_GET["result"])) {
    $res = htmlspecialchars($_GET["result"]);
    echo "<script>alert(\"$res\");";
    echo "</script>";
  }
  
  if(isset($_GET["resultMode"])) {
    $res = htmlspecialchars($_GET["resultMode"]);
    echo "<script>alert(\"$res\");";
    echo "document.formBuscar.buscaCod.disabled = false;";
    echo "document.formBuscar.button2.disabled  = false;";
    echo "</script>";
  }  
  
  if(isset($_GET["error"])) {
    $err = array();
    $err = unserialize($_GET['error']);
    $situacao = htmlspecialchars($_GET['situacao']);
    $dtInicial = htmlspecialchars($_GET['dtInicial']);
    $dtFinal = htmlspecialchars($_GET['dtFinal']);
    $valor = htmlspecialchars($_GET['valor']);
    $dono = htmlspecialchars($_GET['dono']);
    $codcliente = htmlspecialchars($_GET['codcliente']);
    $str = ":: ";
    
    foreach ($err as $e)
      $str .= $e . " :: ";
    
    echo "<script>alert(\"$str\");";
    echo "document.getElementById('dtInicial').value = \"$dtInicial\";";
    echo "document.getElementById('dtFinal').value = \"$dtFinal\";";
    echo "document.getElementById('valor').value = \"$valor\";";
    $codcliente--;  // índice de seleção começa em zero
    echo "document.getElementById('dono').selectedIndex = \"$codcliente\";";
    echo "</script>";
  }
  
  if(isset($_GET["errorMode"])) {
    $err = array();
    $err = unserialize($_GET['errorMode']);
    $codigo = htmlspecialchars($_GET['codigo']);
    $str = ":: ";
    
    foreach ($err as $e)
      $str .= $e . " :: ";
    
    echo "<script>alert(\"$str\");";
    echo "document.getElementById('buscaCod').value = '$codigo';";
    echo "document.getElementById('formBuscar').submit();";
    echo "</script>";
  }
  
?>