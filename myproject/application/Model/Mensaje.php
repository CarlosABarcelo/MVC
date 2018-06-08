<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\Sesion;

class Mensaje
{
    public function getAll()
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Mensajes";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function insert($datos)
    {
        $conn = Database::getInstance()->getDatabase();

        $params = [':nombre' => $datos['nombre'],
            ':email' => $datos['email'],
            ':mensaje' => $datos['mensaje'],
        ];

        $ssql = "INSERT INTO Mensajes (nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)";
        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();
        if ($cuenta == 1) {
            Sesion::add('feedback_positive', "Mensaje enviado con éxito");
            return $conn->lastInsertId();
        }
        return false;
    }
}