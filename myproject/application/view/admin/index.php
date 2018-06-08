<?php $this->layout('admin/layouts/layout') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Fixed Layout
            <small>Blank example to the fixed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Fixed</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
                is bigger than your content because it prevents extra unwanted scrolling.</p>
        </div>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Solicitudes de la web</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($mensajes as $mensaje) : ?>
                        <tr>
                            <td><?= $mensaje->id?></td>
                            <td><?= $mensaje->nombre ?></td>
                            <td><?= $mensaje->email ?></td>
                            <td><?= $mensaje->mensaje ?></td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->