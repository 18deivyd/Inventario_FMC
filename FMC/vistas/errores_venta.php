<div class="container is-fluid mb-6">
    <h1 class="title">Errores en Ventas</h1>
    <h2 class="subtitle">Errores en Ventas</h2>
</div>

	<div class="container pb-6 pt-6">

	<form action="" method="POST" class="FormularioAjax" autocomplete="off" >
		<div class="columns">
			<div class="column">	
				<label >Scan:</label>
					<input class="input" type="text" name="txt_buscador" pattern="[a-zA-Z0-9]{2,100}" maxlength="100" required >
			<p class="has-text-centered">
				<div class="column">
					<button type="submit" class="button is-info is-rounded">Buscar</button>
			</p>
			</div>
		</div>
	</div>
	</form>

    <?php 

	require_once "./php/buscar_errores_ventas.php";
    // Tabla
    
    require_once "./php/main.php";

        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }

        $pagina=limpiar_cadena($pagina);
        $url="index.php?vista=errores_venta&page=";
        $registros=100;
        $busqueda="";

        require_once "./php/errores_ventas_lista.php";
    ?>

</div>