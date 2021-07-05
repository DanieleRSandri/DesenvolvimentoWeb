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
    $nome = htmlspecialchars($_GET['nome']);
    $cpf = htmlspecialchars($_GET['cpf']);
    $fone = htmlspecialchars($_GET['fone']);
    $endereco = htmlspecialchars($_GET['endereco']);
    $str = ":: ";
    
    foreach ($err as $e)
      $str .= $e . " :: ";
    
    echo "<script>alert(\"$str\");";
    echo "document.getElementById('nome').value = \"$nome\";";
    echo "document.getElementById('cpf').value = \"$cpf\";";
    echo "document.getElementById('fone').value = \"$fone\";";
    echo "document.getElementById('endereco').value = \"$endereco\";";
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