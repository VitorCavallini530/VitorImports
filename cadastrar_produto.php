<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar produto<i class="fas fa-plus"></i></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <a href="cadastrar_produto.php"><i class="fas fa-plus"></i>Cadastrar</a><br>
			<a href="listar.php"><i class="fas fa-list"></i>Listar</a><br>
        <center>
        <h1><i class="fas fa-plus"></i>Cadastrar Produto </h1>
        
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">
      
            <table >
                <tr>
                    <td ><label><h2>Nome do produto:</h2></label></td>
                    <td><br><input type="text" name="nome" size="30" placeholder="Digitar o nome do produto"><br><br><td>
                   
                </tr>
                
                <tr>
                    <td><label><h2>Descrição do produto:</h2></label></td>
                    <td><br><input type="text" size="30" name="produto_descricao" placeholder="Digitar a descrição do produto"><br><br></td>
                    
                
                 <tr>
                    <td><label><h2>Categoria:</h2></label></td>
                    <td><br><input type="text" size="30" name="produto_id_categoria" placeholder="Digitar a categoria do produto"><br><br></td>
                </tr>
                
                <tr>
                    <td><label><h2>Preço:</h2></label></td>
                    <td><br><input type="text"size="30" name="preco" placeholder="Digitar o preço do produto"><br><br></td>
                    
                </tr>
                
                <tr>
                    <td><label><h2>Imagem:</h2></label></td>
                    <td><br><input type="file" name="imagem"><br><br></td>
                   
                </tr>
                
                <tr>
                    <td></td><td><input name="SendCadImg" type="submit" value="Cadastrar"></td>
                </tr>
            </table>
        </form>
        </center>
    </body>
</html>
