<?php 
if(isset($_SESSION['nombre'])){
	header("Location: index.php?vista=config");
}else{?>
<div class="main-container">

    <form class="box-login" action="" method="POST" autocomplete="off"> 
		<h5 class="title is-5 has-text-centered is-uppercase">Sistema de inventario</h5>

		<div class="field">
			<label class="label">Usuario</label>
			<div class="control">
			    <input class="input" type="text" name="login_usuario" pattern="[a-zA-Z0-9_/]{4,20}" maxlength="20" required >
			</div>
		</div>

		<div class="field">
		  	<label class="label">Clave</label>
		  	<div class="control">
		    	<input class="input" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{4,100}" maxlength="100" required >
		  	</div>
		</div>

		<p class="has-text-centered mb-4 mt-3">
			<button type="submit" class="button is-info is-rounded">Iniciar sesion</button>
		</p>
		<p class="has-text-centered mb-4 mt-3">
			<a href="./index.php" class="button is-primary is-rounded">Regresar</a>
		</p>
		<?php
		  
		if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
		require_once "./php/main.php";
		require_once "./php/iniciar_sesion.php";
		header("Location: index.php?vista=config");
		} 
		?> 
		
		
	</form>
</div>
<?php } ?>