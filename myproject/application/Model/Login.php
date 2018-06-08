<?php


namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\Sesion;


class Login
{

    public static function dologin($datos)
    {
        if(!$datos){

            Sesion::add('feedback_negative', 'No tengo los datos de Login');
            return false;
        }
        if(empty($datos['password'])){

            Sesion::add('feedback_negative', 'No se ha indicado la Contraseña');
        }
        if(empty($datos['email'])){

            Sesion::add('feedback_negative', 'No se ha indicado el email');
        }
        if(Sesion::get('feedback_negative')){
            return false;
        }

        $datos['email'] = trim($datos['email']);
        if(!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)){
            Sesion::add('feedback_negative', 'El Email no es válido');
        }
        if(strlen($datos['password']) < 4){
            Sesion::add('feedback_negative', 'La contraseña debe tener 4 o más caracteres');
        }
        if(Sesion::get('feedback_negative')){

            return false;

        }

        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM Usuarios WHERE email=:email";
        $query = $conn->prepare($ssql);
        $query->bindValue(':email', $datos['email'], PDO::PARAM_STR);

        $query->execute();

        $cuantos = $query->rowCount();
        if($cuantos != 1){
            Sesion::add('feedback_negative', 'No estás registrado');
            return false;
        }

        $usuario = $query->fetch();
        if($usuario->password != $datos['password']){
            Sesion::add('feedback_negative', 'La contraseña no coincide');
return false;
        }

        //Sesion::set('user_id', $usuario->id_usuario);
        Sesion::set('user_name', $usuario->nombre);
        Sesion::set('user_profesor', $usuario->profesor);
        Sesion::set('user_image', $usuario->imagen);
        Sesion::set('user_email', $datos['email']);
        Sesion::set('user_logged_in', true);

        return true;


    }

    public static function salir()
    {
        Sesion::destroy();
		header('Location: /');
        exit();
    }

}