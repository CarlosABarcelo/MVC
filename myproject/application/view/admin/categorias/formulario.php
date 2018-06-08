<?php $this->layout('admin/layouts/layout') ?>

<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/jquery/dist/jquery.min.js"></script>


<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="http://academia.local/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="http://academia.local/bower_components/bootstrap/dist/css/bootstrap.min.css">

<script>
    $(function () {

        //Colorpicker
        $('.my-colorpicker1').colorpicker();

    })
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if(isset($accion) && $accion == 'editar') : ?>
                Editar una Categoria:
            <?php endif ?>
            <?php if(!isset($accion) ) : ?>
                Crear Categoria
            <?php endif ?>
            <?php if(isset($accion) && $accion == 'eliminar') : ?>
                Borrar una Categoria:
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
                    <form action="//academia.local<?= $_SERVER['REQUEST_URI'] ?>" method="POST" class="form-horizontal">
                        <?php if (isset($accion) && ($accion == 'editar')) : ?><input type="hidden" name="id" value="<?= $datos['id'] ?>"><?php endif ?>

                        <?php if (isset($accion) && ($accion == 'eliminar')) : ?><input type="hidden" name="id" value="<?= $datos['id'] ?>"><?php endif ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>

                                <div class="col-sm-10">
                                    <input class="form-control" name="nombre" id="nombre"
                                    <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                      type="text" value="<?= isset($datos['nombre']) ? $datos['nombre'] : "" ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="descripcion" id="descripcion"
                                              <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                              rows="5" cols="40"><?= isset($datos['descripcion']) ? $datos['descripcion'] : "" ?></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="color" class="col-sm-2 control-label">color</label>

                                <div class="col-sm-10">
                                    <input class="form-control my-colorpicker1 colorpicker-element" name="color" id="color"
                                           <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                           type="text" value="<?= isset($datos['color']) ? $datos['color'] : "" ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="id_padre" class="col-sm-2 control-label">Categoría Padre</label>



                                <div class="col-sm-10">
                                <select class="form-control" <?php if (isset($accion) && ($accion == 'eliminar')) { echo 'disabled';} ?> class="form-control" name="id_padre" id="id_padre">
                                    <option>Sin Categoría Padre</option>
                                    <?php foreach ($categorias as $categoria) : ?>

                                            <?php if( isset($datos['id_padre']) && $datos['id_padre'] == $categoria->id): ?>
                                            <option value="<?= $categoria->id ?>" selected><?= $categoria->nombre ?>

                                                <?php foreach ($categorias as $categori) : ?>
                                                    <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                                                <?php endforeach ?>

                                            </option>
                                            <?php else: ?>
                                            <option value="<?= $categoria->id ?>" ><?= $categoria->nombre ?>

                                                <?php foreach ($categorias as $categori) : ?>
                                                    <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                                                <?php endforeach ?>

                                            </option>
                                            <?php endif ?>

                                    <?php endforeach ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" value="Enviar" class="btn btn-info pull-right">
                        </div>
                        <!-- /.box-footer -->
                    </form>

                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

