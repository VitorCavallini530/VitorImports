<!DOCTYPE html PUBLIC"-//W3C/DTD XHTML 1.0 Transitional//EN" "http//www.w3.org/TR/xhtml1=transitation">
<?php

//error_reporting(0);
//ini_set(“display_errors”, 0 );


?>
<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<?php 
session_start();
require 'php/conexao.php';
$id_produto=addslashes($_GET['id']);


if(!isset($_SESSION['carrinho'])){
	$_SESSION['carrinho'] = array();		
}

$read_produto=mysqli_query($connect,"SELECT * FROM produtos WHERE produto_id = '' '".$id_produto."' ORDER BY nome ASC");

		if(mysqli_num_rows($read_produto) > '0'){
			foreach($read_produto as $read_produto_view);
			if($_SESSION['carrinho'][$id_produto]){
				$_SESSION['carrinho'][$id_produto] +=1;
			}else{
				$_SESSION['carrinho'][$id_produto] = 1;
			}
			header("Location: meu-carrinho.php");
		}
		
?>
<html>
<head>
<title>Meu carrinho</title>
<link rel="icon" href="img/programadorgamer.png" >
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/tie-day.css">

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="VitorImports.php"><h5><img src="img/vitorimportsori.png"  width="90" height="90"  /></h5></a>
		
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="VitorImports.php"><i class="fas fa-home"></i>Home<span class="sr-only">(atual)</span></a>
				</li>
				<li class="nav-item">
				
					<?php
					$read_categoria=mysqli_query($connect," SELECT categoria_id,categoria_descricao FROM categoria WHERE categoria_id=1");
					if(mysqli_num_rows($read_categoria)>'0'){
						foreach($read_categoria as $read_categoria_view){
							
							?><a class="nav-link" text="camisetas" href="index.php?cat=<?php echo $read_categoria_view['categoria_id'];?>"><i class="fas fa-male"></i><?php echo 'Camisetas</br>'; echo $read_categoria_view['categoria_descricao'];?> </a>
							<?php
						}
					}
					?>
				</li>
				<li class="nav-item">
					<?php
					$read_categoria=mysqli_query($connect," SELECT categoria_id,categoria_descricao FROM categoria WHERE categoria_id=2");
					if(mysqli_num_rows($read_categoria)>'0'){
						foreach($read_categoria as $read_categoria_view){
							
							?><a class="nav-link" href="index.php?cat=<?php echo $read_categoria_view['categoria_id'];?>"><i class="fas fa-female"></i><?php echo 'Camisetas</br>';  echo $read_categoria_view['categoria_descricao'];?> </a>
							<?php
						}
					}
					?>
				</li>
				<li class="nav-item">
					<?php
					$read_categoria=mysqli_query($connect," SELECT categoria_id,categoria_descricao FROM categoria WHERE categoria_id=3");
					if(mysqli_num_rows($read_categoria)>'0'){
						foreach($read_categoria as $read_categoria_view){
							
							?><a class="nav-link" href="index.php?cat=<?php echo $read_categoria_view['categoria_id'];?>"><i class="fas fa-glasses"></i><?php echo utf8_encode($read_categoria_view['categoria_descricao']);?> </a>
							<?php
						}
					}
					?>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="meus-pedidos.php"><i class="fas fa-tasks"></i>Meus Pedidos</a>
				</li>
			</ul>
<div class="carrinho" id="navbar">
		
		<h4>
		
		
		
		
		<a class="nav-link" href="meu-carrinho.php"><img src="img/carrinho.png"  width="75" height="75"  /></a></h4>
		</div>
			
			
		
			
			
		</div>
		
	</nav>
	<marquee loop="-1" scrollamount="15"><h3><img src="img/iconeokl2.png" width="25" height="25" >Meu carrinho de compras<img src="img/iconeokl2.png" width="25" height="25" ></h3></marquee>
