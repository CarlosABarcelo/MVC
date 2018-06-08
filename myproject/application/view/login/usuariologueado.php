<?php use Mini\Libs\Sesion; ?>
<?php $this->layout('layouts/layout') ?>
<div class="container">
    <h2>Login Correcto</h2>
    <p>Bienvenido al sistema, <?= Sesion::get('user_email') ?></p>
</div>