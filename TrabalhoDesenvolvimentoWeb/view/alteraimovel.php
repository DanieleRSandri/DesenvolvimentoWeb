<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Imobiliaria: Alterar</title> 

</head>
<body>

<?php require_once '..//Template/cabecario.php' ?>

<div class="alterar">
<h3>Alteração de dados de um Imóvel</h3></br></br>
<form id="formBuscar" name="formBuscar" method="post" action="alteraimovel.php">
  <label>Informe o código do Imóvel:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>


<?php
  
  function chamaFormAlterar($codigo, $situacao, $tipoimovel, $descricao, $aluguel, $codproprietario)
  {
?>

<form id="formAlterar" name="formAlterar" method="post" action="alteraimovel.php">
   
    <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
    <p>
      <label>Alugar ou Vender:
      <input type="text" name="situacao" id="situacao"  value="<?php echo $situacao;?>" required>
      </label>
    </p>
    <p>
      <label>Tipo do Imóvel:
      <input type="text" name="tipoimovel" id="tipoimovel" size="30" value="<?php echo $tipoimovel;?>" required>
      </label>
    </p>
    <p>
      <label>Descrição:
      <input type="text" name="descricao" id="descricao"  value="<?php echo $descricao;?>" required>
      </label>
    </p>
    <p>
      <label>Valor:
      <input type="text" name="aluguel" id="aluguel"  value="<?php echo $aluguel;?>" required>
      </label>
    </p>
    <p>
      <label>Proprietário:
      <select name="dono" id="dono" required>
        <?php
          include_once("../controller/ImovelController.php");
          $obj = new ImovelController();
          echo $obj->listaPessoasFK($codproprietario);
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
  include_once("../include/ImovelResult.php");
  include_once("../controller/ImovelController.php");
  $obj = new ImovelController();   
  $obj->controlaAlteracao();
?>
</div>

</body>
</html>
<?php require_once '../Template/rodape.php' ?>