<?php
//Incluir el archivo PHP de conexion
require_once("conexion.php");
class Cliente
{
	//Propiedades
	public $id;
	public $nombre;
	public $numruc;
	public $direccion;
	public $telefono;


	//Metodos: CRUD
	public function getBuscarPorId($idBuscar)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("select * from cliente where id=:idBuscar");

		//Pasar el valor al parametro de la sentencia
		$snt->bindValue(":idBuscar",$idBuscar);

		//Ejecutar la sentencia SQL
		$snt->execute();

		//Recoger la fila del resultado
		$fila = $snt->fetch();

		//Asignar los valores de la Fila al Cliente
		$this->id = $fila['id'];
		$this->nombre = $fila['nombre'];
		$this->numruc = $fila['numruc'];
		$this->direccion = $fila['direccion'];
		$this->telefono = $fila['telefono'];

		//Retornar el cliente
		return $this;		
	}
	public function getBuscarPorNombre($nombreBuscar)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("select * from cliente where nombre like concat('%',:nomBus,'%');");

		//Pasar el valor al parametro de la sentencia
		$snt->bindValue(":nomBus",$nombreBuscar);

		//Ejecutar la sentencia SQL
		$snt->execute();

		//Recoger las filas del resultado
		$tabla = $snt->fetchAll();

		//Retornar las filas de la tabla de datos
		return $tabla;
	}
	public function setInsertar($objCliente)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("insert into cliente (nombre, numruc, direccion, telefono) values (:nom,:ruc,:dir,:tel);");
		//Pasar los valores de los parametros de la sentencia
		$snt->bindValue(":nom",$objCliente->nombre);
		$snt->bindValue(":ruc",$objCliente->numruc);
		$snt->bindValue(":dir",$objCliente->direccion);
		$snt->bindValue(":tel",$objCliente->telefono);

		//Ejecutar la sentencia SQL (insertando un nuevo cliente)
		$snt->execute();

		//--RECUPERAR EL NUEVO ID--
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("select max(id) as nuevoId from cliente;");
		//Ejecutar la sentencia SQL
		$snt->execute();
		//Recoger la unica fila del resultado
		$fila = $snt->fetch();
		//Leer el valor de la fila
		$nuevoId = $fila['nuevoId'];
		//Retornar el nuevo id
		return $nuevoId;
	}
	public function setActualizar($objCliente)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("update cliente set nombre=:nom, numruc=:ruc, direccion=:dir, telefono=:tel where id=:id ;");
		//Pasar los valores de los parametros de la sentencia
		$snt->bindValue(":id",$objCliente->id);
		$snt->bindValue(":nom",$objCliente->nombre);
		$snt->bindValue(":ruc",$objCliente->numruc);
		$snt->bindValue(":dir",$objCliente->direccion);
		$snt->bindValue(":tel",$objCliente->telefono);

		//Ejecutar la sentencia SQL (actualizando el cliente)
		$snt->execute();
	}
	public function setEliminar($idEliminar)
	{
		//Establecer la conexion a la BD
		$cnx = Conexion::getConectarMySQL();
		//Preparar la sentencia SQL
		$snt = $cnx->prepare("delete from cliente where id=:idEliminar ;");
		//Pasar los valores de los parametros de la sentencia
		$snt->bindValue(":idEliminar",$idEliminar);
		//Ejecutar la sentencia SQL (eliminando el cliente)
		$snt->execute();
	}

}

?> 