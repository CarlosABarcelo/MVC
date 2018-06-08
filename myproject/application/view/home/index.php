<?php $this->layout('layouts/layout') ?>

<div class="section text-center" style="padding: 70px 0px 0px 0px !important;" id="sobre_nosotros">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto" >
            <h2 class="title">¡Aprende con Nosotros!</h2>
            <h5 class="description"><b>Ponte al día con la asignatura que necesites o recibe el apoyo extra para el sobresaliente. ¡Venga a nuestro centro y entérate de nuestras tarifas y ofertas especiales!</b></h5>
        </div>
    </div>
    <div class="features">
        <div class="row">
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-info">
                        <i class="material-icons">face</i>
                    </div>
                    <h4 class="info-title">Grupos reducidos</h4>
                    <p><b>Clases de apoyo académico con una atención personalizada a las necesidades del alumno es la seña de identidad de nuestra acdemia. </b></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-success">
                        <i class="material-icons">verified_user</i>
                    </div>
                    <h4 class="info-title">Profesores titulados</h4>
                    <p><b>En nuestra academia todos los profesores son titulados universitarios con gran experiencia en la enseñanza de las materias que imparten.</b></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-danger">
                        <i class="material-icons">description</i>
                    </div>
                    <h4 class="info-title">Todas las asignaturas</h4>
                    <p><b>Ofertamos clases de apoyo de todas las asignaturas de la ESO y Bachillerato y de buena parte de los Ciclos Formativos de Grado Medio y Superior.</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-contacts" style="padding: 0px 0px 70px 0px !important;">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title" id="contacto">Contáctanos</h2><?php $this->insert('partials/feedback') ?>
            <form action="//academia.local/home/mensajenviado" method="POST" class="form-horizontal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"><b>Nombre</b></label>
                            <input type="text" class="form-control" name="nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating"><b>Email</b></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleMessage" class="bmd-label-floating"><b>Mensaje</b></label>
                    <textarea type="email" class="form-control" rows="4" id="exampleMessage" name="mensaje"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">

                            <div class="box-footer">
                                <input type="submit" value="Enviar" class="btn btn-primary btn-raised">
                            </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php // $this->insert('partials/banner', ['dato' => 'Este dato es sólo del banner']) ?>
