<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Categoria;
use Mini\Model\Entrada;

class EntradasController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->addData(['titulo' => 'Entradas']);
    }

    public function index()
    {
        $entrada = new Entrada();
        $entradas = $entrada->getAll();
        echo $this->view->render('entradas/publica',
            ['entradas' => $entradas]);
    }

    public function ver($id = 0)
    {
        if ( ! $_POST) {
            $entrada = Entrada::getId($id);
            if ($entrada) {
                echo $this->view->render('entradas/ver',
                    ['datos'	=>	get_object_vars($entrada),
                        'accion'	=>	'ver'
                    ]);
            } else {
                header("location: /preguntas/todas");
            }/*
        } else {
            $datos = ['asunto'	=>	(isset($_POST['asunto'])) ? $_POST['asunto'] : "",
                'slug'	=>	(isset($_POST['slug'])) ? $_POST['slug'] : "",
                'cuerpo'	=>	(isset($_POST['cuerpo'])) ? $_POST['cuerpo'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Pregunta::delete($datos)) {
                header("location: /preguntas/todas");
            } else {
                echo $this->view->render('preguntas/formularioeliminar',[
                    'errores'	=>	['Error al ver la pregunta'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'ver'
                ]);
            }*/
        }
    }

    public function filtarcategoria()
    {

        $variable = $_POST['id_categoria'];

        $entrada = new Entrada();
        $entradas = $entrada->filtro($variable);

        echo $this->view->render('entradas/publica',
            ['entradas' => $entradas]);
    }


    public function categorias()
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        echo $this->view->render('entradas/categorias',
            ['categorias' => $categorias]);
    }
/*

    public function crear()
    {
        if ( ! $_POST) {
            echo $this->view->render('preguntas/formulariopregunta');
        } else {
            if ( ! isset($_POST["asunto"])){
                $_POST["asunto"] = "";
            }


            if ( ! isset($_POST["cuerpo"])) {
                $_POST["cuerpo"] = "";
            }

            $datos = ['asunto' => $_POST["asunto"],


                'cuerpo' => $_POST["cuerpo"]
            ];

            if (Pregunta::insert($datos)) {
                $this->todas();
            } else {
                echo $this->view->render('preguntas/formulariopregunta',
                    ['errores' => ['Error al insertar'],
                        'datos' => $_POST
                    ]);
            }
        }
    }

    public function editar($id = 0)
    {
        if ( ! $_POST) {
            $pregunta = Pregunta::getId($id);
            if ($pregunta) {
                echo $this->view->render('preguntas/formulariopregunta',
                    ['datos'	=>	get_object_vars($pregunta),
                        'accion'	=>	'editar'
                    ]);
            } else {
                header("location: /preguntas/todas");
            }
        } else {
            $datos = ['asunto'	=>	(isset($_POST['asunto'])) ? $_POST['asunto'] : "",
                'slug'	=>	(isset($_POST['slug'])) ? $_POST['slug'] : "",
                'cuerpo'	=>	(isset($_POST['cuerpo'])) ? $_POST['cuerpo'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Pregunta::edit($datos)) {
                header("location: /preguntas/todas");
            } else {
                echo $this->view->render('preguntas/formulariopregunta',[
                    'errores'	=>	['Error al editar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'editar'
                ]);
            }
        }
    }


    public function eliminar($id = 0)
    {
        if ( ! $_POST) {
            $pregunta = Pregunta::getId($id);
            if ($pregunta) {
                echo $this->view->render('preguntas/formularioeliminar',
                    ['datos'	=>	get_object_vars($pregunta),
                        'accion'	=>	'eliminar'
                    ]);
            } else {
                header("location: /preguntas/todas");
            }
        } else {
            $datos = ['asunto'	=>	(isset($_POST['asunto'])) ? $_POST['asunto'] : "",
                'slug'	=>	(isset($_POST['slug'])) ? $_POST['slug'] : "",
                'cuerpo'	=>	(isset($_POST['cuerpo'])) ? $_POST['cuerpo'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Pregunta::delete($datos)) {
                header("location: /preguntas/todas");
            } else {
                echo $this->view->render('preguntas/formularioeliminar',[
                    'errores'	=>	['Error al eliminar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'eliminar'
                ]);
            }
        }
    }
*/



}