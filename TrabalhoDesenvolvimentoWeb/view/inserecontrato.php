<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Inserir</title>

</head>
<body >
<?php require_once '../Template/cabecario.php' ?>

<div class="containerCadastro">
<h4 style="color: #24262b; text-align: center; "><b>Cadastro de um Contrato de aluguel</b></h4>
<form id="formInserircontrato" name="formInserircontrato" method="post" action="inserecontrato.php">
  
                
                <div class="form-group">
                    <i class="fas fa-book"></i>
                    <input type="date" class="isbn form-control font" id="dtInicial" name="dtInicial" title="Data de Inicio" placeholder="Data de Inicio" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="date" class="form-control font" id="dtFinal" name="dtFinal" title="Data Final" placeholder="Data Final" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control font" id="valor" name="valor" title="valor" placeholder="Valor :" required>
                </div>
                <div class="form-group">
                <label style="color: black;" for="exampleFormControlSelect1">Vincular Cliente: </label>
                 <select class="form-control"  name="codcliente" id="codcliente" required>
                 <?php
                      include_once("../controller/ContratoController.php");
                       $obj = new ContratoController();
                       echo $obj->listaPessoasFK2();
                         ?>
                   </select></br></br>
                   </br>                
               
                <div class="form-group grid">
                    <input style="background-color: green; color:white" class="form-control " type="submit" name="insereimovel" value="Cadastrar">
                    <input style="background-color: red; color:white"  class="form-control " type="reset" value="Limpar" >
                    <input style="background-color: blue; color:white"  class="form-control " type="button" value="Voltar ao inicio" onclick="window.location.href='inicio.php'" >
                </div>
</form>
</div>

<?php
  include_once("../include/ContratoResult.php");  
  $obj->controlaInsercao();
?>
</body>
</html>
<?php require_once '../Template/rodape.php' ?>