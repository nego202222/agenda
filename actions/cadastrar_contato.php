<?php

// Verificar se a página está sendo carregada por POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once('classes/Contato.class.php');
    $c = new Contato();
    $c->nome = strip_tags($_POST['nome']);
    $c->email = strip_tags($_POST['email']);
    $c->telefone = strip_tags($_POST['telefone']);
    if($c->Cadastrar() == 1){
        // Redirecionar de volta à index.php:
        header('Location: ../index.php?sucesso=0');
    }else{
        header('Location: ../index.php?falha=0');
    }
}else{
    echo '<h3>Essa página deve ser carregada por POST.</h3>';
}


?>