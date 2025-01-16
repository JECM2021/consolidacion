<?php
//require_once '/../../../Modelo/MdlConsolidacion.php';
require_once '/../xampp/htdocs/consolidacion/Modelo/MdlConsolidacion.php';
require_once '/../xampp/htdocs/consolidacion/validaSession.php';
//require_once '/../../../validaSession.php';
$mdlPacientes = new mdlClinica();
$idSu = isset($_GET["pageSub"]) ? $_GET["pageSub"] : 'sin definir';
$idMenu = isset($_GET["pageMenu"]) ? $_GET["pageMenu"] : 'sin definir';
$idPaginas = isset($_GET["page"]) ? $_GET["page"] : 'sin definir';
$class = isset($_GET["page"]) ? $_GET["page"] : 'treeview active';
?>
<ul class="sidebar-menu" data-widget="tree" style="font-size: 12px">
    <li class="<?php echo $class ?>"><a href="/consolidacion/principal"><i class="fa fa-home"></i>
            <span>Principal</span></a></li>
    <?php
    foreach ($listaMenu as $rsListado) {
    ?>
    <li id="menuPrincipal<?php echo $rsListado['menu_id']; ?>" class="treeview"
        onclick="activar(<?php echo $rsListado['menu_id']; ?>, 1)">
        <a href="#">
            <i class="<?php echo $rsListado['icono_menu']; ?> "></i>
            <span><?php echo $rsListado['pagina_menu']; ?></span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php
                foreach ($mdlPacientes->obtenerPaginas($rsListado['menu_id'], $usuPerfil, $usuId) as $subMenu) {
                ?>
            <li class="" id="subPagina<?php echo $subMenu['pag_id'] ?>"><a style="font-size: 11px;"
                    href="<?php echo $subMenu['url'] ?>?page=<?php echo $subMenu['pag_id'] ?>&pageMenu=<?php echo $rsListado['menu_id']; ?>"><i
                        class="<?php echo $subMenu['icono'] ?>"></i> <?php echo $subMenu['nombre']; ?></a></li>
            <?php
                }
                foreach ($mdlPacientes->obtenerSubMenu($rsListado['menu_id'], $usuPerfil, $usuId) as $subMenu) {
                ?>
            <li id="subMenu<?php echo $subMenu['menu_id'] ?>" class="treeview"
                onclick="activar(<?php echo $subMenu['menu_id']; ?>, 2)">
                <a href=""><i class="<?php echo $subMenu['icono']; ?>"></i> <?php echo $subMenu['nombre']; ?>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php
                            foreach ($mdlPacientes->obtenerPaginas($subMenu['menu_id'], $usuPerfil, $usuId) as $subMenuSubPaginas) {
                            ?>
                    <li class="" id="subPagina<?php echo $subMenuSubPaginas['pag_id'] ?>"><a style="font-size: 11px;"
                            href="<?php echo $subMenuSubPaginas['url'] ?>?page=<?php echo $subMenuSubPaginas['pag_id'] ?>&pageMenu=<?php echo $rsListado['menu_id']; ?>&pageSub=<?php echo $subMenu['menu_id']; ?>"><i
                                class="<?php echo $subMenuSubPaginas['icono'] ?>"></i>
                            <?php echo $subMenuSubPaginas['nombre']; ?></a></li>
                    <?php
                            }
                            ?>
                </ul>
            </li>
            <?php
                }
                ?>
        </ul>
    </li>
    <?php
    }
    ?>
</ul>
<script type="text/javascript">
$(document).ready(function() {
    var idMenu = "<?php echo $idMenu ?>";
    var idSubMenu = "<?php echo $idSu; ?>";
    var idPaginas = "<?php echo $idPaginas; ?>";
    $("#menuPrincipal" + idMenu).addClass("active");
    $("#subMenu" + idSubMenu).addClass("active");
    $("#subPagina" + idPaginas).addClass("active");
});

function activar(valor, tipoMenu) {
    //        var idObtenido = valor;
    //        $(".active").removeClass("active");
    //        $("#subMenu" + idObtenido).addClass("active");
    //        switch (tipoMenu) {
    //            case 1:
    //                $("#menuPrincipal" + idObtenido).addClass("active");
    //                break;
    //            case 2:
    //                break;
}
//    }
</script>