<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('../actions/classes/usuarios_class.php');
    $u = new Usuario();
    $u->nome = strip_tags($_POST['nome']);
    $u->email = strip_tags($_POST['email']);
    $u->senha = strip_tags($_POST['senha']);
    if($u->Cadastrar() == 1){
        // Deu certo heheheh
        // Redirecionar de volta ao login:
        header("Location: ../login.php");
    }else{
        echo "Falha ao cadastrar usuario";
    }
}else{
    echo "Essa página dever ser carregada por post!";
}

?>