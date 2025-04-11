<?php

	if(isset($_GET['idEliminar']))
	{
		//Recoger el id eliminar
		$idEliminar = $_GET['idEliminar'];

		//Incluir el modelo Cliente
		require_once('../../models/cliente.php');

		//Instanciar la clase Cliente
		$objCliente = new Cliente();

		//Ejecutar el metodo Eliminar
		$objCliente->setEliminar($idEliminar);

		//Mostrar mensaje
		echo "<h1>Cliente eliminado exitosamente!</h1>";

		//Redireccionar a la pagina principal
		header("refresh:1;url=index.php");

	}

?>
