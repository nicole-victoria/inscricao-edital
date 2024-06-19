
<?php
session_start();
require '../conexao.php';
if (isset($_POST['update_usuario'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
	$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
	$vaga = mysqli_real_escape_string($conexao, trim($_POST['vaga']));
    $documento = mysqli_real_escape_string($conexao, trim($_POST['documento']));
	$sql = "UPDATE inscrito SET nome = '$nome', cpf='$cpf', email = '$email', vaga = '$vaga', documento='$documento'";
	$sql .= " WHERE id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Inscrição atualizada com sucesso';
		header('Location: viewAdm.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Inscrição não foi atualizada';
		header('Location: viewAdm.php');
		exit;
	}
}
if (isset($_POST['delete_usuario'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
	$sql = "DELETE FROM inscrito WHERE id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Inscrição deletada com sucesso';
		header('Location: viewAdm.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Inscrição não foi deletada';
		header('Location: viewAdm.php');
		exit;
	}
}
?>