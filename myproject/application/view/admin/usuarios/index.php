<?php $this->layout('admin/layouts/layout') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Tenemos <?= count($usuarios) ?> Usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active"> Migas de pan
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Usuarios</h3>                            <?php $this->insert('partials/feedback') ?>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="//academia.local/admin/buscausuario" method="POST" class="form-horizontal">
                            <input type="text" name="buscar">
                            <input type="submit" value="Buscar Usuario">
                        </form>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Profesor (S/N)</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td><?= $usuario->id?></td>
                                    <td><?= $usuario->nombre ?></td>
                                    <td><?= $usuario->email ?></td>
                                    <td><?php if (($usuario->profesor)==True){ echo "SI";} else { echo "NO";} ?></td>


                                    <td><b>
                                            <a  href="../admin/eliminarusuario/<?= $usuario->id?>">[ELIMINAR]</a>
                                            <a  href="../admin/editarusuario/<?= $usuario->id?>">[EDITAR]</a></b></td>

                                </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->