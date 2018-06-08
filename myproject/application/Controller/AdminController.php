<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Entrada;
use Mini\Model\Usuario;
use Mini\Model\Categoria;
use Mini\Model\Mensaje;
use Mini\Libs\Sesion;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->addData(['titulo' => 'admin']);
    }

    public function index()
    {

        $mensaje = new Mensaje();
        $mensajes = $mensaje->getAll();
        echo $this->view->render('admin/index',
            ['mensajes' => $mensajes]);
    }

    public function entradas()
    {
        $entrada = new Entrada();
        $categoria = new Categoria();
        $entradas = $entrada->getAll();
        $categorias = $categoria->getAll();
        echo $this->view->render('admin/entradas/index',
            ['categorias' => $categorias, 'entradas' => $entradas]);
    }

    public function categorias()
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        echo $this->view->render('admin/categorias/index',
            ['categorias' => $categorias]);
    }


//CREAR ENTRADA Y CATEGORIA--------------------------------------------------------------------------


    public function crearentrada()
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        if ( ! $_POST) {
            echo $this->view->render('admin/entradas/formulario',
                ['categorias' => $categorias]);
        } else {
            if ( ! isset($_POST["titulo"])){
                         $_POST["titulo"] = "";}
            if ( ! isset($_POST["contenido"])) {
                         $_POST["contenido"] = "";}
            if ( ! isset($_POST["autor"])){
                         $_POST["autor"] = "";}
            if ( ! isset($_POST["resumen"])){
                         $_POST["resumen"] = "";}
            if ( ! isset($_POST["id_categoria"])){
                         $_POST["id_categoria"] = "";}
            if ( ! isset($_POST["privado"])){
                         $_POST["privado"] = "";}

            $datos = ['titulo' => $_POST["titulo"],
                      'contenido' => $_POST["contenido"],
                      'autor' => $_POST["autor"],
                      'resumen' => $_POST["resumen"],
                      'id_categoria' => $_POST["id_categoria"],
                       'privado' => $_POST["privado"]
            ];

            if (Entrada::insert($datos)) {
                $this->entradas();
            } else {
                echo $this->view->render('admin/entradas/formulario',
                    ['errores' => ['Error al insertar'],
                     'datos' => $_POST ]);
            }
        }
    }


    public function crearcategoria()
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        if ( ! $_POST) {

            echo $this->view->render('admin/categorias/formulario',
            ['categorias' => $categorias]);
        } else {
            if ( ! isset($_POST["nombre"])){
                $_POST["nombre"] = "";}
            if ( ! isset($_POST["descripcion"])) {
                $_POST["descripcion"] = "";}
            if ( ! isset($_POST["color"])) {
                $_POST["color"] = "";}
            if ( ! isset($_POST["id_padre"])) {
                $_POST["id_padre"] = "";}

            $datos = ['nombre' => $_POST["nombre"],
                'descripcion' => $_POST["descripcion"],
                'color' => $_POST["color"],
                'id_padre' => $_POST["id_padre"]
            ];

            if (Categoria::insert($datos)) {
                $this->categorias();
            } else {
                echo $this->view->render('admin/categorias/formulario',
                    ['errores' => ['Error al insertar'],
                        'datos' => $_POST ]);
            }
        }
    }
