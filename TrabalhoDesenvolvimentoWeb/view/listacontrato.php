<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Consultar</title>

</head>
<body >
<?php require_once '../Template/cabecario.php' ?>

<div class="listas">
<h4 style="color: #24262b; text-align: center; "><b>Consulta  de contratos </b></h4>
<table style="color: #24262b; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;  width: 100%;">
  <tr style="border-collapse: collapse">
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Código</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Data Inicial</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Data Final</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Valor</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Cliente</th>
    
  </tr>
  <?php
    //include("../include/SessaoValidate.php"); 
    include_once("../controller/ContratoController.php");
    $obj = new ContratoController();
    $obj->controlaConsulta(1);
    
  ?>
</table>
</div>
</body>
</html>
<?php require_once '../Template/rodape.php' ?>