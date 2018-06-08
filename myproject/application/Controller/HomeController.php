<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Core\Controller;
 use Mini\Libs\Sesion;
use Mini\Model\Mensaje;


class HomeController extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        $this->view->addData(['titulo' => 'Portada']);
        echo $this->view->render('home/index', ['titulo' => 'Página Principal']);
    }

//MENSAJES---------------------------------------------------------------------------

    public function mensajenviado()
    {

        if ( ! $_POST) {
            echo $this->view->render('home/index');

        } else {
            if ( ! isset($_POST["nombre"])){
                $_POST["nombre"] = "";}
            if ( ! isset($_POST["email"])) {
                $_POST["email"] = "";}
            if ( ! isset($_POST["mensaje"])){
                $_POST["mensaje"] = "";}

            $datos = ['nombre' => $_POST["nombre"],
                'email' => $_POST["email"],
                'mensaje' => $_POST["mensaje"]
            ];

            if (Mensaje::insert($datos)) {
                $this->index();
            } else {
                echo $this->view->render('/',
                    ['errores' => ['Error al insertar'],
                        'datos' => $_POST ]);
            }
        }
    }


}
