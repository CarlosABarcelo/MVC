<?php $this->layout('admin/layouts/layout') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorias
        <small>Tenemos <?= count($categorias) ?> Categorias</small>
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
              <h3 class="box-title">Listado de Categorias</h3>                            <?php $this->insert('partials/feedback') ?>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Categoria Padre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($categorias as $categoria) : ?>
                <tr>
                  <td><?= $categoria->id?> </td>
                    <td style="width: 1px"><i class="fa fa-fw fa-paint-brush" style="color:<?= $categoria->color ?> "></i></td>
                  <td><?= $categoria->nombre ?></td>
                  <td><?= $categoria->descripcion ?></td>
                    <td>
                        <?php foreach ($categorias as $categori) : ?>
                            <?php if ($categori->id === $categoria->id_padre){ echo  $categori->nombre ; } ?>
                        <?php endforeach ?>
                    </td>

                  <td><b>
                          <a  href="../admin/eliminarcategoria/<?= $categoria->id?>">[ELIMINAR]</a>
                          <a  href="../admin/editarcategoria/<?= $categoria->id?>">[EDITAR]</a></b></td>

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
