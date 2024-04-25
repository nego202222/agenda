<?php


$erro = 0;
if(isset($_GET['id'])){
 require_once('../agenda/actions/classes/contato.class.php');
 $c = new Contato();
 $c ->id = $_GET['id'];
 $resultado = $c ->ListarPorID();
    if(count($resultado) == 1){
        $resultado = $resultado[0];
    }else{
        $erro = 1;
        print_r($resultado);
    }
 
}else{
    $erro = 1;
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulário de Edição</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Formulário de Edição</h1>
<form action="actions/editar_contato.php" method="POST">
    <div class="form-group">
    <input type="hidden" name="id" value="<?=$resultado['id'] ?>" />
       
      </div>
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input  type="text" class="form-control" value="<?=$resultado['nome'] ?>" id="nome" name="nome">
      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" value="<?=$resultado['email'] ?>" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label>
        <input type="tel" class="form-control" value="<?=$resultado['telefone'] ?>" id="telefone" name="telefone">
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>