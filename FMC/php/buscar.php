<?php 
	require_once "main.php";

	/* Almacenando datos */
    if(isset($_POST['txt_buscador'])){
        $busqueda=limpiar_cadena($_POST['txt_buscador']);
        }

    if(isset($_SESSION['nombre'])) { 
		$usuario=$_SESSION['nombre']; 
        }
    
    if(isset($_SESSION['nombre'])){    
        if(isset($busqueda) && $busqueda!=""){
            $consulta_datos=
            "SELECT
                productos.codprod AS codprod,
                productos.nombre AS nombre,
                ROUND(IF(tt.codalma = 1, SUM(kardex.entradas - kardex.salidas), 0), 0) AS 'stock',
                productos.sublinea AS sublinea
            FROM
                productos
            INNER JOIN kardex ON productos.codprod = kardex.codprod
            INNER JOIN (SELECT DISTINCT codprod, codalma FROM kardex WHERE codalma IN (1, 3)) AS tt ON kardex.codprod = tt.codprod AND kardex.codalma = tt.codalma
            WHERE
                productos.codtipoproducto IN (1, 2)
                AND (productos.CODBARRA01 = '$busqueda' OR productos.codprod = '$busqueda' OR productos.nombre LIKE '%$busqueda%')
            GROUP BY
                productos.codprod, productos.nombre, productos.sublinea, tt.codalma
                ORDER BY productos.codprod ASC
            LIMIT 1";

            $consulta_total="SELECT COUNT(productos.codprod) 
            FROM productos
            INNER JOIN kardex ON productos.codprod = kardex.codprod
            INNER JOIN (SELECT DISTINCT codprod, codalma FROM kardex WHERE codalma IN (1, 3)) AS tt ON kardex.codprod = tt.codprod AND kardex.codalma = tt.codalma
            WHERE
                productos.codtipoproducto IN (1, 2)
                AND (productos.CODBARRA01 = '$busqueda' OR productos.codprod = '$busqueda' OR productos.nombre LIKE '%$busqueda%')
            GROUP BY
                productos.codprod, productos.nombre, productos.sublinea, tt.codalma
            LIMIT 1";
        
            $conexion= conexion();

            $datos=$conexion->query($consulta_datos);
            $datos=$datos->fetchAll();

            $total=$conexion->query($consulta_total);
            $total=(int) $total->fetchColumn();
        
            if($total>=1){
                foreach($datos as $rows){
            $formulario='
            <form action="./php/conteo_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" >
                    
                    <div class="fisico">
                        <label >Codigo:</label>
                        <input class="productos" type="text" name="codprod" value="'.$rows['codprod'].'" required >
                
                        <label>Producto:</label>
                        <input class="productos1" type="text" name="nombre" value="'.$rows['nombre'].'" required >
                    
                        <label>Stock:</label>
                        <input class="producto" type="text" name="stock" value="'.$rows['stock'].'" required >
                    
                        <label>Fisico:</label>
                        <input class="producto" type="text" name="fisico" pattern="[0-9]{1,20}" maxlength="70" required >
                    
                        <label>Faltante:</label>
                        <input class="producto" type="text" name="faltante" required >

                        <label>Sobrante:</label>
                        <input class="producto" type="text" name="sobrante" required >

                        <label>Fecha:</label>
                        <input class="productos" type="date" name="fecha" maxlength="70" required >

                        <label>Cantidad Prox. a Vencer:</label>
                        <input class="producto" type="text" name="vencer" pattern="[0-9]{0,20}" maxlength="70" required >

                        <label>Merma:</label>
                        <input class="productos" type="text" name="merma" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}" maxlength="70" required >

                        <label>Cant. Merma:</label>
                        <input class="producto" type="text" name="cantidad_merma" pattern="[0-9]{1,20}" maxlength="70" required >
                    
                        <input type="hidden" value="'.$usuario.'" name="usuario" required >
                    </div>

                    <p class="has-text-centered">
                    <button type="submit" class="button is-info is-rounded">Guardar</button>
                </p>
            </form>
                    ';
                    echo $formulario;
                }
            }
        }
    }

    $conexion=null;
    
    