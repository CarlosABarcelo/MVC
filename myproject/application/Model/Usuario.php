<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\Sesion;

class Usuario
{
    public function getAll()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getId($id)
    {
        $conn = Database::getInstance()->getDatabase();

        $id = (int) ($id);

        if ($id == 0) {
            return false;
        }

        $ssql = "SELECT * FROM Usuarios WHERE id = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }



    public static function insert($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
        if (empty($datos['nombre'])) {
            Sesion::add('feedback_negative', "No he recibido el nombre del Usuario");
            $errores_validacion = true;
        }

        if (empty($datos['email'])) {
            Sesion::add('feedback_negative', "No he recibido el correo del Usuario");
            $errores_validacion = true;
        }
        if (empty($datos['password'])) {
            Sesion::add('feedback_negative', "No he recibido el contraseña del Usuario");
            $errores_validacion = true;
        }
        if ($datos['password'] == $datos['password2']) {
            Sesion::add('feedback_negative', "Las Contraseñas no coinciden");
            $errores_validacion = true;
        }

//IMAGEN--------------------------------------------
        if (isset($_FILES) && $_FILES["fichero"]["error"]) {
            Sesion::add('feedback_positive', "No se ha subido ninguna imagen" );
        } else {
            //indicamos los formatos que permitimos subir a nuestro servidor
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $directorio . date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"])){
                $imagen = "/uploads/". date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"];
            }else{
                Sesion::add('feedback_positive', "Error, no se ha movido el fichero" );
                }
        }
//////////////////////////////////////////////////////

        if ($errores_validacion) {
            return false;
        }

        $params = [':nombre' => $datos['nombre'],
            ':email' => $datos['email'],
            ':password' => $datos['password'],
            ':profesor' => $datos['profesor'],
            ':imagen' => $imagen
        ];

        //echo $params;
        $ssql = "INSERT INTO Usuarios (nombre, email, password, profesor, imagen ) VALUES (:nombre, :email, :password, :profesor, :imagen)";
        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();
        if ($cuenta == 1) {
            Sesion::add('feedback_positive', "Usuario insertado con éxito, gracias!!!");
            return $conn->lastInsertId();
        }
        return false;
    }

    public static function edit($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
        if (empty($datos['nombre'])) {
            Sesion::add('feedback_negative', "No he recibido el nombre del Usuario");
            $errores_validacion = true;
        }

        if (empty($datos['email'])) {
            Sesion::add('feedback_negative', "No he recibido el correo del Usuario");
            $errores_validacion = true;
        }
        if (empty($datos['password'])) {
            Sesion::add('feedback_negative', "No he recibido el contraseña del Usuario");
            $errores_validacion = true;
        }
        if ($datos['password'] == $datos['password2']) {
            Sesion::add('feedback_negative', "Las Contraseñas no coinciden");
            $errores_validacion = true;
        }

//IMAGEN--------------------------------------------
        if (isset($_FILES) && $_FILES["fichero"]["error"]) {
            Sesion::add('feedback_positive', "No se ha subido ninguna imagen" );
        } else {
            //indicamos los formatos que permitimos subir a nuestro servidor
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $directorio . date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"])){
                $imagen = "/uploads/". date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"];
            }else{
                Sesion::add('feedback_positive', "Error, no se ha movido el fichero" );
            }
        }
//////////////////////////////////////////////////////


        if ($errores_validacion) {
            return false;
        }


        $ssql = "UPDATE Usuarios
				 SET nombre=:nombre, email=:email, password=:password, profesor=:profesor, imagen=:imagen
				 WHERE id=:id";
        $query = $conn->prepare($ssql);



        $parametros = [':nombre' => $datos['nombre'],
            ':email' => $datos['email'],
            ':password' => $datos['password'],
            ':profesor' => $datos['profesor'],
            ':imagen' => $imagen,
            ':id'		=>	$datos['id']
        ];
        $query->execute($parametros);
        $count = $query->rowCount();
        if ($count == 1) {
            Sesion::add('feedback_positive', "Editado con éxito, gracias!!!");
            return true;
        }
        Sesion::add('feedback_positive', "Actualizados 0 Usuarios");
        return true;

    }

    public static function delete($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $ssql = "DELETE FROM Usuarios
				 WHERE id=:id";
        $query = $conn->prepare($ssql);
        $parametros = [':id'		=>	$datos['id'] ];
        $query->execute($parametros);
        $count = $query->rowCount();
        if ($count == 1) {
            Sesion::add('feedback_positive', "Borrado con éxito, gracias!!!");
            return true;
        }
        Sesion::add('feedback_positive', "Error al eliminar" . $parametros[1]);
        return true;

    }

    public function buscausuario($parametro)
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios WHERE nombre LIKE '%" .$parametro. "%'";
        $param = [':parametro' => $parametro];
        $query = $conn->prepare($ssql);
        $query->execute($param);
        return $query->fetchAll();
    }


}