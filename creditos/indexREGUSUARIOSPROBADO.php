<!DOCTYPE html>
<html lang="es">
<head>Logueo Usuario Creditos</head>
<body style="background-color=#404546;">

<form method="POST" action="registro.php">

<table>
<tr>
<td>
 C�dula
</td>
<td>
<input type="number" name="cedula" placeholder="Digite la c�dula" required>
</td>
</tr>
<tr>
<td>
 Nombre
</td>
<td>
<input type="name" name="nombre" placeholder="Digite el nombre" required>
</td>
</tr>
<tr>
<td>
 Primer Apellido
</td>
<td>
<input type="name" name="apellido1" placeholder="Digite el primer apellido" required>
</td>
</tr>
<tr>
<td>
 Segundo Apellido
</td>
<td>
<input type="name" name="apellido2" placeholder="Digite el segundo apellido" required>
</td>
</tr>
<tr>
<td>
 Tel�fono 1
</td>
<td>
<input type="tel" name="tel1" placeholder="Digite el Tel�fono" required>
</td>
</tr>
<tr>
<td>
 Tel�fono 2
</td>
<td>
<input type="tel" name="tel2" placeholder="Digite el Tel�fono" >
</td>
</tr>
<tr>
<td>
 Direcci�n
</td>
<td>
  <textarea placeholder="Digite la direcci�n del usuario"  name="direccion" id="direccion" rows="5"></textarea>
						    
</td>
</tr>

<tr>
<td>
Rol
</td>
	<td>					      
						       <SELECT NAME="rol" SIZE=1 required> 
							   	<?php include('connect_db.php');
								$query = mysqli_query($link,"SELECT * from rol where estado=1");
								while($row = mysqli_fetch_assoc($query)){?>
								<option value=" <?php echo $row['idRol'] ?> "><?php echo $row['nombreRol']; ?></option>
								<?php } ?>
								
								</SELECT> 
	</td>
</tr>
<tr>
<td>
Zonas
</td>
	<td>					      
						       <SELECT NAME="area" SIZE=1 required > 
							  	<?php include('connect_db.php');
								$query = mysqli_query($link,"SELECT * from area where estado=1");
								while($row = mysqli_fetch_assoc($query)){?>
								<option value=" <?php echo $row['idArea'] ?> "><?php echo $row['nombreArea']; ?></option>
								<?php } ?>
								
								</SELECT> 
	</td>
</tr>
<tr>
<td>
 Usuario
</td>
<td>
<input type="name" name="usuario" placeholder="Digite el usuario" required>
</td>
</tr>
	
<tr>
<td>
 Contrase�a
</td>
<td>
<input type="password" name="pass"  placeholder="Digite la contrase�a" required>
</td>
</tr>
<tr>
<td>
 Repetir Contrase�a
</td>
<td>
<input type="password" name="repPass" placeholder="Repita la contrase�a" required>
</td>
</tr>
</table>
<input type="submit" value="Registrar">
<input type="reset" value="Borrar todo"  >
</form>



</body>
</html>