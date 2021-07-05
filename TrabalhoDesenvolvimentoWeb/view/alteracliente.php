<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Imobiliaria: Alterar</title> 

</head>
<body >
<?php require_once '../Template/cabecario.php' ?>

<div class="alterar">
<h3>Alteração de dados de um Cliente</h3></br></br>
<form id="formBuscar" name="formBuscar" method="post" action="alteracliente.php">
  <label>Informe o código do Cliente:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>


<?php
  
  function chamaFormAlterar($codigo, $nome, $cpf, $fone, $endereco, $profissao, $salario)
  {
?>

<form id="formAlterar" name="formAlterar" method="post" action="alteracliente.php">
   
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
      <label>Profissão:
      <input type="text" name="profissao" id="profissao"  value="<?php echo $profissao;?>" required>
      </label>
    </p>
    <p>
      <label>Sálario:
      <input type="text" name="salario" id="salario"  value="<?php echo $salario;?>" required>
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
  include_once("../include/ClienteResult.php");
  include_once("../controller/ClienteController.php");
  $obj = new ClienteController();   
  $obj->controlaAlteracao();
?>
</div>

</body>
</html>
<?php require_once '../Template/rodape.php' ?>
