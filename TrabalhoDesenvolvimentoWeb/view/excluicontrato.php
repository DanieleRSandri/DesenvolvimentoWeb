<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Excluir</title>

</head>
<body>

<?php require_once '../Template/cabecario.php' ?>

<div class="excluir">
<h3 style="color: black; text-align:center">Exclusão de um Contrato</h3></br>
<form id="formBuscar" name="formBuscar" method="post" action="excluicontrato.php">
  <label style="color: black;">Informe o código do Contrato:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>

<?php
  function chamaFormExcluir($codigo, $dtInicial, $dtFinal, $valor, $codcliente)
        
    
  {
?>

  <form id="formExcluir" name="formExcluir" method="post" action="excluicontrato.php"  onsubmit="return confirm(' Você tem certeza que deseja excluir este Contrato?');">
    
    <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
    <p>
      <label>Data Inicial:
      <input type="date" name="dtInicial" id="dtInicial"  value="<?php echo $dtInicial;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Data Final:
      <input type="date" name="dtFinal" id="dtFinal" size="30" value="<?php echo $dtFinal;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Valor Mensal:
      <input type="text" name="descricao" id="descricao"  value="<?php echo $valor;?>" required disabled>
      </label>
    </p>
   
    <p>
      <label style="color: black;">cliente:
      <select name="codcliente" id="codcliente" disabled>
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
        <button class="btn btn-danger" type="submit" name="button" id="button" value="Excluir">Excluir</button>
      </label>
    </p>
  </form>
<?php
    
  }
 // include("../include/SessaoValidate.php");  
  include_once("../include/ContratoResult.php");
  include_once("../controller/ContratoController.php");
  $obj = new ContratoController();   
  $obj->controlaExclusao();
?>
</div>

</body>
</html>
<?php require_once '../Template/rodape.php' ?>