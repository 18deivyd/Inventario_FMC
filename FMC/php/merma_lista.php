<?php
    
    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
    $tabla="";

    if(isset($busqueda) && $busqueda!=""){
        $consulta_datos="SELECT * FROM inventario 
        WHERE ((conteo_producto LIKE '%$busqueda%' OR conteo_codigo LIKE '%$busqueda%')) 
        ORDER BY conteo_producto ASC 
        LIMIT $inicio,$registros";

        $consulta_total="SELECT COUNT(conteo_codigo) FROM inventario 
        WHERE ((conteo_producto LIKE '%$busqueda%' OR conteo_codigo LIKE '%$busqueda%'))";
    }else{
        $consulta_datos="SELECT * FROM productos_data WHERE ((cantidad_merma>0)) ORDER BY ID DESC 
        LIMIT $inicio,$registros";

        $consulta_total="SELECT COUNT(codprod) FROM productos_data WHERE ((cantidad_merma>0))";
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
                <tr class="has-text-centered">
                	<th>#</th>
                    <th>CODIGO</th>
                    <th>PRODUCTO</th>
                    <th>MERMA</th>
                    <th>CANTIDAD</th>
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
                    <td>'.$rows['codprod'].'</td>
                    <td>'.$rows['nombre'].'</td>
                    <td>'.$rows['merma'].'</td>
                    <td>'.$rows['cantidad_merma'].'</td>
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

        $conexion=null;
        echo $tabla;

        if($total>=1 && $pagina<=$Npaginas){
            echo paginador_tablas($pagina,$Npaginas,$url,7);
        }