<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>IMOBILIARIA</title>  
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="../Template/estilos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>   
    <script type="text/javascript">
            $(document).ready(function(){
                $('#cpf').mask('000.000.000-00');
                $('#fone').mask('(00) 00000-0000');
                
        });
        </script>
</head> 
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="inicio.php">IMOBILIARIA-DL</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="inicio.php">inicio</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="insereproprietario.php">Cadastrar proprietario</a></li>
          <li><a href="insereimovel.php">Cadastrar imóvel</a></li>
          <li><a href="inserecliente.php">Cadastrar cliente</a></li>
          <li><a href="inserecontrato.php">Cadastrar contrato</a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listaproprietario.php">Consultar proprietario</a></li>
          <li><a href="listaimovel.php">Consultar imóvel</a></li>
          <li><a href="listacliente.php">Consultar cliente</a></li>
          <li><a href="listacontrato.php">Consultar contrato</a></li>
         
        </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Alterar <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="alteraproprietario.php">Alterar proprietario</a></li>
          <li><a href="alteraimovel.php">Alterar imóvel</a></li>
          <li><a href="alteracliente.php">Alterar cliente</a></li>
          <li><a href="alteracontrato.php">Alterar Contrato</a></li>
        </ul>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Excluir <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="excluiproprietario.php">Excluir proprietario</a></li>
          <li><a href="excluiimovel.php">Excluir imóvel</a></li>
          <li><a href="excluicliente.php">Excluir cliente</a></li>
          <li><a href="excluicontrato.php">Excluir Contrato</a></li>
        </ul>
        <li class="navbar-right"><a href="logout.php">Sair</a></li>
  </div>
</nav>

  <main role="main">
