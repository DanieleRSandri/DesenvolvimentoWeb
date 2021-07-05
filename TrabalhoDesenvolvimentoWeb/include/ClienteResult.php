<?php
  if(isset($_GET["result"])) {
    $res = htmlspecialchars($_GET["result"]);
    echo "<script>alert(\"$res\");";
    echo "</script>";
  }
  
  if(isset($_GET["error"])) {
    $err = array();
    $err = unserialize($_GET['error']);
    $nome = htmlspecialchars($_GET['nome']);
    $cpf = htmlspecialchars($_GET['cpf']);
    $fone = htmlspecialchars($_GET['fone']);
    $endereco = htmlspecialchars($_GET['endereco']);
    $profissao = htmlspecialchars($_GET['profissao']);
    $salario = htmlspecialchars($_GET['salario']);
    $str = ":: ";
    
    foreach ($err as $e)
      $str .= $e . " :: ";
    
    echo "<script>alert(\"$str\");";
    echo "document.getElementById('nome').value = \"$nome\";";
    echo "document.getElementById('cpf').value = \"$cpf\";";
    echo "document.getElementById('fone').value = \"$fone\";";
    echo "document.getElementById('endereco').value = \"$endereco\";";
    echo "document.getElementById('profissao').value = \"$profissao\";";
    echo "document.getElementById('salario').value = \"$salario\";";
    echo "</script>";
  }
?>