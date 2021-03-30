<!doctype html>
<?php 
session_start();
require 'php/conexao.php';
?>
<html>
<meta charset="UTF-8">
<head>
<title>Tie-Day</title>

<link rel="icon" href="img/ico.png" >

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/tie-day.css">
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
			<a class="navbar-brand" href="Tie-Day.php">
				<h5>
					<img src="img/vitorimportsori.png"  width="90" height="90"  />
				</h5>
			</a>
			
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
					<span class="navbar-toggler-icon"></span>
				</button>
			
			<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="Tie-Day.php"><i class="fas fa-home"></i>Home<span class="sr-only">(atual)</span></a>
				</li>
				<li class="nav-item">
				
					<?php
					$read_categoria=mysqli_query($connect," SELECT categoria_id,categoria_descricao FROM categoria WHERE categoria_id=1");
					if(mysqli_num_rows($read_categoria)>'0'){
						foreach($read_categoria as $read_categoria_view){
							
							?><a class="nav-link"  text="camisetas" href="index.php?cat=<?php echo $read_categoria_view['categoria_id'];?>"><i class="fas fa-male"></i><?php echo 'Camisetas</br>'; echo $read_categoria_view['categoria_descricao'];?> </a>
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
				
				<?php
					
					if(isset($_SESSION['user_session'])&& isset($_SESSION['pwd_session'])){
					
				
				?>
				
				<a href="?go=logout">SAIR</a>
				<?php
			
						unset($_SESSION['user_session']);
						unset($_SESSION['pwd_session']);
						
					
				}
				
				?>
					
			</div>
			
			
	</nav>
<marquee loop="-1" scrollamount="15">
	<h3>
		<img src="img/iconeokl2.png" width="25" height="25" >
		Olá,seja bem-vindo! Confira as variedades de camisetas e óculos 
		<img src="img/iconeokl2.png" width="25" height="25" >
	</h3>
</marquee>
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
			© 2018 TODOS OS DIREITOS RESERVADOS. VITOR'S IMPORTS COMÉRCIO VAREJISTA LTDA
			- CEP 19906-200 - OURINHOS - SÃO PAULO/SP
		</h1>
	
		
	</div>
	
	<div id="body">
		<center>
			<h5>
				VITOR'S IMPORTS
			</h5>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active">
	<h2>
			Variedade de camisetas maculinas<i class="fas fa-male"></i>
		</h2>
		<a class="nav-link" href="index.php?cat=1" title="Variedade de camisetas masculinas!">
			<img src="img/homemimg1.jpg" id="masc" class="d-block w-10" alt="...">
		</a>
		
    </div>
    <div class="carousel-item">
	<h2>
			Variedade de camisetas femininas<i class="fas fa-female"></i>
		</h2>
		<a class="nav-link" href="index.php?cat=2" title="Variedade de camisetas femininas!">
			<img src="img/feimg11.jpg" id="femimg" class="d-block w-10" alt="...">
		</a>
			
    </div>
    <div class="carousel-item">
	<h2>
			Variedade de óculos<i class="fas fa-glasses"></i>
	</h2>
		<a class="nav-link" href="index.php?cat=3" title="Variedade de camisetas para crianças">
			<img src="img/fernandoalonso.jpg" id="criimg"class="d-block w-10" alt="...">
		</a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    
	 <i class="fas fa-chevron-circle-left" aria-hidden="true"></i>
	 
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    
	<i class="fas fa-chevron-circle-right" aria-hidden="true"></i>
	
  </a>
</div>
		</center>
		
		<!--<center>
			<h1>
				<a class="nav-link" href="index.php" title="Variedade de camisetas masculinas!">
					<img src="img/partemasculina.jpg"  width="270" height="422"  />
				</a>
			</h1>
			
			<h2>
				Variedade de camisetas maculinas
			</h2>
			<h3>
				<a class="nav-link" href="feminino.php" title="Variedade de camisetas femininas!">
					<img src="img/feminino.jpg"  width="500" height="350"  />
				</a>
			</h3>
			
			<h2>
				Toda moda de camisetas femininas
			</h2>
			<p>
			
				<h4>
					<a class="nav-link" href="crianca.php" title="Variedade de camisetas para crianças">
						<img src="img/crianças.jpg"  width="450" height="422"  />
					</a>
				</h4>
			</p>
			
			<h2>
				E é claro que não podimos nos esquecer das crianças
			</h2>
		
		
		</center>-->
	</div>
	
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
				<td><i class="fab fa-facebook-square" title="Facebook"></i>Tie-Day</td>
			</tr>
			<tr>
				<td><i class="fab fa-google-plus-square" title="Gmail"></i>tie-day@gmail.com</td>
			</tr>
			<tr>
				<td><i class="fab fa-youtube" title="You Tube"></i>Tie-Day</td>
			</tr>
			<tr>
				<td><i class="fab fa-instagram" title="Instagram"></i>@Tie-Day</td>
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
				<a href="Tie-Day.php"><i class="fas fa-arrow-up"></i>Voltar ao topo</font></a>
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
	
</body>


</html>