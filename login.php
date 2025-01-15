<!DOCTYPE html>
<?php
require_once './Modelo/MdlConsolidacion.php';
$mdlClinica = new mdlClinica();
?>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <title>Ingreso al Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="webPage/plantilla/login/css/reset.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="webPage/plantilla/login/css/supersized.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="webPage/plantilla/login/css/style.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="webPage/plantilla/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="webPage/plantilla/alertifyjs/css/themes/semantic.css">
    <script src="webPage/plantilla/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="webPage/plantilla/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="webPage/plantilla/alertifyjs/alertify.min.js"></script>

    <?php
    session_start();
    $mensaje = isset($_SESSION['invalido']) ? $_SESSION['invalido'] : "";
    ?>
    <script>
        $(document).ready(function() {
            var mensaje = '<?php echo ($mensaje) ?>';
            if (mensaje !== "") {
                alertify.alert("Mensaje", "<strong><label>" + mensaje + "</label></strong>");
            }
        });
    </script>

</head>

<body><br><br><br><br>
    <div class="">
        <div class="page-container">
            <h1>Inicio de sesion</h1>
            <form method="post" action="controlador/CtlOperacionesPublics">
                <input type="hidden" name="op" id="op" value="7">
                <input type="text" autocomplete="off" placeholder="Usuario" class="username" name="usu" id="usu">
                <input type="password" class="password" name="con" id="con" placeholder="Contraseña">
                <?php
                $arrayEmpresas = $mdlClinica->listarComboEmpresa();
               // die(var_dump($arrayEmpresas));
                ?>
                <select class="empresa" <?php echo count($arrayEmpresas) === 1 ? "hidden" : "" ?> name="empresa">
                <?php
                foreach ($arrayEmpresas as $empresas) {
                ?>
                    <option value="<?php echo $empresas['codigo'] ?>"><?php echo $empresas['empresa'] ?></option> 
                <?php 
                }
                ?>
            </select>
                <button type="submit" class="btn">Ingresar</button>
                <div class="error" style="">
                    <span>+</span>
                </div>
            </form>
            <!--                <div class="connect">
                                    <p>Olvido su contraseña :</p>
                                    <p>
                                        <a class="facebook" href=""></a>
                                        <a class="twitter" href=""></a>
                                    </p>
                                </div>-->
        </div>
    </div>
    <script src="webPage/plantilla/login/js/jquery-1.8.2.min.js?v=<?php echo (rand()); ?>"></script>
    <script src="webPage/plantilla/login/js/supersized.3.2.7.min.js?v=<?php echo (rand()); ?>"></script>
    <script src="webPage/plantilla/login/js/supersized-init.js?v=<?php echo (rand()); ?>"></script>
    <script src="webPage/plantilla/login/js/scripts.js?v=<?php echo (rand()); ?>"></script>
</body>

</html>