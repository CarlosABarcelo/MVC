<?php $this->layout('layouts/layout') ?>




<div class="contanier">
    <div class="row">
        <?php foreach ($categorias as $categoria) : ?>
            <?php  if ( $categoria->id_padre == "0" ) { ?>
                <div class="col-md-4">
                <div class="btn btn-block btn-info btn-lg"><?= $categoria->nombre ?></div>
                <?php foreach ($categorias as $cathijo) : ?>
                    <?php if ( $categoria->id == $cathijo->id_padre) {?>
                        <form action="//academia.local/entradas/filtarcategoria" method="POST" class="form-horizontal">
                            <input type="hidden" value="<?= $cathijo->id ?>" name="id_categoria" >
                            <input class="btn btn-block btn-primary btn-md" type="submit" value="<?= $cathijo->nombre ?>">
                        </form>

                    <?php } ?>
                <?php endforeach ?></div>
            <?php } ?>
        <?php endforeach ?>
    </div>
</div>
