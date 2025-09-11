<div class="container is-fluid"> 
	<h1 class="title">Conteo</h1>
	<h2 class="subtitle">¡Bienvenido a Farma Moto Catia C.A! 
		<?php
		if(isset($_SESSION['nombre'])) { 
		$usuario=$_SESSION['nombre'];
		echo $usuario; 
		}
		?></h2>

</div>
<div class="conteo">

	<div class="form-rest mb-6 mt-6"></div>

	
	<form action="" method="POST" autocomplete="off" >
		<div class="fisico">	
			<label >Scan:</label>
				<div id="qr-reader" style="width: 500px"></div>
				<input class="productos" type="text" id="barcode-input" name="txt_buscador" pattern="[a-zA-Z0-9]{2,100}" maxlength="100" value="" required >
		<p class="has-text-centered">
				<button type="submit" class="button is-info is-rounded">Buscar</button>
		</p>
	</form>
<?php
	require_once "./php/buscar.php";
?>
	<div class="container is-fluid mb-6">
		<h2 class="subtitle">Lista de Conteo</h2>
	

		<class="container pb-6 pt-6">

		<?php 

			if(!isset($_GET['page'])){
				$pagina=1;
			}else{
				$pagina=(int) $_GET['page'];
				if($pagina<=1){
					$pagina=1;
				}
			}

			$pagina=limpiar_cadena($pagina);
			$url="index.php?vista=conteo&page=";
			$registros=100;
			$busqueda="";
			
			require_once "./php/conteo_lista.php";
			
		    echo '<button onclick="window.print()">Imprimir Página</button>';
			
		