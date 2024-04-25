<?php

// Verificar a sessão:
  session_start();
  if(!isset($_SESSION['usuario'])){
    // Voltar pro login:
    header("Location: login.php");
    die();
  }


require_once('actions/classes/Contato.class.php');
$c = new Contato();
$tabela = $c->Listar();

// print_r($tabela);

// Arrays com mensagens:

$msg_sucesso = ["Contato cadastrado com sucesso!",
                "Contato removido com sucesso!",
                "Contato modificado com sucesso!"];
$msg_falhas = ["Falha ao cadastrar contato.",
               "Falha ao remover contato.",
               "Falha ao modificar contato."];

?>


<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Cadastro de Contatos</title>
</head>

<body>
<div class="container d-flex flex-column">
    <a href="sair.php" class="btn btn-danger mt-2 align-self-end">Sair</a>
    <h1>Cadastro de contatos</h1>
    <h3>Painel de <?=$_SESSION['usuario']['nome'];?></h3>
    <form class="form-group" action="actions/cadastrar_contato.php" method="POST">
      <label for="nome">Nome completo:</label>
      <input type="text" id="nome" name="nome" class="form-control" required>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" class="form-control" required>
      <label for="telefone">Telefone:</label>
      <input type="tel" id="telefone" name="telefone" class="form-control">
      <label for="telefone">Telefone 2 :</label>
      <input type="tel" id="telefone" name="telefone" class="form-control">
      <br>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <?php if(isset($_GET['sucesso']) and $_GET['sucesso']<count($msg_sucesso)){ ?>
      <div class="alert alert-success" role="alert">
        <?=$msg_sucesso[ $_GET['sucesso'] ]; ?>
      </div>
    <?php } ?>

    <?php if(isset($_GET['falha']) and $_GET['falha']<count($msg_falhas)){ ?>
      <div class="alert alert-danger" role="alert">
      <?=$msg_falhas[ $_GET['falha'] ]; ?>
      </div>
    <?php } ?>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>

        <!-- Insira aqui as linhas da tabela com os dados dos contatos -->

        <!-- Exemplo de linha da tabela com um contato fictício -->
        <?php foreach ($tabela as $linha) {  ?>
          <tr>
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['email']; ?></td>
            <td><?= $linha['telefone']; ?></td>
            <td><a href="editar.php?id=<?= $linha['id']; ?>">Editar</a> | <a href="actions/excluir_contato.php?id=<?= $linha['id']; ?>">Excluir</a></td>
          </tr>
        <?php } ?>
        <!-- Repita esse formato para cada contato cadastrado -->

      </tbody>

    </table>

  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>