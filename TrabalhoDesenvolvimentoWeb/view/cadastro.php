<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Imobiliaria Login</title>
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
</style>
</head>
<body>
<div style="box-shadow: 1px 10px 5px grey; background-color: white; padding: 200px; border: radius 5px; text-align:center">
<h3 > <i><b> Cadastro de um novo usuário</i></b></h3></br>
<form id="formInserir" name="formInserir" method="post" action="cadastro.php">
<div>
  <div class="form-group" >
    <label>Usuário:
      <input type="text" name="user" id="user" size="30" minlength="3" pattern="[a-z0-9._%+-]+" required>
    </label>
  </div>
  <div class="form-group">
    <label>Senha:
	  <input type="password" name="pwd" id="pwd" size="30" minlength="6" required>
    </label>
  </div>
  <div class="form-group" style="text-align: center;" >
    <label>E-mail:
	  <input type="email" name="email" id="email" size="30" required>
    </label>
  </div>

  <div>
    <label>
      <button type="submit" class="btn btn-primary"  >Enviar</button>
    </label>
    <a href="../index.php" style="text-decoration: none">
  <button type="button" class="btn btn-success">Voltar para tela de login</button>
</a>

    </div>
</form>
</div>
</div>

<?php
  include_once("../include/UserResult.php");
  include_once("../controller/UserController.php");
  $obj = new UserController();
  $obj->controlaInsercao();
?>


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
