<?php


// Verificar a sessão:
    session_start();
    if(!isset($_SESSION['usuario'])){
      // Voltar pro login:
      header("Location: login.php");
      die();
    }

if(isset($_GET['id'])){
    require_once('../actions/classes/contato.class.php');
    $c = new Contato();
    $c->id = $_GET['id'];
    if($c->Apagar() == 1){
        // Redirecionar:
        header('Location: ../index.php');
    }else{
        echo "Erro ao apagar.";
    }

}else{
    echo '<h3>O ID deve ser informado na URL.</h3>';
}


?>