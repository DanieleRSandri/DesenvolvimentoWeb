<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Imobiliaria: Alterar</title> 

</head>
<body>

<?php require_once '..//Template/cabecario.php' ?>

<div class="alterar">
<h3>Alteração Contrato</h3></br></br>
<form id="formBuscar" name="formBuscar" method="post" action="alteracontrato.php">
  <label>Informe o código do Contrato:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>


<?php
  
  function chamaFormAlterar($codigo, $dtInicial, $dtFinal, $valor, $codcliente)
  {
?>

<form id="formAlterar" name="formAlterar" method="post" action="alteracontrato.php">
   
    <input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo;?>">
    <p>
      <label>Data Inicial:
      <input type="date" name="dtInicial" id="dtInicial"  value="<?php echo $dtInicial;?>" required>
      </label>
    </p>
    <p>
      <label>Data Final:
      <input type="date" name="dtFinal" id="dtFinal"  value="<?php echo $dtFinal;?>" required>
      </label>
    </p>
    <p>
      <label>Valor:
      <input type="text" name="valor" id="valor"  value="<?php echo $valor;?>" required>
      </label>
    </p>
   
    <p>
      <label>Cliente:
      <select name="codcliente" id="codcliente" required>
        <?php
          include_once("../controller/ContratoController.php");
          $obj = new ContratoController();
          echo $obj->listaPessoasFK2($codcliente);
        ?>
      </select>
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
  include_once("../include/ContratoResult.php");
  include_once("../controller/ContratoController.php");
  $obj = new ContratoController();   
  $obj->controlaAlteracao();
?>
</div>

</body>
</html>
<?php require_once '../Template/rodape.php' ?>