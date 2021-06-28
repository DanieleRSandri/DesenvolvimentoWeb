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
<style>
  
body{
	line-height: 1.0;
	font-family: 'Poppins', sans-serif;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.container{
	max-width: 12170px;
	margin: auto;

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
	position: relative;

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
.div1{
	box-shadow: 1px 10px 5px grey; 
	background-color: white; 
	border: radius 5px; 
	text-align:center;
	padding: 200px; 

}
.div{
  width: auto;
  height: auto;
  display:inline-block;
}
#baner1{
    width: 300px;
    height: 370px;
    position: relative;
    margin: 80px;   
    background-color: transparent;
    padding: 30px 50px;
    display:inline-block;
    margin-left: 130px;

}
#baner1:hover{
    transform: scale(1.2); 
    box-shadow: 0 5px 15px rgba(0,0,0,0.6);
    border: 5px solid black;

}
#baner2{
    width: 300px;
    height: 370px;
    position: relative;
    margin: 80px;   
    background-color: transparent;
    padding: 30px 50px;
    display:inline-block;
    margin-left: auto;
}
#baner2:hover{
    border: 5px solid black;
    transform: scale(1.2); 
    box-shadow: 0 5px 15px rgba(0,0,0,0.6);
  }
#baner3{
    width: 300px;
    height: 370px;
    position: relative;
    margin: 80px;   
    background-color: transparent;
    padding: 30px 50px;
    display:inline-block;
    margin-left: auto;
}
#baner3:hover{
    border: 5px solid black;
    transform: scale(1.2); 
    box-shadow: 0 5px 15px rgba(0,0,0,0.6);
}
</style>
</head> 
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">IMOBILIARIA-DL</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">inicio</a></li>
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

<div class="container">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></>
    </ol>

  
    <div class="carousel-inner">
      <div class="item active">
        <img src="../include/img/logo1.png" alt="" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="../include/img/img3.jpg"alt="" style="width:100%;">
      </div>
    </div>

   
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<hr>
<div class="div">
<div id="baner1">

  <H2>Sitema de gerenciamento de Imóveis</H2>
  <p> No Flag de cadastro, podemos cadastrar o dono do imóvel e seu imóvel em seguida pode-se 
  vincular o proprietario ao cadastro do imóvel
  </p>
  </div> 
  <div id="baner2">
  <H2>Consultas</H2>
  <p>Na tela de consultas podemos visualizar a pessoa cadastrada e seu imóvel.
  </p>
  </div> 
  <div id="baner3">
  <H2>Demais Funções </H2>
  <p>Podemos alterar ou excluir o Imóvel desejado
  </p>
  </div> 
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
