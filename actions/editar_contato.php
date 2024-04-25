<?php


// Verificar a sessão:
    session_start();
    if(!isset($_SESSION['usuario'])){
      // Voltar pro login:
      header("Location: login.php");
      die();
    }


// Verificar se a página está sendo carregada por POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Contato.class.php');
    $c = new Contato();
    $c->nome = strip_tags($_POST['nome']);
    $c->email = strip_tags($_POST['email']);
    $c->telefone = strip_tags($_POST['telefone']);
    $c->id = strip_tags($_POST['id']);
    if($c->Modificar() == 1){
        // Redirecionar de volta à index.php:
        header('Location: ../index.php?sucesso=2');
    }else{
        header('Location: ../index.php?falha=2');
    }
}else{
    echo '<h3>Essa página deve ser carregada por POST.</h3>';
}

?>