<div id="barraLateral">
	<div class="infinite" ><!--class="infinite" media="(min-width:1250px) and (max-width:1358px)" style="
	
	background-image: url(img/infinite.jpg); 
	 
								width:200px; 
								height:1250px;
								max-width: 1000px; max-height: 1000px ;
								margin-top:-1px;
								margin-left:-1px;
								opacity:0.7;
								background-size:contain;
								position: absolute;
								border-top-left-radius: 5em;
								border-bottom-right-radius: 5em;
								border-bottom-left-radius: 0em;
								border-top-right-radius: 0em;
								
	">-->
	</div>
	<h1>
			
	</h1>
	</br>
	</br>
	</br>
		<h1>VITOR'S IMPORTS</h1></br></br>
		<h1>
		Loja online de camisetas e óculos de sol esportivos</h1>
<img id="imgocu" src="img/oculosazul.jpg" width="194" height="80" >
		<img id="imgmasc" src="imgbdo/ca9.jpg" width="96" height="96" >	
		
		<img id="imgfem" src="febdo/fe2.jpg" width="96" height="96" >
		
		

	
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<h1>
			VITOR'S IMPORTS é perfeita para quem curte uma roupa descolada e confortável.
			A variedade de produtos é enorme, desde  camisetas masculinas,femininas e óculos de sol esportivos!!!.
			Ela tem um leque de possibilidades e uma cara super jovem. 
		</h1>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<h1>
			© 2020 TODOS OS DIREITOS RESERVADOS. VITOR'S IMPORTS COMÉRCIO VAREJISTA LTDA
			- CEP 19906-200 - OURINHOS - SÃO PAULO/SP
		</h1>
	
		
	</div>
		<h3>Meu carrinho</h3>
        <table id="tabela1" border="1px" color="black">
			<tr>
				<td width="60">Item</td>
				
				<td width="60">Valor</td>
				<td width="60">Quantidade</td>
				<td width="60">Total</td>
				<td width="60">Opções</td>
				
			</tr>
		
		
		<?php
			$valor_total_venda=0;
			$item_carrinho='0';
			if(count($_SESSION['carrinho']) > '0'){
				foreach($_SESSION['carrinho'] as $id_produto_carrinho => $quantidade_produto_carrinho){
					$item_carrinho++;
					$read_produto_carrinho = mysqli_query($connect, "SELECT nome, preco,imagem FROM produtos where produto_id = '".$id_produto_carrinho."'");
					if(mysqli_num_rows($read_produto_carrinho) > '0'){
						foreach($read_produto_carrinho as $read_produto_carrinho_view);
						$valor_total_produto_carrinho = $quantidade_produto_carrinho * $read_produto_carrinho_view['preco'];
						$valor_total_venda += $valor_total_produto_carrinho;
					}
			echo'<tr>
					<td>'.$read_produto_carrinho_view['nome'].'';
					
					?>
					</br>
					<img  src="imgbdo/<?php echo $read_produto_carrinho_view['imagem'];?>" width="45" height="45"/>
					<?php 
					/*print_r($_POST);
					var_dump($_REQUEST);
					echo'</td> ';
					echo'<td>';
					if(isset($_POST['id'])){
						$tamanho=$_POST['tamanho'];
						if($tamanho=="P"){
							echo ("P");
							
						}else if($tamanho=="M"){
							echo ("M");
							
						}else if($tamanho=="G"){
							echo ("G");
							
						}else if($tamanho=="GG"){
							echo ("GG");
							
						}
					}*/
					
					
					
					
					echo'</td>';
					echo' <td>'.number_format($read_produto_carrinho_view['preco'], 2,',','.').'</td>
					
					<td>'.$quantidade_produto_carrinho.'</td>
					<td>'.number_format($valor_total_produto_carrinho, 2,',','.').'</td>
					<td><a href="deletar-prod-carrinho.php?id='.$id_produto_carrinho.'">Deletar</a></td>
				
				</tr>';
				}
			}
			?>
		</table>
		<hr />
		<h3>Valor Total Venda: <?php echo number_format($valor_total_venda, 2,',','.');?></h3>
		<table>
			<tr>
				<td>
					<div class="text-left">
						<a class="btn btn-success" href="finalizar-pedido.php"><i class="far fa-credit-card"></i>Finalizar compra</a>
					</div>
				</td>
				<td>
					<div class="text-left">
						
                        	                <a class="btn btn-primary" href="index.php?cat=<?php echo $read_categoria_view['categoria_id'];?>" > <i class="fas fa-cart-plus"></i>Continuar comprando</a>
                        	
                      
						
					</div>
				</td>
			</tr>
			<!--<button type="submit"  class="btn" id="btnatualizar"  /><i class="fas fa-redo-alt"></i>Atualizar</button>-->
		</table>
		
		
		
	
		
		
		
		
		
	
	
	<!--importaçao do jquery para o bootstrap-->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<!--importaçao do popper para o bootstrap-->
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!--importaçao do bootstrap para o bootstrap-->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
		<footer class="text-muted1">
		
		
		<table class="minions"    align="left">
			<tr>
				<td><img src="img/minions.png" width="210" height="210" ></td>
			</tr>
		</table>
		
		<table class="tabfoot1"    align="left">
			<tr>
				<td><h6 class="contatos">Contatos</h6></td>
				<td rowspan="8" bgcolor="gray">
				</td>
			<tr>
			
			<tr>
				<td>
				<i class="fas fa-phone "title="Telefone"></i>(14)3324-9999
				</td>
			</tr>
			<tr>
				<td><i class="fab fa-whatsapp"title="Whatsapp"></i>(14)99999-9999</td>
			</tr>
			<tr>
				<td><i class="fab fa-facebook-square" title="Facebook"></i>Vitor Imports</td>
			</tr>
			<tr>
				<td><i class="fab fa-google-plus-square" title="Gmail"></i>vitorimports@gmail.com</td>
			</tr>
			<tr>
				<td><i class="fab fa-youtube" title="You Tube"></i>Vitor Imports</td>
			</tr>
			<tr>
				<td><i class="fab fa-instagram" title="Instagram"></i>@VitorImports</td>
			</tr>
		</table>
		
		<table class="tabfoot2"    align="left">
			<tr>
				<td><h6 class="pagamento">Formas de pagamento</h6></td>
				<td rowspan="8" bgcolor="gray">
				</td>
			<tr>
			
			<tr>
				<td>
				<center><i class="fab fa-cc-visa" title="Visa"></center></i>
				</td>
			</tr>
			<tr>
				<td><center><i class="fab fa-cc-mastercard" title="mastercard"></i></center></td>
			</tr>
			<tr>
				<td><center><i class="fas fa-barcode" title="Boleto"></i></center></td>
			</tr>
			<tr>
				<td><center><i class="fab fa-paypal" title="Paypal"></i></center></td>
			<tr>
				<td><center><img src="img/elo.png" class="elo" title="elo"></center></td>
			</tr>
			<tr>
				<td><center><img src="img/diners.png" class="elo" title="Diners Club"></center></td>
			</tr>
			
			
		</table>
		<table class="tabfoot"    align="left">
		
			<tr>
			
				<td><h6 class="desen">Desenvolvimento</h6></td>
				<td rowspan="7" bgcolor="gray">
				</td>
			</tr>
			
			<tr>
				<td><center><i class="fab fa-php " title="PHP" style="color:#3104B4;"></i></center></td>	
			</tr>
			<tr>
				<td><center><i class="fab fa-html5" title="HTML5" style="color:#FE642E;"></center></i></td>
			</tr>
			<tr>
				<td><center><i class="fab fa-css3-alt" title="CSS3" style="color:#0080FF;"></i></center></td>
			</tr>
			<tr>
				<td><center><i class="fab fa-bootstrap"title="Bootstrap"style="color:#7952b3"></i></center></td>
			</tr>
			<tr>
				<td><center><i class="fas fa-database"></i></center></td>
			</tr>
			<tr>
				<td><center><i class="fab fa-js-square" title="Java Script" style="color:#FAE30F"></i></center></td>
			</tr>
			
		</table>
		<p class="float-right" >
				<a href="meu-carrinho.php"><i class="fas fa-arrow-up"></i>Voltar ao topo</font></a>
		</p>
		
		<!--
			<img src="img/pagamento.png" />
			<a href="https://www.facebook.com/vitor.siqueira.1610" target="outra_aba">
				<img src="img/redes.jpg"/>
			</a>
			
			<p class="float-right">
				<a href="Tie-Day.php"><i class="fas fa-arrow-up"></i>Voltar ao topo</a>
			</p>
		-->
		</footer>
	</div>
	
	
	
	



</body>

</html>	