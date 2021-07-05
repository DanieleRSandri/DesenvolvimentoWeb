<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Consultar</title>

</head>
<body >
<?php require_once '../Template/cabecario.php' ?>

<div class="listas">
<h4 style="color: #24262b; text-align: center; "><b>Consulta  de Imóveis </b></h4>
<table style="color: #24262b; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;  width: 100%;">
  <tr style="border-collapse: collapse">
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Código</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Aluguel ou Venda</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Tipo Imóvel</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Descrição Imóvel</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Valor do Aluguel</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Proprietário</th>
  </tr>
  <?php
    //include("../include/SessaoValidate.php"); 
    include_once("../controller/ImovelController.php");
    $obj = new ImovelController();
    $obj->controlaConsulta(1);
    
  ?>
</table>
</div>
</body>
</html>
<?php require_once '../Template/rodape.php' ?>