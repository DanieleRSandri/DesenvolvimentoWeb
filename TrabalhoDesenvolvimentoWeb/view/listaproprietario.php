<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Consultar</title>
</head>
<body >

<?php require_once '../Template/cabecario.php' ?>

<div class="listas">
<h4 style="color: #24262b; text-align: center; "><b>Consulta  de Proprietário </b></h4>
<table style="color: #24262b; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;  width: 100%;">
  <tr style="border-collapse: collapse">
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Código</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Nome</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">CPF</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Telefone</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Endereço</th>
  </tr>
  <?php
   // include("../include/SessaoValidate.php"); 
    include_once("../controller/ProprietarioController.php");
    $obj = new ProprietarioController();
    $obj->controlaConsulta(1);
    
  ?>
</table>
</div>
</body>
</html>

<?php require_once '../Template/rodape.php'?>