//EDITAR ENTRADAS Y CATEGORIAS--------------------------------------------------------------------------

    public function editarentrada($id = 0)
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        if ( ! $_POST) {
            $entrada = Entrada::getId($id);
            if ($entrada) {
                echo $this->view->render('admin/entradas/formulario',
                    ['datos'	=>	get_object_vars($entrada),
                        'accion'	=>	'editar',
                        'categorias' => $categorias
                    ]);
            } else {
                header("location: /admin/entradas");
            }
        } else {
            $datos = ['titulo'	=>	(isset($_POST['titulo'])) ? $_POST['titulo'] : "",
                'contenido'	=>	(isset($_POST['contenido'])) ? $_POST['contenido'] : "",
                'autor'	=>	(isset($_POST['autor'])) ? $_POST['autor'] : "",
                'resumen'	=>	(isset($_POST['resumen'])) ? $_POST['resumen'] : "",
                'id_categoria'	=>	(isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : "",
                'privado'	=>	(isset($_POST['privado'])) ? $_POST['privado'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Entrada::edit($datos)) {
                header("location: /admin/entradas");
            } else {
                echo $this->view->render('admin/entradas/formulario',[
                    'errores'	=>	['Error al editar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'editar'
                ]);
            }
        }
    }

    public function editarcategoria($id = 0)
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        if ( ! $_POST) {
            $categoria = Categoria::getId($id);
            if ($categoria) {
                echo $this->view->render('admin/categorias/formulario',
                    ['datos'	=>	get_object_vars($categoria),
                        'accion'	=>	'editar',
                        'categorias' => $categorias
                    ]);
            } else {
                header("location: /admin/categorias");
            }
        } else {
            $datos = ['nombre'	=>	(isset($_POST['nombre'])) ? $_POST['nombre'] : "",
                'descripcion'	=>	(isset($_POST['descripcion'])) ? $_POST['descripcion'] : "",
                'color'	=>	(isset($_POST['color'])) ? $_POST['color'] : "",
                'id_padre'	=>	(isset($_POST['id_padre'])) ? $_POST['id_padre'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Categoria::edit($datos)) {
                header("location: /admin/categorias");
            } else {
                echo $this->view->render('admin/categorias/formulario',[
                    'errores'	=>	['Error al editar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'editar'
                ]);
            }
        }
    }
//ELIMINAR ENTRADAS Y CATEGORIAS--------------------------------------------------------------------------

    public function eliminarentrada($id = 0)
    {
        if ( ! $_POST) {
            $entrada = Entrada::getId($id);
            if ($entrada) {
                echo $this->view->render('admin/entradas/formulario',
                    ['datos'	=>	get_object_vars($entrada),
                        'accion'	=>	'eliminar'
                    ]);
            } else {
                header("location: /admin/entradas");
            }
        } else {
            $datos = ['titulo'	=>	(isset($_POST['titulo'])) ? $_POST['titulo'] : "",
                'contenido'	=>	(isset($_POST['contenido'])) ? $_POST['contenido'] : "",
                'autor'	=>	(isset($_POST['autor'])) ? $_POST['autor'] : "",
                'resumen'	=>	(isset($_POST['resumen'])) ? $_POST['resumen'] : "",
                'id_categoria'	=>	(isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""
            ];
            if (Entrada::delete($datos)) {
                header("location: /admin/entradas");
            } else {
                echo $this->view->render('admin/entradas/',[
                    'errores'	=>	['Error al eliminar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'eliminar'
                ]);
            }
        }
    }

    public function eliminarcategoria($id = 0)
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        if ( ! $_POST) {
            $categoria = Categoria::getId($id);
            if ($categoria) {
                echo $this->view->render('admin/categorias/formulario',
                    ['datos'	=>	get_object_vars($categoria),
                        'accion'	=>	'eliminar',
                        'categorias' => $categorias
                    ]);
            } else {
                header("location: /admin/categorias");
            }
        } else {
            $datos = ['nombre'	=>	(isset($_POST['nombre'])) ? $_POST['nombre'] : "",
                'descripcion'	=>	(isset($_POST['descripcion'])) ? $_POST['descripcion'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""
            ];
            if (Categoria::delete($datos)) {
                header("location: /admin/categorias");
            } else {
                echo $this->view->render('admin/categorias/',[
                    'errores'	=>	['Error al eliminar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'eliminar'
                ]);
            }
        }
    }

//CRUD USUARIOS--------------------------------------------------------------------------

    public function usuarios()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        echo $this->view->render('admin/usuarios/index' ,
        ['usuarios' => $usuarios]);
    }

    public function registrousuario()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        if ( ! $_POST) {

            echo $this->view->render('admin/usuarios/registro',
                ['usuarios' => $usuarios]);
        } else {


            if ( ! isset($_POST["nombre"])){
                $_POST["nombre"] = "";}
            if ( ! isset($_POST["email"])) {
                $_POST["email"] = "";}
            if ( ! isset($_POST["password"])) {
                $_POST["password"] = "";}
            if ( ! isset($_POST["profesor"])) {
                $_POST["profesor"] = "";}


            $datos = ['nombre' => $_POST["nombre"],
                'email' => $_POST["email"],
                'password' => $_POST["password"],
                'profesor' => $_POST["profesor"]

            ];

            if (Usuario::insert($datos)) {
                $this->usuarios();
            } else {
                echo $this->view->render('admin/usuarios/registro',
                    ['errores' => ['Error al insertar'],
                        'datos' => $_POST ]);
            }
        }
    }

    public function editarusuario($id = 0)
    {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        if ( ! $_POST) {
            $usuario = Usuario::getId($id);
            if ($usuario) {
                echo $this->view->render('admin/usuarios/registro',
                    ['datos'	=>	get_object_vars($usuario),
                        'accion'	=>	'editar',
                        'usuarios' => $usuarios
                    ]);
            } else {
                header("location: /admin/usuarios");
            }
        } else {
            $datos = ['nombre'	=>	(isset($_POST['nombre'])) ? $_POST['nombre'] : "",
                'email'	=>	(isset($_POST['email'])) ? $_POST['email'] : "",
                'password'	=>	(isset($_POST['password'])) ? $_POST['password'] : "",
                'profesor'	=>	(isset($_POST['profesor'])) ? $_POST['profesor'] : "",
                'imagen'	=>	(isset($_POST['imagen'])) ? $_POST['imagen'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Usuario::edit($datos)) {
                header("location: /admin/usuarios");
            } else {
                echo $this->view->render('admin/usuarios/registro',[
                    'errores'	=>	['Error al editar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'editar'
                ]);
            }
        }
    }

    public function eliminarusuario($id = 0)
    {
        if ( ! $_POST) {
            $usuario = Usuario::getId($id);
            if ($usuario) {
                echo $this->view->render('admin/usuarios/registro',
                    ['datos'	=>	get_object_vars($usuario),
                        'accion'	=>	'eliminar'
                    ]);
            } else {
                header("location: /admin/usuarios");
            }
        } else {
            $datos = ['nombre'	=>	(isset($_POST['nombre'])) ? $_POST['nombre'] : "",
                'email'	=>	(isset($_POST['email'])) ? $_POST['email'] : "",
                'password'	=>	(isset($_POST['password'])) ? $_POST['password'] : "",
                'profesor'	=>	(isset($_POST['profesor'])) ? $_POST['profesor'] : "",
                'id'		=>	(isset($_POST['id'])) ? $_POST['id'] : ""

            ];
            if (Usuario::delete($datos)) {
                header("location: /admin/usuarios");
            } else {
                echo $this->view->render('admin/usuarios/registro',[
                    'errores'	=>	['Error al eliminar'],
                    'datos'		=>	$_POST,
                    'accion'	=>	'eliminar'
                ]);
            }
        }
    }

//BUSQUEDA--------------------------------------------------------------------------
    public function buscausuario()
    {
        $parametro = $_POST['buscar'];
        $usuario = new Usuario();
        $usuarios = $usuario->buscausuario($parametro);
        echo $this->view->render('admin/usuarios/index' ,
            ['usuarios' => $usuarios]);
    }
    public function buscaentrada()
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        $parametro = $_POST['buscar'];
        $entrada = new Entrada();
        $entradas = $entrada->buscaentrada($parametro);
        echo $this->view->render('admin/entradas/index' ,
            ['categorias' => $categorias, 'entradas' => $entradas]);
    }

}


