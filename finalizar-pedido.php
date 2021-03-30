<?php
session_start();
require 'php/conexao.php';

if(count($_SESSION['carrinho']) == '0'){
	echo "<script>alert('Não existe produtos no carrinho de compras')</script>";
	echo "<script>window.location='meu-carrinho.php'</script>";
	
}else{
	$insert_pedido = "INSERT INTO pedido(pedido_data,pedido_data_hora,pedido_valor,pedido_status) VALUES('".date('y-m-d')."','".date('y-m-d H:i:s')."','0','0')";
	mysqli_query($connect,$insert_pedido);
	$read_ultimo_pedido=mysqli_query($connect,"SELECT pedido_id FROM pedido ORDER BY pedido_id DESC LIMIT 1");
	if(mysqli_num_rows($read_ultimo_pedido) > '0'){
		foreach($read_ultimo_pedido as $read_ultimo_pedido_view);
	}
	
	foreach($_SESSION['carrinho'] as $id_produto => $qtd_produto){
		$read_produto_carrinho = mysqli_query($connect, "SELECT nome, preco FROM produtos where produto_id = '".$id_produto."'");
		if(mysqli_num_rows($read_produto_carrinho) > '0'){
			foreach($read_produto_carrinho as $read_produto_carrinho_view);
			$valor_total_produto_carrinho = $qtd_produto * $read_produto_carrinho_view['preco'];
			$valor_total_venda += $valor_total_produto_carrinho;
		}
		
		$insert_itens_pedido="INSERT INTO itens_pedido(itens_pedido_id_pedido ,itens_pedido_id_produto,itens_pedido_quantidade,itens_pedido_valor_produto,itens_pedido_valor_total) VALUES('".$read_ultimo_pedido_view['pedido_id']."','".$id_produto."','".$qtd_produto."','".$read_produto_carrinho_view['preco']."','".$valor_total_produto_carrinho."')";
		mysqli_query($connect,$insert_itens_pedido);
	}
	$update_pedido="UPDATE pedido SET pedido_valor = '".$valor_total_venda."' WHERE pedido_id='".$read_ultimo_pedido_view['pedido_id']."'";
	mysqli_query($connect, $update_pedido);
	session_destroy();
	echo "<script>alert('Pedido Finalizado')</script>";
	echo "<script>window.location='meus-pedidos.php'</script>";
}
?>