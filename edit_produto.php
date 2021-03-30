<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_produtos = "SELECT * FROM produtos WHERE produto_id = '$id'";
$resultado_produtos = mysqli_query($conn, $result_produtos);
$row_produtos = mysqli_fetch_assoc($resultado_produtos);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar Produto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">	
	</head>
	<body>
		<div class="container">
			<a href="cadastrar_produto.php"><i class="fas fa-plus"></i>Cadastrar</a><br>
		<a href="listar.php"><i class="fas fa-list"></i>Listar</a><br>
		<center>
		<h1><i class="fas fa-edit"></i>Editar Produto</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		
		<form method="POST" action="proc_edit_produto.php" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $row_produtos['produto_id']; ?>">
			
			 <table >
                <tr>
                    <td ><label><h2>Nome do produto:</h2></label></td>
                    <td><br><input type="text" size="30" name="nome"  placeholder="Digitar o nome do produto" value="<?php echo $row_produtos['nome']; ?>"><br><br><td>
                   
                </tr>
                
                 <tr>
                    <td><label><h2>Descrição do produto:</h2></label></td>
                    <td><br><input type="text"  name="produto_descricao" placeholder="Digitar a descrição do produto" value="<?php echo $row_produtos['produto_descricao']; ?>"><br><br></td>
                </tr>   
                
                 <tr>
                    <td><label><h2>Categoria:</h2></label></td>
                    <td><br><input type="text"  name="produto_id_categoria" placeholder="Digitar a categoria do produto" value="<?php echo $row_produtos['produto_id_categoria']; ?>"><br><br></td>
                </tr>
                
                <tr>
                    <td><label><h2>Preço:</h2></label></td>
                    <td><br><input type="text" name="preco" placeholder="Digitar o preço do produto" value="<?php echo $row_produtos['preco']; ?>"><br><br></td>
                    
                </tr>
				
				<tr>
                    <td><label><h2>Imagemo:</h2></label></td>
                    <td><br><input type="text"  name="imagem" placeholder="Digitar a descrição do produto" value="<?php echo $row_produtos['imagem']; ?>"><br><br></td>
                </tr>
				<tr>
                    
                    <input type="hidden" name="imagem" placeholder="Digitar o preço do produto" value="<?php echo $row_produtos['imagem']; ?>"><br><br></td>
                    
                </tr>
                
                
                
                
            </table>
			
			
			
			
			<input type="submit" value="Editar">
		</form>
		</center>
	</body>
</html>