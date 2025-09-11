<div class="form-rest mb-6 mt-6"></div>
<div class="container is-fluid"> 
	<h1 class="title">Conteo_Total</h1>
</div>
<div class="conteo">

	<div class="form-rest mb-6 mt-6"></div>

<?php

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
			$url="index.php?vista=conteo&page=";
			$registros=100;
			$busqueda="";

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
    $tabla="";
    
    $consulta_datos="SELECT * FROM productos_data ORDER BY ID DESC";

    $consulta_total="SELECT COUNT(codprod) FROM productos_data";

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
                    <th>FISICO</th>
                    <th>FALTANTE</th>
                    <th>SOBRANTE</th>
                    <th>FECHA</th>
                    <th>PROX_VENCER</th>
                    <th>MERMA</th>
                    <th>CANT_MERMA</th>
                    <th>USUARIO</th>
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
                    <td>'.$rows['stock'].'</td>
                    <td>'.$rows['fisico'].'</td>
                    <td>'.$rows['faltante'].'</td>
                    <td>'.$rows['sobrante'].'</td>
                    <td>'.$rows['fecha'].'</td>
                    <td>'.$rows['vencer'].'</td>
                    <td>'.$rows['merma'].'</td>
                    <td>'.$rows['cantidad_merma'].'</td>
                    <td>'.$rows['usuario'].'</td>
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

echo '<button onclick="window.print()">Imprimir Página</button>';

    /*if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
    }*/

    

    