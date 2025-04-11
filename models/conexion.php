<?php

class Conexion
{
	public static function getConectarMySQL()
	{
		try {
			//Parametros de conexion
			$cadena = "mysql:host=127.0.0.1; dbname=BD504; charset=utf8";
			$usuario = "root";
			$clave = "";

			//Instanciar un nuevo objeto PDO: Objeto de Datos de PHP
			$objPDO = new PDO($cadena, $usuario, $clave);
			
			//Configurar el modo de error para que lance excepciones
			$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			//Configurar el modo de fetch por defecto
			$objPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			
			//Retornar el objeto PDO
			return $objPDO;
		} catch (PDOException $e) {
			//Mostrar mensaje de error
			echo "Error de conexión: " . $e->getMessage();
			die();
		}
	}
}

?>