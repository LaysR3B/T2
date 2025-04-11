<?php

	if(isset($_GET['idEliminar']))
	{
		//Recoger el id eliminar
		$idEliminar = $_GET['idEliminar'];

		//Incluir el modelo Producto
		require_once('../../models/producto.php');

		//Instanciar la clase Producto
		$objProducto = new Producto();

		//Ejecutar el metodo Eliminar
		$objProducto->setEliminar($idEliminar);

		//Mostrar mensaje
		echo "<h1>Eliminando ...</h1>";

		//Redireccionar a la pagina principal
		header("refresh:1;url=index.php");

	}

?>