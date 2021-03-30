<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_produtos = "DELETE FROM produtos WHERE produto_id='$id'";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto apagado com sucesso</p>";
		header("Location: listar.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o produto não foi apagado com sucesso</p>";
		header("Location: listar.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um produto</p>";
	header("Location: listar.php");
}
