<?php
require_once("../model/FabricaConexao.php");
require_once("../model/User.php");
require_once("../model/UserDAO.php");

class UserController {

  public function controlaConsulta() {
    if (!empty($_POST['user']) && !empty($_POST['pwd'])) {
      $user = new User();
      $user->apelido = $_POST['user'];
      $user->senha = md5($_POST['pwd']);
  
      $DAO = new UserDAO();
      $result = $DAO->Consultar($user);
  
      if($result) { 
        if($result == -2) {
          echo "<p>USUÁRIO NÃO ENCONTRADO!</p>";
          echo "<a href=\"../index.php\"><button>Voltar</button></a>";  
        }
        else if($result == -1) {
          echo "<p>SENHA INVÁLIDA!</p>";
          echo "<a href=\"../index.php\"><button>Voltar</button></a>";  
        }
        else {  
          session_start();
          $_SESSION["nome_usuario"] = $user->apelido;
          $_SESSION["senha_usuario"] = $user->senha;
          header("location: ../view/inicio.php"); 
        }
      }
    }
  }

  public function controlaInsercao() {
    if(isset($_POST["user"]) && isset($_POST["pwd"]) && isset($_POST["email"])) {
      $erros = array();
      $user = new User();
      $user->apelido = $_POST['user'];
      $user->senha = md5($_POST['pwd']);
      $user->email = $_POST["email"];
  
      $DAO = new UserDAO();
      $result = $DAO->Inserir($user);
      if($result == 1) {
        $res = "USUÁRIO CADASTRADO COM SUCESSO!";
        header("Location: ../view/cadastro.php?result=$res");
      }
      else if($result == -1) {
        $erros[] = "USUÁRIO JÁ EXISTENTE! TENTE NOVAMENTE!";
        $err = serialize($erros);
        header("Location: ../view/cadastro.php?error=$err");
      }	  
      else {
        $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
        $err = serialize($erros);
        header("Location: ../view/cadastro.php?error=$err");
      }
      
      unset($user);
    }
  }
}

?>
