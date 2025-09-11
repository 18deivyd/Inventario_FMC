<?php 
	require_once "../php/main.php";

	//Almacenando datos// 
    $codigo=limpiar_cadena($_POST['codprod']);

    $producto=limpiar_cadena($_POST['nombre']);
    $stock=limpiar_cadena($_POST['stock']);
    
    $fisico=limpiar_cadena($_POST['fisico']);

    $faltante=limpiar_cadena($_POST['faltante']);
    $sobrante=limpiar_cadena($_POST['sobrante']);

    $fecha=limpiar_cadena($_POST['fecha']);
    $vencer=limpiar_cadena($_POST['vencer']);
    $merma=limpiar_cadena($_POST['merma']);
    $cantidad=limpiar_cadena($_POST['cantidad_merma']);

    $usuario=limpiar_cadena($_POST['usuario']);
    /* Verificando campos obligatorios */
    /*if($codigo=="" || $fisico=="" || $fecha=="" || $vencer=="" || $merma=="" || $cantidad==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }*/

    /* Verificando integridad de los datos */
    /*if(verificar_datos("[0-9]{2,40}",$codigo)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El codigo no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[0-9]{1,20}",$fisico)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El fisico no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[0-9]{0,20}",$vencer)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La cantidad de proximo a vencer no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{0,20}",$merma)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La fecha no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[0-9]{1,20}",$cantidad)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La fecha no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    /* Verificando usuario */

$conexion = conexion();


$check_codigo = $conexion->prepare("SELECT codprod FROM productos_data WHERE codprod = :codigo");
$check_codigo->execute([':codigo' => $codigo]);


if ($check_codigo->rowCount() > 0) {
    $sql = "UPDATE productos_data SET nombre = :producto, stock = :stock, fisico = :fisico, faltante = :faltante, sobrante = :sobrante, fecha = :fecha, vencer = :vencer, merma = :merma, cantidad_merma = :cantidad, usuario = :usuario WHERE codprod = :codigo";

    $guardar_conteo = $conexion->prepare($sql);
    
    $guardar_conteo->execute([
        ":codigo" => $codigo,
        ":producto" => $producto,
        ":stock" => $stock,
        ":fisico" => $fisico,
        ":faltante" => $faltante,
        ":sobrante" => $sobrante,
        ":fecha" => $fecha,
        ":vencer" => $vencer,
        ":merma" => $merma,
        ":cantidad" => $cantidad,
        ":usuario" => $usuario

    ]);

    // Check if the update was successful
    if ($guardar_conteo->rowCount() > 0) {
        echo '
            <div class="notification is-success is-light">
                <strong>PRODUCTO ACTUALIZADO!</strong><br>
                El producto se actualizó con exito.
            </div>
        ';
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>Error!</strong><br>
                No se pudo actualizar el producto.
            </div>
        ';
    }

} else {
    
    $sql = "INSERT INTO 
    productos_data(codprod, nombre, stock, fisico, faltante, sobrante, fecha, vencer, merma, cantidad_merma, usuario)
    VALUES(:codigo, :producto, :stock, :fisico, :faltante, :sobrante, :fecha, :vencer, :merma, :cantidad, :usuario)";
    $guardar_conteo = $conexion->prepare($sql);
    $guardar_conteo->execute([
        ":codigo" => $codigo,
        ":producto" => $producto,
        ":stock" => $stock,
        ":fisico" => $fisico,
        ":faltante" => $faltante,
        ":sobrante" => $sobrante,
        ":fecha" => $fecha,
        ":vencer" => $vencer,
        ":merma" => $merma,
        ":cantidad" => $cantidad,
        ":usuario" => $usuario
    ]);

    // Check if the insert was successful
    if ($guardar_conteo->rowCount() > 0) {
        echo '
            <div class="notification is-info is-light">
                <strong>PRODUCTO REGISTRADO!</strong><br>
                El producto se registró con éxito.
            </div>
        ';
    } else {
        echo '
            <div class="notification is-danger is-light">
                <strong>Error!</strong><br>
                No se pudo registrar el producto.
            </div>
        ';
    }
}

// Clean up PDO objects
$check_codigo = null;
$guardar_conteo = null;
$conexion = null;

    header("Location:../index.php?vista=conteo");