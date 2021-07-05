<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Excluir</title>

</head>
<body>

<?php require_once '../Template/cabecario.php' ?>

<div class="excluir">
<h3 style="color: black; text-align:center">Exclusão de um Imóvel</h3></br>
<form id="formBuscar" name="formBuscar" method="post" action="excluiimovel.php">
  <label style="color: black;">Informe o código do Imóvel:
    <input type="text" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <button class="btn btn-info" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">Buscar</button>
  </label>
</form>

<?php
 
  function  chamaFormExcluir($codigo, $situacao, $tipoimovel, $descricao, $aluguel, $codproprietario)
  {
?>

  <form id="formExcluir" name="formExcluir" method="post" action="excluiimovel.php"  onsubmit="return confirm(' Você tem certeza que deseja excluir este Imovel?');">
    
    <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
    <p>
      <label>Alugar ou Vender:
      <input type="text" name="situacao" id="situacao"  value="<?php echo $situacao;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Tipo do Imóvel:
      <input type="text" name="tipoimovel" id="tipoimovel" size="30" value="<?php echo $tipoimovel;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Descrição:
      <input type="text" name="descricao" id="descricao"  value="<?php echo $descricao;?>" required disabled>
      </label>
    </p>
    <p>
      <label>Valor do Aluguel:
      <input type="text" name="aluguel" id="aluguel"  value="<?php echo $aluguel;?>" required disabled>
      </label>
    </p>
    <p>
      <label style="color: black;">Proprietário:
      <select name="dono" id="dono" disabled>
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
        <button class="btn btn-danger" type="submit" name="button" id="button" value="Excluir">Excluir</button>
      </label>
    </p>
  </form>
<?php
    
  }
 // include("../include/SessaoValidate.php");  
  include_once("../include/ImovelResult.php");
  include_once("../controller/ImovelController.php");
  $obj = new ImovelController();   
  $obj->controlaExclusao();
?>
</div>

</body>
</html>
<?php require_once '../Template/rodape.php' ?>