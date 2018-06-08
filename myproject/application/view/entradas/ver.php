<?php $this->layout('layouts/layout') ?>
<?php use Mini\Libs\Sesion; ?>

<div class="container">
    <?php if(isset($accion) && $accion == 'ver') : ?>
        <br><br>
    <?php else : ?>
        <h2>No deberias estar aqui</h2>
    <?php endif ?>



    <?php if(!isset($_SESSION['user_name']) && $datos['privado']==true){?><?php echo"NO PUEDES VERLO"; }else{ ?>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">
            <?php $this->insert('partials/feedback') ?>
            <!-- Title -->
            <h1 class="mt-4"><?= isset($datos['titulo']) ? $datos['titulo'] : "" ?></h1>

            <!-- Author -->
            <p class="lead">
                Autor:
                <a href="#"><?= isset($datos['autor']) ? $datos['autor'] : "" ?></a>
            </p>
            <!-- Author -->
            <p class="lead">
                Privado:
                <a href="#"><?= isset($datos['privado']) ? $datos['privado'] : "" ?></a>
            </p>
            <hr>

            <!-- Date/Time -->
            <p><?= isset($datos['fecha_creacion']) ? $datos['fecha_creacion'] : "" ?></p>

            <hr>

            <!-- Preview Image -->
            <?php
            if(isset($datos['fichero'])){
                $extension = substr($datos['fichero'] , -4);
                $nombre = substr($datos['fichero'] , 27);
                if($extension === ".jpg" || $extension === ".png" || $extension === "jpeg"){
                    echo '<img class="img-fluid rounded" src="'.$datos['fichero'].'" alt="">';
                }else{
                    echo '<a href="'. $datos['fichero'] .'"><i class="fa fa-fw fa-download"></i>'. $nombre .'</a>';
                }}
            ?>

            <hr>

            <!-- Post Content -->

            <?= isset($datos['contenido']) ? $datos['contenido'] : "" ?>
            <hr>
            <a href="javascript:history.go(-1)">Volver</a>
            <hr>

        </div>

    </div>
    <!-- /.row -->
</div>

<?php } ?>