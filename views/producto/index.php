<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Producto</title>
</head>
<body>
	<h1>Gestion del Producto</h1>

	<hr>
	<a href="agregar.php">Nuevo producto</a>
	<hr>

	<?php
		//Incluir el modelo Producto
		require_once('../../models/producto.php');

		//Instanciar la clase Producto
		$objProducto = new Producto();

		try {
			if(isset($_GET['txtDescripcionBuscar']))
			{
				//Recoger el valor de la descripcion a buscar
				$descripcionBuscar = $_GET['txtDescripcionBuscar'];

				//Ejecutar el metodo de busqueda por descripcion
				$tabla = $objProducto->getBuscarPorDescripcion($descripcionBuscar);
			}
			else
			{
				$descripcionBuscar = "";
				//Cargar todos los productos
				$tabla = $objProducto->getBuscarPorDescripcion("");
			}
		} catch (PDOException $e) {
			echo "<p style='color: red;'>Error de conexión: " . $e->getMessage() . "</p>";
			$tabla = array();
		}

	?>

	<form>
		<table>
			<tr>
				<td>Descripcion:</td>
				<td><input type="text" name="txtDescripcionBuscar" value="<?php echo htmlspecialchars($descripcionBuscar); ?>"></td>
				<td><input type="submit" value="Buscar"></td>
			</tr>
		</table>
	</form>

	<?php if (empty($tabla)): ?>
		<p>No se encontraron productos.</p>
	<?php else: ?>
		<table border="1">
			<tr>
				<th>CODIGO</th>
				<th>DESCRIPCION</th>
				<th>CATEGORIA</th>
				<th>PRECIO S/.</th>
				<th>ACCIONES</th>
			</tr>
			<?php foreach($tabla as $fila): ?>
			<tr>
				<td><?php echo htmlspecialchars($fila['id']); ?></td>
				<td><?php echo htmlspecialchars($fila['descripcion']); ?></td>
				<td><?php echo htmlspecialchars($fila['categoria']); ?></td>
				<td><?php echo htmlspecialchars($fila['precio']); ?></td>
				<td>
					<a href="editar.php?idBuscar=<?php echo $fila['id']; ?>">Editar</a>
					<a href="eliminar.php?idEliminar=<?php echo $fila['id']; ?>">Eliminar</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>

</body>
</html>