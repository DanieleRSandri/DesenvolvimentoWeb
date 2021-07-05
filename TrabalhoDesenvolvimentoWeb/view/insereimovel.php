<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Inserir</title>

</head>
<body >
<?php require_once '../Template/cabecario.php' ?>

<div class="containerCadastro">
<h4 style="color: #24262b; text-align: center; "><b>Cadastro de um novo Imóvel</b></h4></br></br>
<form id="formInserirCarro" name="formInserirCarro" method="post" action="insereimovel.php">
  
                    <div class="form-group">
                    <i class="fas fa-book"></i>
                    <input type="text" class="isbn form-control font" id="situacao" name="situacao" title="situacao" placeholder="Deseja Alugar ou Vender?" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-book"></i>
                    <input type="text" class="isbn form-control font" id="tipoimovel" name="tipoimovel" title="Tipo do Imóvel" placeholder="Tipo do Imóvel" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="fone" class="form-control font" id="descricao" name="descricao" title="Descrição do Imóvel" placeholder="Descrição do Imóvel" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i>
                   <input type="text" class="form-control font" id="aluguel" name="aluguel" title="aluguel" placeholder="Valor:" required>
                </div>

                <div class="form-group">
                <label style="color: black;" for="exampleFormControlSelect1">Vincular Poprietário: </label>
                 <select class="form-control"  name="dono" id="dono" required>
                 <?php
                      include_once("../controller/ImovelController.php");
                       $obj = new ImovelController();
                       echo $obj->listaPessoasFK();
                         ?>
                   </select>
                
                </div>
                <div class="form-group grid">
                    <input style="background-color: green; color:white" class="form-control " type="submit" name="insereimovel" value="Cadastrar">
                    <input style="background-color: red; color:white"  class="form-control " type="reset" value="Limpar" >
                    <input style="background-color: blue; color:white"  class="form-control " type="button" value="Voltar ao inicio" onclick="window.location.href='inicio.php'" >
                </div>
</form>
</div>

<?php
  include_once("../include/ImovelResult.php");  
  $obj->controlaInsercao();
?>
</body>
</html>
<?php require_once '../Template/rodape.php' ?>