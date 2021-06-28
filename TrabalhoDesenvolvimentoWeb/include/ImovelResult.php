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
    $tipoimovel = htmlspecialchars($_GET['tipoimovel']);
    $descricao = htmlspecialchars($_GET['descricao']);
    $aluguel = htmlspecialchars($_GET['aluguel']);
    $dono = htmlspecialchars($_GET['dono']);
    $str = ":: ";
    
    foreach ($err as $e)
      $str .= $e . " :: ";
    
    echo "<script>alert(\"$str\");";
    echo "document.getElementById('modelo').value = \"$situacao\";";
    echo "document.getElementById('tipoimovel').value = \"$tipoimovel\";";
    echo "document.getElementById('descricao').value = \"$descricao\";";
    echo "document.getElementById('aluguel').value = \"$aluguel\";";
    $dono--;  // índice de seleção começa em zero
    echo "document.getElementById('dono').selectedIndex = \"$dono\";";
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