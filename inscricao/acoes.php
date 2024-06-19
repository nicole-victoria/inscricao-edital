<?php
session_start();
require '../conexao.php';
if (isset($_POST['create-usuario'])) {
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
	$vaga = mysqli_real_escape_string($conexao, trim($_POST['vaga']));
	$documento = mysqli_real_escape_string($conexao, trim($_POST['documento']));
	$sql = "INSERT INTO inscrito (nome, cpf, email, vaga, documento) VALUES ('$nome', '$cpf', '$email', '$vaga', '$documento')";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$id = mysqli_insert_id($conexao);
		$sql = "SELECT * FROM inscrito WHERE id = $id";
    	$resultado = mysqli_query($conexao, $sql);
    	$ultimoRegistro = mysqli_fetch_assoc($resultado);
		$dados = array(
			'id' => $ultimoRegistro['id'],
			'nome' => $ultimoRegistro['nome'],
			'cpf' => $ultimoRegistro['cpf'],
			'email' => $ultimoRegistro['email'],
			'vaga' => $ultimoRegistro['vaga'],
			'documento' => $ultimoRegistro['documento']
		);
		$_SESSION['ultima_insercao'] = $dados;
		header('Location: view.php');
		exit;
	} else {
		header('Location: view.php');
		exit;
	}
}

?>
