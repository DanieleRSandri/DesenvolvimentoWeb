<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>IMOBILIARIA</title>  
 
</head> 
<body>

<?php require_once '../Template/cabecario.php' ?>


<div class="container">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <div class="item">
        <img src="../include/img/img3.jpg"alt="" style="width:100%;">
      </div>
    </div>
</div>
<hr>

<div class="div">
<H2 style="margin-left: 650px;"><b>Sistema de Gerenciamento de Imóveis</b></H2>
<div style="margin-left: 350px;" id="baner1">

  <h1 style="text-align: center;">CRUDS SIMPLES</h1>
  <p>Neste sistema, possuimos 4 Cruds Simples completos (cadastro, consulta, alteração e exclusão), são eles: proprietário, imóvel, 
  cliente e contrato.  
  </p>
  </div> 
  <div id="baner2">
  <H1 style="text-align: center;">CRUDS FK</H1>
  <p>Possuimos 2 Cruds FK, onde cadastrando o imóvel, vincula-se o proprietário e no cadastro de 
  contrato vincula-se o cliente a qual foi cadastrado.
  </p>
  </div> 
  <div id="baner3">
  <H1 style="text-align: center;">CONTRATO </H1>
  <p>O contrato fizemos da seguinte forma: o cliente deseja alugar o imóvel, o contrato pode ser cadastrado na hora
  preenchendo com a data de inicio e a data final acrescentando o valor mensal proposto.
  </p>
  </div> 
</div>
</body>
<?php require_once '../Template/rodape.php' ?>
</html>
