<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<?php
session_start();
require 'php/conexao.php';
require_once "pagseguro-php-sdk-master/vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

try{
    //cria sessao de pagamento
    $sessionCode = \PagSeguro\Services\Session::create(
    \PagSeguro\Configuration\Configure::getAccountCredentials()
            );
    
    //inicio requisição de pagamento
    $payment = new \PagSeguro\Domains\Requests\Payment();
    
    //add os produtos
    $id_pedido = addslashes($_GET['id']);
    $read_pedido= mysqli_query($connect, "SELECT * FROM pedido WHERE pedido_id = '".$id_pedido."'");
    
    if(mysqli_num_rows($read_pedido) > '0'){
        foreach ($read_pedido as $read_pedido_view);
        $read_itens_pedido = mysqli_query($connect, "SELECT itens_pedido.itens_pedido_id_pedido, itens_pedido.itens_pedido_id_produto, itens_pedido.itens_pedido_quantidade, itens_pedido.itens_pedido_valor_produto, itens_pedido.itens_pedido_valor_total, produtos.produto_id, produtos.nome  FROM itens_pedido INNER JOIN produtos ON produtos.produto_id =itens_pedido.itens_pedido_id_produto WHERE itens_pedido_id_pedido = '".$id_pedido."'");
        if(mysqli_num_rows($read_itens_pedido) > '0'){
            foreach ($read_itens_pedido as $read_itens_pedido_vieew){
                $count_prod++;
                $payment->addItems()->withParameters(
                    $count_prod,
                    $read_itens_pedido_vieew['nome'],
                    $read_itens_pedido_vieew['itens_pedido_quantidade'],
                    $read_itens_pedido_vieew['itens_pedido_valor_produto']
                );
            }
        }
    }
    //moeda
    $payment->setCurrency("BRL");
    //referencia para fazer baixa automatica
    $payment->setReference($id_pedido);
    //url depois de finalizar a venda
    $payment->setRedirectUrl("http://localhost/camisetas/meus-pedidos.php");
    //dados do comprador
    $payment->setSender()->setName('Vitor de Siqueira Cavallini');
    $payment->setSender()->setEmail('vitorsiqueira530@gmail.com');
    //frete
    $payment->setShipping()->setCost()->withParameters(0.00);
    $payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);
    //url para notificação
    $payment->addParameter()->withArray(['notificationURL', 'http://localhost/camisetas/notificacao-carrinho-compras.php']);
    
    $payment->setRedirectUrl("http://localhost/camisetas/meus-pedidos.php");
$payment->setNotificationUrl("http://localhost/camisetas/notificacao-carrinho-compras.php");

    try {


        $result = $payment->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

        echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>"
            . "<p>URL do pagamento: <strong>$result</strong></p>"
            . "<p><a title=\"URL do pagamento\" href=\"$result\" target=\_blank\">Ir para URL do pagamento.</a></p>";
    } catch (Exception $e) {
        die($e->getMessage());
    }
    
}catch (Exception $e) {
    die($e->getMessage());
}


