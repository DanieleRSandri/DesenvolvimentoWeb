<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Excluir</title>

</head>
<body>

<?php require_once '../Template/cabecario.php' ?>

<div class="excluir">
<h3 style="color: black; text-align:center">Exclusão de um Proprietário</h3></br>
<form id="formBuscar" name="formBuscar" method="post" action="excluiproprietario.php">
  <label style="color: black;">Informe o código do Proprietário:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>

<?php
 
  function  chamaFormExcluir($codigo, $nome, $cpf, $fone, $endereco)
  {
?>

  <form id="formExcluir" name="formExcluir" method="post" action="excluiproprietario.php" onsubmit="return confirm('Você tem certeza que deseja excluir este Proprietário?');">
    
    <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
    <p>
      <label>Digite seu nome completo:
      <input type="text" name="nome" id="nome"  value="<?php echo $nome;?>" required disabled>
      </label>
    </p>
    <p>
      <label>CPF:
      <input type="text" name="cpf" id="cpf" value="<?php echo $cpf;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Digite seu contato telefônico:
      <input type="text" name="fone" id="fone"  value="<?php echo $fone;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Digite o endereço completo:
      <input type="text" name="endereco" id="endereco"  value="<?php echo $endereco;?>" required disabled>
      </label>
    </p>
    <p>
      <label>
        <button class="btn btn-danger" type="submit" name="button" id="button" value="Excluir">Excluir</button>
      </label>
    </p>
  </form>
<?php
    
  }
 // include("../include/SessaoValidate.php");  
  include_once("../include/ProprietarioResult.php");
  include_once("../controller/ProprietarioController.php");
  $obj = new ProprietarioController();   
  $obj->controlaExclusao();
?>
</div>

</body>
</html>
<?php require_once '../Template/rodape.php'?>