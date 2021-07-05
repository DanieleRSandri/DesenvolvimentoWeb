<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Imobiliaria: Inserir</title>

</head>
<body>
<?php require_once '../Template/cabecario.php' ?>

<div class="containerCadastro">
<h4 style="color: #24262b; text-align: center; "><b>Cadastro de um novo Cliente</b></h4>
<form id="formInserir" name="formInserir" method="post" action="inserecliente.php">

<div class="form-group">
                    <i class="fas fa-book"></i>
                    <input type="text" class="form-control font" id="nome" name="nome" title="Digite seu nome completo" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-book-reader"></i>
                    <input type="text" class="form-control font" id="cpf" name="cpf" placeholder="CPF" maxlength="14" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="fone" class="form-control font" id="fone" name="fone" title="Digite seu contato telefônico" placeholder="Fone" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control font" id="endereco" name="endereco" title="Digite o endereço completto" placeholder="Endereço" required>

                  </div>
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control font" id="profissao" name="profissao" title="Informe sua profissão" placeholder="Profissão" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control font" id="salario" name="salario" title="Informe seu salário" placeholder="Salário" required>
                
                  </div>

                <div class="form-group grid">
                    <input style="background-color: green; color:white" class="form-control " type="submit" name="inserecliente" value="Cadastrar">
                    <input style="background-color: red; color:white"  class="form-control " type="reset" value="Limpar" >
                    <input style="background-color: blue; color:white"  class="form-control " type="button" value="Voltar ao inicio" onclick="window.location.href='inicio.php'" >
                </div>
               
            </form>
</div>

<?php
  include_once("../include/ClienteResult.php");
  include_once("../controller/ClienteController.php");
  $obj = new ClienteController();
  $obj->controlaInsercao();
?>

</body>
</html>
<?php require_once '../Template/rodape.php' ?>
