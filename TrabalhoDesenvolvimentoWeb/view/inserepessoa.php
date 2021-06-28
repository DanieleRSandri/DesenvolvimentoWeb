<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Imobiliaria: Inserir</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>   
    <script type="text/javascript">
            $(document).ready(function(){
                $('#cpf').mask('000.000.000-00');
                $('#fone').mask('(00) 00000-0000');
                
        });
        </script>
<style>
a {
  text-decoration: none;
}
h3{
  text-align: center;
}
p{
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
._containerCadastroPessoa{
    width: 600px;
    height: 600px;
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
          <li><a href="#">Cadastrar pessoas</a></li>
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

<div class="_containerCadastroPessoa">

<h3 style="color: #24262b;"><b>Cadastro de uma nova pessoa</b></h3></br></br>
<form id="formInserir" name="formInserir" method="post" action="inserepessoa.php">

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
  include_once("../include/PessoaResult.php");
  include_once("../controller/PessoaController.php");
  $obj = new PessoaController();
  $obj->controlaInsercao();
?>

</body>
</html>
