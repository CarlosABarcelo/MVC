<?php $this->layout('layouts/layout') ?>


<div class="container section" >
    <?php $this->insert('partials/feedback') ?>
    <h2>Todas las Entradas</h2>
    <?php if(count($entradas) == 0): ?>
        <p>No hay Entradas en la Base de Datos</p>
    <?php else: ?>
        <p>Tenemos <?= count($entradas) ?> entradas </p>
        <?php foreach ($entradas as $entrada) : ?>
            <div class="row">


                <!-- Post Content Column -->
                <div class="col-lg-12" style="margin: 5% 0% ;background-color: whitesmoke;border-radius: 50px;border: 1px solid skyblue">

                    <!-- Title -->
                    <h2 class="mt-4"><a style="color: black;" href="ver/<?= $entrada->id?>"><?= $entrada->titulo ?></a></h2>

                    <!-- Author -->
                    <p class="lead">
                        Autor:
                        <a href="#"><?= $entrada->autor ?></a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p><?= $entrada->fecha_creacion ?></p>

                    <hr>

                    <!-- Post Content -->

                    <?= $entrada->resumen ?>
                    <hr>
                </div>




            </div><br>
        <?php endforeach ?>

        <?php /*
        echo "<pre>";
        print_r($entradas);
        echo "</pre>";
    */ ?>



    <?php endif ?>
</div>