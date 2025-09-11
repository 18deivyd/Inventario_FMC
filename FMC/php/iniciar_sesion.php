<?php
    /* Almacenando datos */
    $usuario=limpiar_cadena($_POST['login_usuario']);
    $clave=limpiar_cadena($_POST['login_clave']);

    /* Verificando campos obligatorios */
    if($usuario=="" || $clave==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{4,100}",$clave)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                LA CLAVE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    $check_user=conexion();
    $check_user=$check_user->query("SELECT * FROM usuarios WHERE nombre='$usuario'");

    if($check_user->rowCount()==1){
        $check_user=$check_user->fetch();

        if($check_user['nombre']==$usuario && $check_user['clave']==$clave){

            $_SESSION['keycodigo']=$check_user['keycodigo'];
            $_SESSION['nombre']=$check_user['nombre'];

            if(headers_sent()){
                echo "<script> window.location.href='index.php?vista=config'; </script>";
            }else{
                header("Location: index.php?vista=config");
            }

        }else{
            echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                USUARIO o CLAVES incorrectos
            </div>
        ';
        }
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                USUARIO o CLAVES incorrectos
            </div>
        ';
    }
    $check_user=null;