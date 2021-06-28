<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Controle de acesso - Imobiliaria</title>
<style>
  body {
    background-color: #f0f0f0;
    font-family: sans-serif;
}
.card-top{
    text-align: center;
}
.card-group{
  margin-bottom: 30px;
}
.form{
  width: 400px;
  margin: auto;
  padding-top: 40px;
}

.card {
    box-shadow: 1px 1px 5px grey;
    background-color: white;    
    padding: 40px;
    border-radius: 5px;
}
.card-group > label{
    width: 100%;
    color: #ccc;
    display: block;

}
.card-group > input{
    border-radius: 5px;
    outline: 0;
    width: 100%;
    height: 25px;
    padding: 5px;

}
.card-group > button{
  background-image: linear-gradient(to right, red, blue);
  width: 100%;
  border-radius: 30px;
  padding: 15px;
  color: white;
  border: 0px;
  outline: 0;
}
.btn button:hover{
  background-image: linear-gradient(to left, red, blue);
  color: white;
}

.imglogin{
    border-radius: 50px;
    width: 100px;
    box-shadow: 1px 1px 5px #ccc;
}
.title{
    color: #dc3545;
}
.itemfinal{
  color: black;
}
</style>
</head>
<body>
  
  <form class = "form" id="form1" style="text-align: center" name="form1" method="post" action="./view/login.php">
  <div class="card"> 
    <div class="card-top">
      <img class="imglogin" src="../Trabalho desenvolvimento WEB/include/img/img1.jpeg" alt="">
      <h2 class="title" >Painel de Controle</h2>
      <p>Gerencie seu negócio</p>    
    </div>

    <div class="card-group">
      <label>Nome do usuário:</label>
      <input type="text" name="user" id="user" placeholder="Nome do usuário" required>
    </div>
    <div class="card-group">
      <label>Senha:</label>
      <input type="password" name="pwd" id="pwd" placeholder="Digite sua senha" required>
    </div></br></br>
  
      <div class="card-group btn">
        <button type="submit" name="enviar" id="enviar" value="Enviar">Acessar</button></br></br>
        <p class ="itemfinal" id="novo" style="text-align: center">Ainda não possui cadastro? Faça seu registro <a class="itemfinal" href="./view/cadastro.php" target="_self"><b>aqui</b></a></p>
      </div>
  </div>
</form>

</body>
</html>
