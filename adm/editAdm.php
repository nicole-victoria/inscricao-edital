
<?php
session_start();
require '../conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Inscrição</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbarAdm.php'); ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Editar usuário
                <a href="viewAdm.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <?php
              if (isset($_GET['id'])) {
                $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                $sql = "SELECT * FROM inscrito WHERE id='$usuario_id'";
                $query = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($query) > 0) {
                  $inscrito = mysqli_fetch_array($query);
              ?>
              <form id="formulario" action="acoesAdm.php" method="POST">
                <input type="hidden" name="usuario_id" value="<?=$inscrito['id']?>">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nome" value="<?=$inscrito['nome']?>" required class="form-control">
                </div>
                <div class="mb-3">
                  <label>CPF</label>
                  <input type="text" pattern="[0-9]*" minlength="11" maxlength="11" name="cpf" value="<?=$inscrito['cpf']?>" required class="form-control">
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <input type="email" name="email" value="<?=$inscrito['email']?>" required class="form-control">
                </div>
                <div class="mb-3"> 
                <label>Vaga desejada: </label>
                    <select id="vaga" name="vaga" value="<?=$inscrito['vaga']?>" required class="form-control">
                        <option value="Artífice de Manutenção - ALTAMIRA">Artífice de Manutenção - ALTAMIRA</option>
                        <option value="Agente Administrativo - ANANINDEUA">Agente Administrativo - ANANINDEUA</option>
                        <option value="Artífice de Manutenção - ANANINDEUA">Artífice de Manutenção - ANANINDEUA</option>
                        <option value="Motorista - ANANINDEUA">Motorista - ANANINDEUA</option>
                        <option value="Técnico A - Pedagogia - ANANINDEUA">Técnico A - Pedagogia - ANANINDEUA</option>
                        <option value="Técnico de laboratório (Nível Médio Profissionalizante) - ANANINDEUA">Técnico de laboratório (Nível Médio Profissionalizante) - ANANINDEUA</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - ALTAMIRA">Técnico em informática (Nível Médio Profissionalizante) - ALTAMIRA</option>
                        <option value="Técnico A - Pedagogia - BARCARENA">Técnico A - Pedagogia - BARCARENA</option>
                        <option value="Artífice de Manutenção - BELÉM">Artífice de Manutenção - BELÉM</option>
                        <option value="Auxiliar de serviços - BELÉM">Auxiliar de serviços - BELÉM</option>
                        <option value="Técnico A - Analista de tecnologia da informação e comunicação / TIC - Desenvolvimento de sistemas - BELÉM">Técnico A - Analista de tecnologia da informação e comunicação / TIC - Desenvolvimento de sistemas - BELÉM</option>
                        <option value="Técnico A - Analista de tecnologia da informação e comunicação / TIC - Infraestrutura de rede - BELÉM">Técnico A - Analista de tecnologia da informação e comunicação / TIC - Infraestrutura de rede - BELÉM</option>
                        <option value="Técnico A - Bacharelado em secretariado executivo - BELÉM">Técnico A - Bacharelado em secretariado executivo - BELÉM</option>
                        <option value="Técnico A - Biologia - BELÉM">Técnico A - Biologia - BELÉM</option>
                        <option value="Técnico A - Comunicação social - BELÉM">Técnico A - Comunicação social - BELÉM</option>
                        <option value="Técnico A - Designer - BELÉM">Técnico A - Designer - BELÉM</option>
                        <option value="Técnico A - Enfermagem - BELÉM">Técnico A - Enfermagem - BELÉM</option>
                        <option value="Técnico A - Engenharia ambiental - BELÉM">Técnico A - Engenharia ambiental - BELÉM</option>
                        <option value="Técnico A - Medicina clínica geral - BELÉM">Técnico A - Medicina clínica geral - BELÉM</option>
                        <option value="Técnico A - Pedagogia - BELÉM">Técnico A - Pedagogia - BELÉM</option>
                        <option value="Técnico A - Psicologia - BELÉM">Técnico A - Psicologia - BELÉM</option>
                        <option value="Técnico A - Serviço social - BELÉM">Técnico A - Serviço social - BELÉM</option>
                        <option value="Técnico A - Tradutor e intérprete de LIBRAS - BELÉM">Técnico A - Tradutor e intérprete de LIBRAS - BELÉM</option>
                        <option value="Técnico de laboratório (Nível Médio Profissionalizante) - BELÉM">Técnico de laboratório (Nível Médio Profissionalizante) - BELÉM</option>
                        <option value="Técnico em enfermagem (Nível Médio Profissionalizante) - BELÉM">Técnico em enfermagem (Nível Médio Profissionalizante) - BELÉM</option>
                        <option value="Técnico A - Psicologia - CAMETÁ">Técnico A - Psicologia - CAMETÁ</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - CAMETÁ">Técnico em informática (Nível Médio Profissionalizante) - CAMETÁ</option>
                        <option value="Motorista - CASTANHAL">Motorista - CASTANHAL</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - CASTANHAL">Técnico em informática (Nível Médio Profissionalizante) - CASTANHAL</option>
                        <option value="Auxiliar de serviços - IGARAPÉ AÇU">Auxiliar de serviços - IGARAPÉ AÇU</option>
                        <option value="Motorista - IGARAPÉ AÇU">Motorista - IGARAPÉ AÇU</option>
                        <option value="Técnico A - Pedagogia - MARABÁ">Técnico A - Pedagogia - MARABÁ</option>
                        <option value="Transcritor de Braille - MARABÁ">Transcritor de Braille - MARABÁ</option>
                        <option value="Artífice  de Manutenção - MOJU">Artífice  de Manutenção - MOJU</option>
                        <option value="Técnico A - Pedagogia - MOJU">Técnico A - Pedagogia - MOJU</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - MOJU">Técnico em informática (Nível Médio Profissionalizante) - MOJU</option>
                        <option value="Artífice de Manutenção - PARAGOMINAS">Artífice de Manutenção - PARAGOMINAS</option>
                        <option value="Técnico de laboratório (Nível Médio Profissionalizante) - PARAGOMINAS">Técnico de laboratório (Nível Médio Profissionalizante) - PARAGOMINAS</option>
                        <option value="Agente Administrativo- PARAUAPEBAS">Agente Administrativo- PARAUAPEBAS</option>
                        <option value="Artífice de Manutenção - PARAUAPEBAS">Artífice de Manutenção - PARAUAPEBAS</option>
                        <option value="Motorista- PARAUAPEBAS">Motorista- PARAUAPEBAS</option>
                        <option value="Técnico A - Pedagogia - PARAUAPEBAS">Técnico A - Pedagogia - PARAUAPEBAS</option>
                        <option value="Técnico de laboratório (Nível Médio Profissionalizante) - PARAUAPEBAS">Técnico de laboratório (Nível Médio Profissionalizante) - PARAUAPEBAS</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - PARAUAPEBAS">Técnico em informática (Nível Médio Profissionalizante) - PARAUAPEBAS</option>
                        <option value="Motorista - REDENÇÃO">Motorista - REDENÇÃO</option>
                        <option value="Técnico A - Pedagogia - REDENÇÃO">Técnico A - Pedagogia - REDENÇÃO</option>
                        <option value="Técnico A - Biblioteconomia - SALVATERRA">Técnico A - Biblioteconomia - SALVATERRA</option>
                        <option value="Técnico A - Pedagogia - SALVATERRA">Técnico A - Pedagogia - SALVATERRA</option>
                        <option value="Técnico de laboratório (Nível Médio Profissionalizante) - SANTARÉM">Técnico de laboratório (Nível Médio Profissionalizante) - SANTARÉM</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - SÃO MIGUEL DO GUAMÁ">Técnico em informática (Nível Médio Profissionalizante) - SÃO MIGUEL DO GUAMÁ</option>
                        <option value="Artífice  de Manutenção - TUCURUÍ">Artífice  de Manutenção - TUCURUÍ</option>
                        <option value="Técnico de laboratório (Nível Médio Profissionalizante) - TUCURUÍ">Técnico de laboratório (Nível Médio Profissionalizante) - TUCURUÍ</option>
                        <option value="Técnico em informática (Nível Médio Profissionalizante) - TUCURUÍ">Técnico em informática (Nível Médio Profissionalizante) - TUCURUÍ</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label>Documentação</label>
                  <input type="file" id="arquivo" name="documento" accept=".pdf" value="<?=$inscrito['documento']?>" required class="form-control">
                </div>
                <div class="mb-3">
                  <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                </div>
              </form>
              <script src="../inscricao/script.js"></script>
              <?php
              } else {
                echo "<h5>Usuário não encontrado</h5>";
              }
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