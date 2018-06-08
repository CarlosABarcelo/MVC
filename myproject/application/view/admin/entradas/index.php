<?php $this->layout('admin/layouts/layout') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Entradas
        <small>Tenemos <?= count($entradas) ?> entradas</small>
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
              <h3 class="box-title">Listado de Entradas</h3>                            <?php $this->insert('partials/feedback') ?>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form action="//academia.local/admin/buscaentrada" method="POST" class="form-horizontal">
                    <input type="text" name="buscar">
                    <input type="submit" value="Buscar Entradas">
                </form>

              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>

                    <th>Autor</th>

                    <th>Resumen</th>
                    <th>Categoria</th>
                    <th>Curso</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($entradas as $entrada) : ?>
                <tr>
                  <td><?= $entrada->id?></td>
                  <td><?= $entrada->titulo ?></td>

                    <td><?= $entrada->autor ?></td>
                    <td><?= $entrada->resumen ?></td>

                    <td>
                    <?php foreach ($categorias as $categoria) : ?>
                        <?php if ($categoria->id === $entrada->id_categoria){ echo  $categoria->nombre ; } ?>
                    <?php endforeach ?>

                    </td>
                    <td>

                        <?php foreach ($categorias as $categoria) : ?>
                            <?php if( $entrada->id_categoria  == $categoria->id): ?>
                                    <?php foreach ($categorias as $categori) : ?>
                                        <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                                    <?php endforeach ?>
                            <?php endif ?>
                        <?php endforeach ?>


                    </td>
                  <td><?= $entrada->fecha_creacion ?></td>
                  <td><b><a  href="../entradas/ver/<?= $entrada->id?>">[VER]</a>
                          <a  href="../admin/eliminarentrada/<?= $entrada->id?>">[ELIMINAR]</a>
                          <a  href="../admin/editarentrada/<?= $entrada->id?>">[EDITAR]</a></b></td>

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