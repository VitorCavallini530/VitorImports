<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<title>Listar</title>		
	</head>
	<body>
		<div class="container">
			<a href="cadastrar_produto.php"><i class="fas fa-plus"></i>Cadastrar</a><br>
			<a href="listar.php"><i class="fas fa-list"></i>Listar</a><br>
			<h1><i class="fas fa-list"></i>Listar Produtos </h1>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			
			//Receber o número da página
			$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
			
			//Setar a quantidade de itens por pagina
			$qnt_result_pg = 100;
			
			//calcular o inicio visualização
			$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
			
			$result_produto = "SELECT * FROM produtos LIMIT $inicio, $qnt_result_pg";
			$resultado_produto = mysqli_query($conn, $result_produto);
			while($row_produtos = mysqli_fetch_assoc($resultado_produto)){
				echo "ID: " . $row_produtos['produto_id'] . "<br>";
				echo "Nome: " . $row_produtos['nome'] . "<br>";
				echo "produto_descricao: " . $row_produtos['produto_descricao'] . "<br>";
				echo "produto_id_categoria: " . $row_produtos['produto_id_categoria'] . "<br>";
				echo "preco: " . $row_produtos['preco'] . "<br>";
				echo "imagem: " . $row_produtos['imagem'] . "<br>";
				echo "<a href='edit_produto.php?id=" . $row_produtos['produto_id'] . "'>Editar</a><br>";
				echo "<a href='proc_apagar_usuario.php?id=" . $row_produtos['produto_id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";
			}
			
			?>	
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="js/personalizado.js"></script>		
	</body>
</html>