<?php $this->layout('admin/layouts/layout') ?>

<?php use Mini\Libs\Sesion; ?>

<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/jquery/dist/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if(isset($accion) && $accion == 'editar') : ?>
                Editar un Usuario:
            <?php endif ?>
            <?php if(!isset($accion) ) : ?>
                Registrar Usuario
            <?php endif ?>
            <?php if(isset($accion) && $accion == 'eliminar') : ?>
                Borrar un Usuario:
            <?php endif ?>

            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <?php $this->insert('partials/feedback') ?>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="register-logo">
                        <b>Registro de Usuario</b>
                    </div>

                    <form action="//academia.local<?= $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
                        <?php if (isset($accion) && ($accion == 'editar')) : ?><input type="hidden" name="id" value="<?= $datos['id'] ?>"><?php endif ?>

                        <?php if (isset($accion) && ($accion == 'eliminar')) : ?><input type="hidden" name="id" value="<?= $datos['id'] ?>"><?php endif ?>
                        <div class="box-body col-md-12">

                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="nombre" id="nombre"
                                           <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                           type="text" value="<?= isset($datos['nombre']) ? $datos['nombre'] : "" ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" id="email"
                                           <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                           type="text" value="<?= isset($datos['email']) ? $datos['email'] : "" ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" id="password"
                                           <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                           type="password" value="<?= isset($datos['password']) ? $datos['password'] : "" ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password2" class="col-sm-2 control-label">Repetir Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="password2" id="password2"
                                           <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                           type="password" value="<?= isset($datos['password2']) ? $datos['password2'] : "" ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profesor" class="col-sm-2 control-label">Profesor</label>
                                <div class="col-sm-4">

                                    <select class="form-control" name="profesor" id="profesor" <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>>
                                    <option value="0" <?php if (isset($datos['profesor'])&&($datos['profesor']==0)){ echo "selected=''";} ?> >NO</option>
                                    <option value="1" <?php if (isset($datos['profesor'])&&($datos['profesor']==1)){ echo "selected=''";} ?>>SI</option>
                                    </select>


                                </div>

                                <div class="col-sm-4"><input id="fichero" name="fichero" size="30" type="file" /> <?php if (isset($datos['imagen'])) { echo"<img src='". $datos['imagen']. "'>";} ?><br><span style="color: red">Solo permanecerá 1 Fichero , y como máximo el mismo nombre por minuto</span></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" value="Enviar" class="btn btn-info pull-right">
                        </div>
                        <!-- /.box-footer -->
                    </form>


                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>