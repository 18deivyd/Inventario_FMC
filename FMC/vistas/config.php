	<div class="container is-fluid"> 
		<div class="form-rest mb-6 mt-6"></div>
		<h1 class="title">Configuración</h1>
		<div></div>
		<h2 class="subtitle">Sublineas</h2>
	</div>
	<div class="container is-fluid">
		<div class="form-rest mb-6 mt-6"></div>

	<form action="./index.php?vista=conteo" method="POST" class="FormularioAjax" autocomplete="off" >
	<div class="control"></div>
		<input class="checkbox" type="checkbox" name="Ampollas">
		<label >Ampollas/ Soluciones</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Tabletas">
		<label >Capsulas/ Tabletas</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Nevera">
		<label >Nevera</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Blister">
		<label >Blister/ Detallados/ Sobres</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Cremas">
		<label >Cremas/ Ovulos/ Supositorios</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Protección_Intima">
		<label >Protección Intima</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Psicotropicos">
		<label >Psicotropicos</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Gotas">
		<label >Gotas</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Formulas">
		<label >Formulas y Pañales AD/ PED</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Insumos">
		<label >Insumos Medicos</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Jarabes">
		<label >Jarabes</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Higiene">
		<label >Higiene del Hogar y Personal</label>
		<br><br>
		<input class="checkbox" type="checkbox" name="Almacen">
		<label >Almacen</label>
		<br><br>
		<br>

		<br>
	<div class="buttons">
		<button type="submit"  class="button is-primary is-rounded is-small">Aceptar</button>
	</div>
</form>
<br>

<?php
	
	# Cerrar sesion #
	if((!isset($_SESSION['keycodigo']) || $_SESSION['keycodigo']=="") || (!isset($_SESSION['nombre']) || $_SESSION['nombre']=="")){
			include "./vistas/logout.php";
			exit();
	}