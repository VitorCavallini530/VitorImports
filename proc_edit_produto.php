<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$produto_descricao = filter_input(INPUT_POST, 'produto_descricao', FILTER_SANITIZE_STRING);
$produto_id_categoria = filter_input(INPUT_POST, 'produto_id_categoria');
$preco = filter_input(INPUT_POST, 'preco');
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_produtos = "UPDATE produtos SET nome='$nome', produto_descricao='$produto_descricao', produto_id_categoria='$produto_id_categoria',preco='$preco',imagem='$imagem' WHERE produto_id='$id'";
$resultado_produtos = mysqli_query($conn, $result_produtos);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
	header("Location: listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p>";
	header("Location: edit_produto.php?id=$id");
}
