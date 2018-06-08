<?php $this->layout('layouts/layout') ?>

<div class="container" >
    <div class="row" >
        <div class="col-md-10 ml-auto mr-auto">
            <div class="card card-signup" style="background-color: floralwhite">
                <h2 class="card-title text-center">Iniciar Sesión</h2>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 mr-auto">
                            <?php $this->insert('partials/feedback') ?>
                            <form action="//academia.local/login/dologin" method="post" class="login">

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                        </div>
                                        <input class="form-control" name="email" placeholder="Email..." type="text">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                        </div>
                                        <input placeholder="Password..." name="password" class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" value="" checked="" type="checkbox">
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        I agree to the
                                        <a href="#something">terms and conditions</a>.
                                    </label>
                                </div>
                                <div class="text-center">
                                    <input type="submit" name="enviar" value="Enviar" class="btn btn-primary btn-round">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>