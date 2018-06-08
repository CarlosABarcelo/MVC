<?php $this->layout('admin/layouts/layout') ?>
<?php use Mini\Libs\Sesion; ?>

<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- CK Editor -->
<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/bower_components/ckeditor/ckeditor.js"></script>
<script>  $(function () { CKEDITOR.replace('contenido') })  </script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php if(isset($accion) && $accion == 'editar') : ?>
                Editar una Entrada:
            <?php endif ?>
            <?php if(!isset($accion) ) : ?>
                Crear Entrada
            <?php endif ?>
            <?php if(isset($accion) && $accion == 'eliminar') : ?>
                Borrar una Entrada:
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
                    <form action="//academia.local<?= $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data" method="POST" class="form-horizontal">
                        <?php if (isset($accion) && ($accion == 'editar')) : ?><input type="hidden" name="id" value="<?= $datos['id'] ?>"><?php endif ?>

                        <?php if (isset($accion) && ($accion == 'eliminar')) : ?><input type="hidden" name="id" value="<?= $datos['id'] ?>"><?php endif ?>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="titulo" id="titulo"
                                    <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                      type="text" value="<?= isset($datos['titulo']) ? $datos['titulo'] : "" ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contenido" class="col-sm-2 control-label">Contenido</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="contenido" id="contenido"
                                              <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                              rows="5" cols="40"><?= isset($datos['contenido']) ? $datos['contenido'] : "" ?></textarea>
                                </div>
                            </div>


                                    <input class="form-control" name="autor" id="autor"

                                           type="hidden" value="<?= isset($datos['autor']) ? Sesion::get('user_name') : Sesion::get('user_name') ?>">



                            <div class="form-group">
                                <label for="resumen" class="col-sm-2 control-label">Resumen</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="resumen" id="resumen"
                                           <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>
                                           type="text" value="<?= isset($datos['resumen']) ? $datos['resumen'] : "" ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_categoria" class="col-sm-2 control-label">Categorías</label>



                                <div class="col-sm-10">
                                    <select class="form-control" <?php if (isset($accion) && ($accion == 'eliminar')) { echo 'disabled';} ?> class="form-control" name="id_categoria" id="id_categoria">

                                        <?php foreach ($categorias as $categoria) : ?>

                                            <?php if( isset($datos['id_categoria']) && ($datos['id_categoria'] == $categoria->id)): ?>
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


                            <div class="form-group">
                                <label for="privado" class="col-sm-2 control-label">Privado</label>
                                <div class="col-sm-4">

                                    <select class="form-control" name="privado" id="privado" <?php if (isset($accion) && ($accion == 'eliminar')) : ?>disabled=""<?php endif ?>>
                                        <option value="0" <?php if (isset($datos['privado'])&&($datos['privado']==0)){ echo "selected=''";} ?> >NO</option>
                                        <option value="1" <?php if (isset($datos['privado'])&&($datos['privado']==1)){ echo "selected=''";} ?>>SI</option>
                                    </select>


                                </div>
                                <div class="col-sm-4"><input id="fichero" name="fichero" size="30" type="file" /> <?php if (isset($datos['fichero'])) { echo $datos['fichero']; } ?><br><span style="color: red">Solo permanecerá 1 Fichero , y como máximo el mismo nombre por minuto</span></div>
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

