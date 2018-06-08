<?php 

use Mini\Libs\Sesion; 
$this->layout('layouts/layout');

 if( ! isset($_SESSION['user_email'])){
	echo "<div class='container'><h2> Aún no has iniciado sesión</h2></div>";
}else{

Sesion::destroy();
echo "<div class='container'><h3>Te has desconectado</h3></div>";
};



 ?>
