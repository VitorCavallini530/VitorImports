<?php

session_start();
include_once './cadastro.php';
//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    //Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $produto_descricao = filter_input(INPUT_POST, 'produto_descricao', FILTER_SANITIZE_STRING);
    $produto_id_categoria = filter_input(INPUT_POST, 'produto_id_categoria');
    $preco = filter_input(INPUT_POST, 'preco');
    $imagem = $_FILES['imagem']['name'];
    //var_dump($_FILES['imagem']);
    //Inserir no BD
    $result_img = "INSERT INTO produtos (nome,produto_descricao,produto_id_categoria,preco,imagem) VALUES (:nome,:produto_descricao,:produto_id_categoria,:preco,:imagem)";
    $insert_msg = $connect->prepare($result_img);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':produto_descricao', $produto_descricao);
    $insert_msg->bindParam(':produto_id_categoria', $produto_id_categoria);
     $insert_msg->bindParam(':preco', $preco);
    $insert_msg->bindParam(':imagem', $imagem);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        //Recuperar último ID inserido no banco de dados
        $ultimo_id = $connect->lastInsertId();

        //Diretório onde o arquivo vai ser salvo
        $diretorio = 'imgbdo/' . $ultimo_id.'/';

        //Criar a pasta de foto 
       // mkdir($diretorio, 0755);
        
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvo com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: cadastrar_produto.php");
        }else{
            $_SESSION['msg'] = "<p><span style='color:green;'>Dados salvo com sucesso. </span><span style='color:red;'>Erro ao realizar o upload da imagem</span></p>";
            header("Location: cadastrar_produto.php");
        }        
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
        header("Location: cadastrar_produto.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: cadastrar_produto.php");
}