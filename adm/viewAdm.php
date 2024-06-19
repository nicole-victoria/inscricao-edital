<?php
session_start();
require '../conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscrições</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../inscricao/inscrição.css">
  </head>
  <body>
    <div id="content" style="display:none;">
    <?php include('navbarAdm.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4> Lista de Inscritos
                <a href="../index.html" class="btn btn-primary float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Vaga desejada</th>
                    <th>Documentação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM inscrito';
                  $usuarios = mysqli_query($conexao, $sql);
                  if (mysqli_num_rows($usuarios) > 0) {
                    foreach($usuarios as $inscrito) {
                  ?>
                  <tr>
                    <td><?=$inscrito['id']?></td>
                    <td><?=$inscrito['nome']?></td>
                    <td><?=$inscrito['cpf']?></td>
                    <td><?=$inscrito['email']?></td>
                    <td><?=$inscrito['vaga']?></td>
                    <td><?=$inscrito['documento']?></td>
                    <td>
                      <a href="editAdm.php?id=<?=$inscrito['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                      <form action="acoesAdm.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$inscrito['id']?>" class="btn btn-danger btn-sm">
                          <span class="bi-trash3-fill"></span>&nbsp;Excluir
                        </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                 } else {
                   echo '<h5>Nenhum inscrito encontrado</h5>';
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <div id="login" style="display:block;">  
      <h3 style="text-align: center; margin-top: 10%; color: rgb(12, 69, 95);font-weight: bold;">Para acessar, é necessário fazer login:</h3>
      <h5 style="text-align: center; color: rgb(12, 69, 95); font-style:italic;">Senha: senhaAdm</h5>
      <form>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <label for="user" class="form-label">Usuário</label>
            <input type="text" class="form-control mb-3" value="Administrador" aria-label="Disabled input example" disabled readonly id="user">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control mb-3" id="password">
            <button type="button" onclick="verificarSenha()" class="btn btn-primary mx-auto d-block">Enviar</button>
          </div>
        </div>
      </form>
    </div>
    <script>
      function verificarSenha(){
        var senhaInserida = document.getElementById("password").value;
        var senhaCorreta = "senhaAdm";

        if(senhaInserida == senhaCorreta){
          document.getElementById("content").style.display = "block";
          document.getElementById("login").style.display = "none";
        } else{
          alert("Senha Incorreta. Por favor, tente novamente.")
          document.getElementById("password").value = "";
        }
      }
    </script>
    
  
    
    
  </body>
</html>