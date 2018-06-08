<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\Sesion;

class Entrada
{
    public function getAll()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Entradas";
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

        $ssql = "SELECT * FROM Entradas WHERE id = :id";
        $query = $conn->prepare($ssql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }



    public static function insert($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $errores_validacion = false;
        if (empty($datos['titulo'])) {
            Sesion::add('feedback_negative', "No he recibido el titulo de la entrada");
            $errores_validacion = true;
        }

        if (empty($datos['contenido'])) {
            Sesion::add('feedback_negative', "No he recibido el contenido de la entrada");
            $errores_validacion = true;
        }

//FICHEROS---------------------------------------------------
        if (isset($_FILES) && $_FILES["fichero"]["error"]) {
            Sesion::add('feedback_positive', "No se ha subido ningun fichero" );
        } else {
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $directorio . date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"])){
                $fichero = "/uploads/". date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"];
            }else{
                echo "Error, no se ha movido el fichero";
            }
        }
///////////////////////////////////////////////////////////////////

        if ($errores_validacion) {
            return false;
        }

        $slug = Entrada::slug($datos['titulo']);

        $params = [ ':titulo' => $datos['titulo'],
                    ':slug' => $slug,
                    ':contenido' => $datos['contenido'],
                    ':autor' => $datos['autor'],
                    ':resumen' => $datos['resumen'],
                    ':id_categoria' => $datos['id_categoria'],
                    ':privado' => $datos['privado'],
                    ':fichero' => $fichero
        ];
        $ssql = "INSERT INTO Entradas (titulo, slug, contenido, autor, resumen, id_categoria, privado, fichero) 
                              VALUES (:titulo, :slug, :contenido, :autor, :resumen, :id_categoria, :privado, :fichero)";
        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();
        if ($cuenta == 1) {
            Sesion::add('feedback_positive', "Entrada insertada con éxito, gracias!!!");
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
        if (empty($datos['titulo'])) {
            Sesion::add('feedback_negative', "No he recibido el asunto de la pregunta");
            $errores_validacion = true;
        }

        if (empty($datos['contenido'])) {
            Sesion::add('feedback_negative', "No he recibido el cuerpo de la pregunta");
            $errores_validacion = true;
        }

//FICHEROS---------------------------------------------------
        if (isset($_FILES) && $_FILES["fichero"]["error"]) {
            Sesion::add('feedback_positive', "No se ha subido ningun fichero" );
        } else {
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $directorio . date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"])){
                $fichero = "/uploads/". date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"];
            }else{
                echo "Error, no se ha movido el fichero";
            }
        }
/////////////////////////////////////////////////////////////

        if ($errores_validacion) {
            return false;
        }

        $slug = Entrada::slug($datos['titulo']);


        $ssql = "UPDATE Entradas
				 SET titulo=:titulo, contenido=:contenido, slug=:slug, autor=:autor, resumen=:resumen, id_categoria=:id_categoria, privado=:privado, fichero=:fichero
				 WHERE id=:id";
        $query = $conn->prepare($ssql);

        $parametros = [':titulo'	=>	$datos['titulo'],
            ':slug' => $slug,
            ':contenido' => $datos['contenido'],
            ':autor' => $datos['autor'],
            ':resumen' => $datos['resumen'],
            ':id_categoria' => $datos['id_categoria'],
            ':privado' => $datos['privado'],
            ':fichero' => $fichero,
            ':id'		=>	$datos['id']
        ];
        $query->execute($parametros);
        $count = $query->rowCount();
        if ($count == 1) {
            Sesion::add('feedback_positive', "Editado con éxito, gracias!!!");
            return true;
        }
        Sesion::add('feedback_positive', "Actualizadas 0  Entradas");
        return true;

    }

    public static function delete($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $ssql = "DELETE FROM Entradas
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

    public static function filtro($variable)
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Entradas WHERE id_categoria = $variable";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();

    }

    public function buscaentrada($parametro)
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Entradas WHERE titulo LIKE '%" .$parametro. "%'";
        $param = [':parametro' => $parametro];
        $query = $conn->prepare($ssql);
        $query->execute($param);
        return $query->fetchAll();
    }

}



