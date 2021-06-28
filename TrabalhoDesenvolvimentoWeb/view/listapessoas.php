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
	position: absolute;
	width: 100%;
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
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
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
.div1{
	box-shadow: 1px 10px 5px grey; 
	background-color: white; 
	border: radius 5px; 
	text-align:center;
	padding: 200px; 

}
.listapessoas{
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
<body  >
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



<div class="listapessoas">
 
<h3 style="color: #24262b; text-align:center"><b>Consulta  de Cliente </b></h3>
<table style="color: #24262b; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse;  width: 100%;">
  <tr style="border-collapse: collapse">
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Código</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Nome</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">CPF</th>
	<th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Telefone</th>
	<th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Endereço</th>
    <th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Profissão</th>
	<th style="padding-top: 12px;  padding-bottom: 12px;  text-align: center;  background-color: #04AA6D;  color: white;">Salario</th>
   
  </tr>
  
 
 
  
  <?php
   //include("../include/SessaoValidate.php");  
    include_once("../controller/PessoaController.php");
    $obj = new PessoaController();
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