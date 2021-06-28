<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Imobiliaria DL</title>
<style>  
* {
  text-align: center;
}
p {
  font-weight: bold;
  color: red;
}

</style>
</head>
<body >
  <h3 style="text-align: center">Imobiliaria</h3>
  <?php
    include_once("../controller/UserController.php");
    $obj = new UserController();
    $obj->controlaConsulta();
  ?>
</body>
</html>