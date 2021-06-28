<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Consultar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
table, td, th {
  border: 1px solid black;
  text-align: center;
}

th {
  font-weight: bold;
  text-align: center;
}

table {
  border-collapse: collapse;
  text-align: center;
}
a {
  text-decoration: none;
}

body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
    padding: 30px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
.small{
  color:white;
  text-align: center;
}
.corp{
  text-align: center;
}
.listaimoveis{
    width: auto;
    height: auto;
    margin: auto;
    margin-top: 40vh;
    top: 40%;     
    transform: translate(0, -43%);
    padding: 50px 50px;
    color: white;
    background-color: transparent;
    box-shadow: 0 0 1em black;
    -webkit-box-shadow: 0 0 1em black;
    -moz-box-shadow: 0 0 1em black;
    backdrop-filter: saturate(70%) blur(5px);
}


</style>
</head>
<body >
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IMOBILIARIA-DL</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="inicio.php">inicio</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="inserepessoa.php">Cadastrar pessoas</a></li>
          <li><a href="insereimovel.php">Cadastrar imóvel</a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listapessoas.php">Consultar pessoas</a></li>
          <li><a href="listaimovel.php">Consultar imóvel</a></li>
         
        </ul>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Alterar <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="alteraimovel.php">Alterar imóvel</a></li>
        </ul>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Excluir <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="excluiimovel.php">Excluir imóvel</a></li>
          
        </ul>
        <li class="navbar-right"><a href="logout.php">Sair</a></li>
  </div>
</nav>
<div class="listaimoveis">
<h3 style="color: #24262b; text-align:center"><b>Consulta  de Imóveis </b></h3>

<table style="color: #24262b; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;  width: 100%;">
  <tr style="border-collapse: collapse">
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Código</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Deseja Alugar ou Vender?</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Tipo Imóvel</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Descrição Imóvel</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Valor do Aluguel</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Proprietário</th>
  </tr>
  <?php
   // include("../include/SessaoValidate.php"); 
    include_once("../controller/ImovelController.php");
    $obj = new ImovelController();
    $obj->controlaConsulta(1);
    
  ?>
</table>
</div>
<footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 		<ul>
  	 			  <h4>Trabalho de Desenvolvimento WEB</h4>
            <h4>Professor: Rafael Riehder</h4>
                    </div>
                
  	 		<div class="footer-col">
  	 			<h4>Contatos</h4>
  	 			<ul>
  	 				<li><a href="mailto:135966@upf.br">Danielle Regina Sandri</a></li>
  	 				<li><a href="mailto:183013@upf.br">Leonardo Mathias Lava</a></li>
  	 			
  	 			</ul>
  	 		</div>
  	 		</div>
  	 	</div>
  	 </div>
     </ul>
                        <div class="corp" >
        <ul>
          <li class="small">© Copyright 2021  <a href="#" style="color:white;font-weight:500;"></li>
        </ul>
      </div>
  </footer>

</body>
</html>