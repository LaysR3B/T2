<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cliente</title>
</head>
<body>
	<h1>Gestion del Cliente</h1>

	<hr>
	<a href="agregarcli.php">Nuevo cliente</a>
	<hr>

	<?php
		//Incluir el modelo Cliente
		require_once('../../models/cliente.php');

		//Instanciar la clase Cliente
		$objCliente = new Cliente();

		try {
			if(isset($_GET['txtNombreBuscar']))
			{
				//Recoger el valor del nombre a buscar
				$nombreBuscar = $_GET['txtNombreBuscar'];

				//Ejecutar el metodo de busqueda por nombre
				$tabla = $objCliente->getBuscarPorNombre($nombreBuscar);
			}
			else
			{
				$nombreBuscar = "";
				//Cargar todos los clientes
				$tabla = $objCliente->getBuscarPorNombre("");
			}
		} catch (PDOException $e) {
			echo "<p style='color: red;'>Error de conexión: " . $e->getMessage() . "</p>";
			$tabla = array();
		}

	?>

	<form>
		<table>
			<tr>
				<td>Nombre:</td>
				<td><input type="text" name="txtNombreBuscar" value="<?php echo htmlspecialchars($nombreBuscar); ?>"></td>
				<td><input type="submit" value="Buscar"></td>
			</tr>
		</table>
	</form>

	<?php if (empty($tabla)): ?>
		<p>No se encontraron clientes.</p>
	<?php else: ?>
		<table border="1">
			<tr>
				<th>CODIGO</th>
				<th>NOMBRE</th>
				<th>RUC</th>
				<th>DIRECCION</th>
				<th>TELEFONO</th>
				<th>ACCIONES</th>
			</tr>
			<?php foreach($tabla as $fila): ?>
			<tr>
				<td><?php echo htmlspecialchars($fila['id']); ?></td>
				<td><?php echo htmlspecialchars($fila['nombre']); ?></td>
				<td><?php echo htmlspecialchars($fila['numruc']); ?></td>
				<td><?php echo htmlspecialchars($fila['direccion']); ?></td>
				<td><?php echo htmlspecialchars($fila['telefono']); ?></td>
				<td>
					<a href="editarcli.php?idBuscar=<?php echo $fila['id']; ?>">Editar</a>
					<a href="eliminarcli.php?idEliminar=<?php echo $fila['id']; ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>

</body>
</html>
