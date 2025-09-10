<?php
    
    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
    $tabla="";
    
    $consulta_datos=
    "SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
    FROM productos AS p 
    JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
    LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
    WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL 
    GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
    ORDER BY p.sublinea, p.nombre ASC";

    $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";

    //SUBLINEAS

    if (isset($_POST['Tabletas'])) {
        $_SESSION['Tabletas']="Tabletas";
    }

    if (isset($_SESSION['Tabletas'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('CAPSULAS / TABLETAS')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('CAPSULAS / TABLETAS') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Ampollas'])) {
        $_SESSION['Ampollas']="Ampollas";
    }

    if (isset($_SESSION['Ampollas'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('AMPOLLAS','SUEROS')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('AMPOLLAS','SUEROS') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Nevera'])) {
        $_SESSION['Nevera']="Nevera";
    }

    if (isset($_SESSION['Nevera'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('AGUAS MINERALES','AGUAS NO REGULADAS', 'BEBIDAS ENERGETICAS IMPORTADAS','JUGOS', 'JUGOS/LACTEOS' , 'REFRESCOS', 'GOLOSINAS')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('AGUAS MINERALES','AGUAS NO REGULADAS', 'BEBIDAS ENERGETICAS IMPORTADAS','JUGOS', 'JUGOS/LACTEOS' , 'REFRESCOS', 'GOLOSINAS') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Blister'])) {
        $_SESSION['Blister']="Blister";
    }

    if (isset($_SESSION['Blister'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('BLISTER','DETALLADOS', 'SOBRES','SOBRES/POLVO')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('BLISTER','DETALLADOS', 'SOBRES','SOBRES/POLVO') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Cremas'])) {
        $_SESSION['Cremas']="Cremas";
    }

    if (isset($_SESSION['Cremas'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('BLISTER','DETALLADOS', 'SOBRES','SOBRES/POLVO')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('BLISTER','DETALLADOS', 'SOBRES','SOBRES/POLVO') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Protección_Intima'])) {
        $_SESSION['Protección_Intima']="Protección_Intima";
    }

    if (isset($_SESSION['Protección_Intima'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea = 'PROTECCION INTIMA'
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea = 'PROTECCION INTIMA' GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Psicotropicos'])) {
        $_SESSION['Psicotropicos']="Psicotropicos";
    }

    if (isset($_SESSION['Psicotropicos'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea = 'PSICOTROPICOS'
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea = 'PSICOTROPICOS' GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Gotas'])) {
    $_SESSION['Gotas']="Gotas";
    }

    if (isset($_SESSION['Gotas'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('GOTAS', 'GOTAS / INHALADORES')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('GOTAS', 'GOTAS / INHALADORES') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Formulas'])) {
    $_SESSION['Formulas']="Formulas";
    }

    if (isset($_SESSION['Formulas'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('FORMULAS Y PAÑALES', 'CUIDADO INFANTIL', 'FORMULAS ADULTOS', 'FORMULAS INFANTILES', 'PAÑALES ADULTOS / TOALLAS', 'PAÑALES INFANTILES', 'VIVERES NO REGULADOS', 'ALIMENTOS INFANTILES')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('FORMULAS Y PAÑALES', 'CUIDADO INFANTIL', 'FORMULAS ADULTOS', 'FORMULAS INFANTILES', 'PAÑALES ADULTOS / TOALLAS', 'PAÑALES INFANTILES', 'VIVERES NO REGULADOS', 'ALIMENTOS INFANTILES') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Insumos'])) {
    $_SESSION['Insumos']="Insumos";
    }

    if (isset($_SESSION['Insumos'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('TEST Y ACCESORIOS DE DIAGNOSTICO', 'EQUIPOS MEDICOS / REHABILITACION', 'EQUIPOS Y ACCESORIOS ELECTRONICOS', 'MATERIAL MEDICO QUIRURGICO')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('TEST Y ACCESORIOS DE DIAGNOSTICO', 'EQUIPOS MEDICOS / REHABILITACION', 'EQUIPOS Y ACCESORIOS ELECTRONICOS', 'MATERIAL MEDICO QUIRURGICO') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Jarabes'])) {
    $_SESSION['Jarabes']="Jarabes";
    }

    if (isset($_SESSION['Jarabes'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('JARABES', 'JARABES / INHALADORES', 'JARABES/SUSPENSION ORAL/SOLUCION ORAL')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('JARABES', 'JARABES / INHALADORES', 'JARABES/SUSPENSION ORAL/SOLUCION ORAL') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Higiene'])) {
    $_SESSION['Higiene']="Higiene";
    }

    if (isset($_SESSION['Higiene'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 1, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('CUIDADO E HIGIENE DEL HOGAR', 'CUIDADO E HIGIENE PERSONAL', 'BISUTERIA / TIENDITA', 'ACCESORIOS PARA EL BEBE')
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 1, tt.stock, 0) > 0 AND pd.codprod IS NULL AND sublinea IN ('CUIDADO E HIGIENE DEL HOGAR', 'CUIDADO E HIGIENE PERSONAL', 'BISUTERIA / TIENDITA', 'ACCESORIOS PARA EL BEBE') GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    if (isset($_POST['Almacen'])) {
        $_SESSION['Almacen']="Almacen";
    }

    if (isset($_SESSION['Almacen'])) {        
        $consulta_datos="SELECT p.nombre AS producto, p.codprod AS codigo, ROUND(IF(tt.codalma = 3, tt.stock, 0), 0) AS cantidad, p.sublinea AS sublinea 
        FROM productos AS p 
        JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod 
        LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod 
        WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 3, tt.stock, 0) > 0 AND pd.codprod IS NULL 
        GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma 
        ORDER BY p.sublinea, p.nombre ASC";

        $consulta_total="SELECT COUNT(p.codprod) FROM productos AS p JOIN (SELECT codprod, codalma, SUM(entradas - salidas) AS stock FROM kardex GROUP BY codprod, codalma) AS tt ON p.codprod = tt.codprod LEFT JOIN productos_data AS pd ON p.codprod = pd.codprod WHERE tt.codalma IN (1, 3) AND p.codtipoproducto IN (1, 2) AND IF(tt.codalma = 3, tt.stock, 0) > 0 AND pd.codprod IS NULL GROUP BY p.codprod, p.nombre, p.sublinea, tt.codalma";
    }

    $conexion= conexion();

    $datos=$conexion->query($consulta_datos);
    $datos=$datos->fetchAll();

    $total=$conexion->query($consulta_total);
    $total=(int) $total->fetchColumn();

    $Npaginas=ceil($total/$registros);

    $tabla.='
	<div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered" >
                	<th>#</th>
                    <th>CODIGO</th>
                    <th>PRODUCTO</th>
                    <th>STOCK</th>
                    <th>SUBLINEA</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
                    <td>'.$rows['codigo'].'</td>
                    <td>'.$rows['producto'].'</td>
                    <td>'.$rows['cantidad'].'</td>
                    <td>'.$rows['sublinea'].'</td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
							Haga clic acá para recargar el listado
						</a>
					</td>
				</tr>
			';
		}else{
			$tabla.='
				<tr class="has-text-centered" >
					<td colspan="7">
						No hay registros en el sistema
					</td>
				</tr>
			';
		}
	}

    $tabla.='</tbody></table></div>';

	if($total>=1 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando producto <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

    echo $tabla;

    /*if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
    }*/

    

    