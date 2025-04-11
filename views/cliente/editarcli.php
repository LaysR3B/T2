<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Cliente</title>
</head>
<body>
	<h1>Cliente: Editar</h1>

	<hr>
	<?php
		//Incluir el modelo Cliente
		require_once('../../models/cliente.php');

		//Instanciar la clase Cliente
		$objCliente = new Cliente();

		//Verificar si se ha enviado el idBuscar
		if(isset($_GET['idBuscar']))
		{
			//Recoger el ID a buscar
			$idBuscar = $_GET['idBuscar'];
			//Ejecutar la busqueda y recoger el cliente
			$objCliente = $objCliente->getBuscarPorId($idBuscar);

		}
		//Verificar si se ha enviado el formulario (clic en guardar)
		else if(isset($_GET['txtId']))
		{
			//Recoger los valores del formulario
			$objCliente->id = $_GET['txtId'];
			$objCliente->nombre = $_GET['txtNombre'];
			$objCliente->numruc = $_GET['txtRuc'];
			$objCliente->direccion = $_GET['txtDireccion'];
			$objCliente->telefono = $_GET['txtTelefono'];

			//Ejecutar el metodo de la actualizacion
			$objCliente->setActualizar($objCliente);
			//Mostrar mensaje de éxito
			echo "<p style='color: green;'>Cliente actualizado exitosamente!</p>";
		}

	?>

	<form>
		<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="txtId" size="5" readonly value="<?php echo $objCliente->id ?>" ></td>
		</tr>
		<tr>
			<td>NOMBRE</td>
			<td><input type="text" name="txtNombre" size="50" value="<?php echo $objCliente->nombre ?>"></td>
		</tr>
		<tr>
			<td>RUC</td>
			<td><input type="text" name="txtRuc" size="11" value="<?php echo $objCliente->numruc ?>"></td>
		</tr>
		<tr>
			<td>DIRECCION</td>
			<td><input type="text" name="txtDireccion" size="50" value="<?php echo $objCliente->direccion ?>"></td>
		</tr>
		<tr>
			<td>TELEFONO</td>
			<td><input type="text" name="txtTelefono" size="20" value="<?php echo $objCliente->telefono ?>"></td>
		</tr>	
		<tr>
			<td><a href="index.php">Retornar</a></td>
			<td><input type="submit" value="Guardar"></td>
		</tr>
		</table>				
	</form>	

</body>
</html>
