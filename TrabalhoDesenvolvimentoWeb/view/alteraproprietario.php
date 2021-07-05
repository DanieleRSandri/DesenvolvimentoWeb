<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Imobiliaria: Alterar</title> 
</head>
<body>
<?php require_once '../Template/cabecario.php' ?>

<div class="alterar">
<h3>Alteração de dados de um Proprietário</h3></br></br>
<form id="formBuscar" name="formBuscar" method="post" action="alteraproprietario.php">
  <label>Informe o código do Proprietário:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>


<?php
  
  function chamaFormAlterar($codigo, $nome, $cpf, $fone, $endereco)
  {
?>

<form id="formAlterar" name="formAlterar" method="post" action="alteraproprietario.php">
   
    <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
    <p>
      <label>Digite seu nome completo:
      <input type="text" name="nome" id="nome"  value="<?php echo $nome;?>" required>
      </label>
    </p>
    <p>
      <label>CPF:
      <input type="text" name="cpf" id="cpf" value="<?php echo $cpf;?>" required>
      </label>
    </p>
    <p>
      <label>Digite seu contato telefônico:
      <input type="text" name="fone" id="fone"  value="<?php echo $fone;?>" required>
      </label>
    </p>
    <p>
      <label>Digite o endereço completo:
      <input type="text" name="endereco" id="endereco"  value="<?php echo $endereco;?>" required>
      </label>
    </p>
    <p>
      <label>
      <button class="btn btn-danger" type="submit" name="button" id="button" value="Alterar">Alterar</button>
      </label>
    </p>
  </form>
<?php
    
  }
//  include("../include/SessaoValidate.php");  
  include_once("../include/ProprietarioResult.php");
  include_once("../controller/ProprietarioController.php");
  $obj = new ProprietarioController();   
  $obj->controlaAlteracao();
?>
</div>
</body>
</html>
<?php require_once '../Template/rodape.php' ?>
