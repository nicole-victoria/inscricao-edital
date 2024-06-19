<?php
session_start();
require '../conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar inscrição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5" >
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Inscrição realizada com sucesso!
                <a href="../index.html" class="btn btn-success float-end" target="_self">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['ultima_insercao']) && !empty($_SESSION['ultima_insercao'])) {
                    // Recupere os dados da variável de sessão
                    $dados = $_SESSION['ultima_insercao'];

                ?>
                <div class="mb-3">
                  <label>Id</label>
                  <p class="form-control">
                    <?=$dados['id'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Nome</label>
                  <p class="form-control">
                    <?=$dados['nome'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>CPF</label>
                  <p class="form-control">
                    <?=$dados['cpf'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>E-mail</label>
                  <p class="form-control">
                    <?=$dados['email'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Vaga</label>
                  <p class="form-control">
                    <?=$dados['vaga'];?>
                  </p>
                </div>
                <div class="mb-3">
                  <label>Documentação</label>
                  <p class="form-control">
                    <?=$dados['documento'];?>
                  </p>
                </div>
                <?php
                 } else {
                    // Se não houver dados na sessão, exiba uma mensagem
                    echo "Não há dados de usuário na sessão.";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>