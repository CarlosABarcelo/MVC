<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\Sesion;

class Categoria
{
    public function getAll()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Categorias";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function slug($string) {
        $characters = array(
            "Á" => "A", "Ç" => "c", "É" => "e", "Í" => "i", "Ñ" => "n", "Ó" => "o", "Ú" => "u",
            "á" => "a", "ç" => "c", "é" => "e", "í" => "i", "ñ" => "n", "ó" => "o", "ú" => "u",
            "à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u"
        );

        $string = strtr($string, $characters);
        $string = strtolower(trim($string));
        $string = preg_replace("/[^a-z0-9-]/", "-", $string);
        $string = preg_replace("/-+/", "-", $string);

        if(substr($string, strlen($string) - 1, strlen($string)) === "-") {
            $string = substr($string, 0, strlen($string) - 1);
        }

        return $string;
    }

    public static function getId($id)
    {
        $conn = Database::getInstance()->getDatabase();

        $id = (int) ($id);

        if ($id == 0) {
            return false;
        }

        $ssql = "SELECT * FROM Categorias WHERE id = :id";
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
            Sesion::add('feedback_negative', "No he recibido el nombre de la categoria");
            $errores_validacion = true;
        }

        if (empty($datos['descripcion'])) {
            Sesion::add('feedback_negative', "No he recibido el descripcion de la categoria");
            $errores_validacion = true;
        }
        if (empty($datos['color'])) {
            Sesion::add('feedback_negative', "No he recibido el color de la categoria");
            $errores_validacion = true;
        }

        if ($errores_validacion) {
            return false;
        }

        $params = [':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':color' => $datos['color'],
            ':id_padre' => $datos['id_padre'],
        ];

        //echo $params;
        $ssql = "INSERT INTO Categorias (nombre, descripcion, color, id_padre) VALUES (:nombre, :descripcion, :color, :id_padre)";
        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();
        if ($cuenta == 1) {
            Sesion::add('feedback_positive', "Categoría insertada con éxito, gracias!!!");
            return $conn->lastInsertId();
        }
        return false;
    }

    public static function edit($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
        if (empty($datos['id'])) {
            Sesion::add('feedback_negative', "No he recibido la ID");
            $errores_validacion = true;
        }
        if (empty($datos['nombre'])) {
            Sesion::add('feedback_negative', "No he recibido el nombre de la categoria");
            $errores_validacion = true;
        }

        if (empty($datos['descripcion'])) {
            Sesion::add('feedback_negative', "No he recibido el descripcion de la categoria");
            $errores_validacion = true;
        }
        if (empty($datos['color'])) {
            Sesion::add('feedback_negative', "No he recibido el color de la categoria");
            $errores_validacion = true;
        }
        if (empty($datos['id_padre'])) {
            Sesion::add('feedback_negative', "No he recibido el id_padre de la categoria");
            $errores_validacion = true;
        }

        if ($errores_validacion) {
            return false;
        }


        $ssql = "UPDATE Categorias
				 SET nombre=:nombre, descripcion=:descripcion, color=:color, id_padre=:id_padre
				 WHERE id=:id";
        $query = $conn->prepare($ssql);



        $parametros = [':nombre' => $datos['nombre'],
            ':descripcion' => $datos['descripcion'],
            ':color' => $datos['color'],
            ':id_padre' => $datos['id_padre'],
            ':id'		=>	$datos['id']
        ];
        $query->execute($parametros);
        $count = $query->rowCount();
        if ($count == 1) {
            Sesion::add('feedback_positive', "Editado con éxito, gracias!!!");
            return true;
        }
        Sesion::add('feedback_positive', "Actualizadas 0 Categorias");
        return true;

    }

    public static function delete($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $ssql = "DELETE FROM Categorias
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


}



