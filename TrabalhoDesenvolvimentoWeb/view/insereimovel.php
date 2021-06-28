<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Imobiliaria: Inserir</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<style>
a {
  text-decoration: none;
}
h3{
  text-align: center;
}
form{
  text-align: center;
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
._containerCadastroimovel{
    width: 600px;
    height: 600px;
    margin: auto;
    margin-top: 40vh;   
    transform: translate(0, -43%);
    padding: 30px 50px;
    color: white;
    background-color: transparent;
    box-shadow: 0 0 1em black;
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
          <li><a href="listacarros.php">Consultar imóvel</a></li>
         
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

<div class="_containerCadastroimovel">

<h3 style="color: #24262b;"><b>Cadastro de um novo Imóvel</b></h3></br></br>
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
                    <input type="text" class="form-control font" id="aluguel" name="aluguel" title="aluguel" placeholder="Valor do Aluguel:" required>
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
                
                </div></br>
                </br>
                <div class="form-group grid">
                    <input style="background-color: green; color:white" class="form-control " type="submit" name="inserepessoa" value="Cadastrar">
                    <input style="background-color: red; color:white"  class="form-control " type="reset" value="Limpar" >
                    <input style="background-color: blue; color:white"  class="form-control " type="button" value="Voltar ao inicio" onclick="window.location.href='inicio.php'" >
                </div>
</form>
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
<?php
  include_once("../include/ImovelResult.php");  
  $obj->controlaInsercao();
?>
</body>
</html>