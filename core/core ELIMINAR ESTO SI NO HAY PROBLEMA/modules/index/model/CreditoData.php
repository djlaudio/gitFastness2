<?php
class CreditoData {
	public static $tablename = "credito";

	public function add(){
		$sql = "insert into credito (fechaCredito,cantidadCredito,saldoActual,idVendedor,idClienteCredito,porcComisionVendedor,diaPago,observacion,idSistema, idSell, termino_id)";
		$sql .= "value (NOW(),$this->cantidadCredito,$this->saldoActual,$this->idVendedor, $this->idClienteCredito,0,$this->diaPago,'Factura de Contado',0, $this->idSell, $this->termino_id )";



		return Executor::doit($sql);
	}

	public function addWithoutClient(){
		$sql = "insert into credito (fechaCredito,cantidadCredito,saldoActual,idVendedor,porcComisionVendedor,diaPago,observacion,idSistema, idSell, termino_id)";
		$sql .= "value (NOW(),$this->cantidadCredito,$this->saldoActual,$this->idClienteCredito,0,$this->diaPago,'Factura de Contado',0, $this->idSell, $this->termino_id )";



		return Executor::doit($sql);
	}



	public function addCreditos(){

	// Create connection
	$link=mysqli_connect("localhost","fastness_ventas","ventas2016","fastness_wtjjventas2016");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Error al conectar con la base datos: " . mysqli_connect_error();
	}

	$max = "SELECT MAX(numFactura) as max_id FROM credito";
	$max1 =  mysqli_query($link, $max);
	$row = mysqli_fetch_assoc($max1);
	$max_id=$row['max_id'];
	echo "Max id es";
	echo $max_id;

	  $sql = "insert into credito(idVendedor,  cantidadCredito, diaPago, observacion, fechaCredito, saldoActual, descrProducto, cuotaCredito, termino_id, numFactura, montoPagado) values ('28', $this->total, $this->dia_pago, '', $this->created_at, $this->total, '', $this->cuota, $this->termino_id, , ($max_id+1), '0')";


	 // $sql="INSERT INTO credito(idVendedor, idClienteCredito, cantidadCredito, diaPago, observacion, fechaCredito, saldoActual, descrProducto, cuotaCredito, termino_id, numFactura, montoPagado) //values ('$idUsuario','$idCliente','$credito','$diaPago', '$observacion','$fechaCredito','$credito','$descrProductoCre',$cuotaCredito, $termino_id, ($max_id+1), '0')";

	  return Executor::doit($sql);
	 }



	public function CreditoData(){
		$this->idCredito = "";

		$this->descripcion= ""; // se utiliza para cargar el combo con una descripcion del credito
	}

	public static function getAll(){

		$sql = "SELECT idCredito, CONCAT( credito.idCredito,' Factura: ', credito.numFactura, ' ', persona.nombre, cantidadCredito,  ' col.', credito.observacion) AS descripcion
		FROM credito
		INNER JOIN cliente ON credito.idClienteCredito = cliente.idPersona
		INNER JOIN persona ON cliente.idPersona = persona.idPersona
		WHERE  credito.cantidadCredito >credito.montoPagado AND credito.termino_id='137' and credito.anulada='0' and credito.anulada2='0'
		order by persona.nombre";

		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CreditoData();
			$array[$cnt]->idCredito = $r['idCredito'];
			$array[$cnt]->descripcion = $r['descripcion'];
			$cnt++;
		}
		return $array;
	}

	public static function getLastId(){
		$sql = "select MAX(idCredito) idCredito FROM credito";
		$max="";

		$query = Executor::doit($sql);
		while($r = $query[0]->fetch_array()){
			$max = $r['idCredito'];
		}


		return $max;
	}
}

?>
