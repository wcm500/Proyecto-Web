<?php 
include 'eliminar_usuario.php';
	$user="root";
    $pass="";
    $server="localhost";
    $db="mercadovirtualcr";
    $con=mysqli_connect($server,$user,$pass);
    mysqli_select_db($con,$db);
    echo "<script>
    alert('Conectado a la base de datos');
</script>";
	$result = mysqli_query($con,"SELECT * FROM EMPRESARIOS");

	if (isset($_POST['empr_name']) || isset($_POST['empr_lastname']) ||
 isset($_POST['empr_phone']) ||
isset($_POST['empr_mail']) || isset($_POST['empr_legalid']) ||
isset($_POST['empr_age']) || isset($_POST['empr_password'])) {

$empr_name = $_POST['empr_name'];
$empr_lastname = $_POST['empr_lastname'];
$empr_phone=$_POST['empr_phone'];
$empr_mail=$_POST['empr_mail'];
$empr_legalid=$_POST['empr_legalid'];
$empr_password=$_POST['empr_password'];
$empr_age=$_POST['empr_age'];
}


	$success  = "";
	$existe = 0;
    if (isset($_POST['insertar'])) {
        try {
            $con=mysqli_connect($server,$user,$pass);
			mysqli_select_db($con,$db);

			
			
			$resultados = mysqli_query($con, "SELECT * FROM empresarios WHERE empr_legalid = '$empr_legalid'");
			while ($consulta = mysqli_fetch_array($resultados)) {
				
				
				
				
				$existe ++;

				echo "<script>
				alert('Él usuario ya existe, no se puede ingresar');
			</script>";
				
		
		
			}if ($existe == 0) {
				
					echo "<script>
					alert('');
				</script>";


				
				if ($empr_name=="" || $empr_lastname=="" || $empr_phone=="" || $empr_mail=="" ||
                $empr_legalid==""  || $empr_password=="" || $empr_age=="") {
                
                    echo "<script>
                    alert('No se insertaron los datos');
                </script>";
            }else{
                mysqli_query($con, "INSERT INTO `empresarios`( `EMPR_NAME`, `EMPR_LASTNAME`, `EMPR_PHONE`, `EMPR_MAIL`, `EMPR_LEGALID`, `EMPR_AGE`, `EMPR_PASSWORD`)
                 VALUES ('$empr_name',
                        '$empr_lastname',
                        '$empr_phone',
                        '$empr_mail',
                        '$empr_legalid',
                        '$empr_age',
                        '$empr_password')");

        
        $success    =   "Nuevo!";
		header("Location: tablaDinamicaEmpresarios.php");
        
        
            }
				
			}
		
        
        } catch (\Throwable $th) {
           echo "<script>
                    alert('No se inserto los datos');
                </script>";
        }
	}
	

	if (isset($_POST['Editar'])) {

		try {
		$con=mysqli_connect($server,$user,$pass);
		mysqli_select_db($con,$db);
	
		$empr_name = $_POST['nombre'];
        $empr_lastname = $_POST['apellido'];
        $empr_phone =$_POST['telefono'];
        $empr_mail =$_POST['correo'];
        $empr_legalid =$_POST['cedula'];
        $empr_password =$_POST['contrasena'];
        $empr_age =$_POST['edad'];
      
	
	

			
			
		
		if ($empr_name=="" || $empr_lastname=="" || $empr_phone=="" || $empr_mail=="" ||
        $empr_legalid==""  || $empr_password=="" || $empr_age=="") {
			
				echo "<script>
				alert('La cedula esta vacia');
			</script>";
		}else{
	
			$existe = 0;
	
			 $resultados = mysqli_query($con, "SELECT * FROM EMPRESARIOS WHERE EMPR_LEGALID = '$empr_legalid'");
		while ($consulta = mysqli_fetch_array($resultados)) {
	
			$existe ++;
		}
		if ($existe == 0) {
			echo "<script>
			alert('el usuario no existe');
		</script>";
		}else{
			
			
			mysqli_query ($con, "UPDATE empresarios set EMPR_NAME = '$empr_name', EMPR_LASTNAME = '$empr_lastname',
			EMPR_PHONE = '$empr_phone', EMPR_MAIL = '$empr_mail', EMPR_LEGALID = '$empr_legalid', EMPR_AGE = '$empr_age', EMPR_PASSWORD = '$empr_password' 
			where EMPR_LEGALID = '$empr_legalid'")
				or die ("Error al actualizar los datos");
				
	
			
			
			
	
			echo "<script>
			alert('se ha actualizado los datos');
		</script>";
		
		}
		  
	
		 
		}
	} catch (\Throwable $th) {
		echo "<script>
				alert('No se actualizo');
			</script>";
	}
	}


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../css/styles.css">

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/Adminestilos.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Proveeduria</title>
</head>
<body>
<div class="d-flex" id="content-wrapper">

<!-- Sidebar -->
<div id="sidebar-container" class="bg-primary">
	<div class="logo">
		<h4 class="text-light font-weight-bold mb-0">Proveeduria</h4>
	</div>
	<div class="menu">
		<a href="panelControlJefe.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
			Tablero</a>

		<a href="tablaDinamicaUsuario.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
			Usuarios</a>

		<a href="tablaDinamicaPorductos.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
			Porductos</a>
		<a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
			Pymes Registradas</a>
		
	</div>
</div>
<!-- Fin sidebar -->

<div class="w-100">

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
	<div class="container">

	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<form class="form-inline position-relative d-inline-block my-2">
		  <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
		  <button class="btn position-absolute btn-search" type="submit"><i class="icon ion-md-search"></i></button>
		</form>
		<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
		  <li class="nav-item dropdown">
			<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
			  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <img src="../imagenes/user-6.png" class="img-fluid rounded-circle avatar mr-2"
			  alt="https://generated.photos/" />
			Usuario#2
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="#">Mi perfil</a>
			  
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="../html/loginvista.html">Cerrar sesión</a>
			</div>
		  </li>
		</ul>
	  </div>
	</div>
  </nav>
  <!-- Fin Navbar -->

<!-- Page Content -->
<div id="content" class="bg-grey w-100">

	  <section class="bg-light py-3">
		  <div class="container">
			  <div class="row">
				  <div class="col-lg-9 col-md-8">
					<h1 class="font-weight-bold mb-0">Bienvenido al panel de administrador de Mercado Virtual CR </h1>
					<p class="lead text-muted">Última información</p>
				  </div>
				  
			  </div>
		  </div>
	  </section>

	  <section class="bg-mix py-3">
	<h3 class="text-center text-success" id="message"><?php echo  $success; ?></h3>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manejo <b>Usuarios</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Usuario</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar</span></a>						
					</div>
                </div>
			</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Codigo Empresario</th>
						<th>Nombre </th>
						<th>Apellido</th>
						<th>Telefono</th>
                        <th>Correo</th>
						<th>Cedula</th>
                        <th>Edad</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
				<?php
                while($row = mysqli_fetch_array($result))
                {
                ?>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><?php echo $row["EMPR_ID"]; ?></td>
						<td><?php echo $row["EMPR_NAME"]; ?></td>
						<td><?php echo $row["EMPR_LASTNAME"]; ?></td>
						<td><?php echo $row["EMPR_PHONE"]; ?></td>
						<td><?php echo $row["EMPR_MAIL"]; ?></td>
                        <td><?php echo $row["EMPR_LEGALID"]; ?></td>
                        <td><?php echo $row["EMPR_AGE"]; ?></td>
                        <td><?php echo $row["EMPR_PASSWORD"]; ?></td>
						
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                <?php 
                    } 
                ?>
				<?php
				
					// close connection database
					mysqli_close($con);
                ?>
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Muestra <b>1</b> de <b>100</b> tablas</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Siguiente</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="tablaDinamicaEmpresarios.php">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Empresario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="empr_name" placeholder="Introduzca nombre" required>
                        </div>
                        
                        <div class="form-group">
							<label>Apellido</label>
							<input type="text" class="form-control" name="empr_lastname" placeholder="Introduzca apellido" required>
                        </div>
                        <div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="empr_phone" placeholder="Introduzca telefono" required>
						</div>
						<div class="form-group">
							<label>Correo</label>
							<input type="email" class="form-control" name="empr_mail" placeholder="Introduzca correo" required>
						</div>
						<div class="form-group">
							<label>Cédula</label>
							<input class="form-control" name="empr_legalid" placeholder="Introduzca cédula" required></textarea>
						</div>
						<div class="form-group">
							<label>Edad</label>
							<input type="text" class="form-control" name="empr_age" placeholder="Introduzca edad" required>
							</div>		
						
						<div class="form-group">
							<label>Contraseña</label>
							<input type="text" class="form-control" name="empr_password" placeholder="Introduzca contraseña" required>
						</div>	
									
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" name="insertar" value="Agregar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="tablaDinamicaEmpresarios.php">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
					<div class="modal-body">
					<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="nombre" placeholder="Enter nombre" required>
						</div>
						<div class="form-group">
							<label>Primer Apellido</label>
							<input class="form-control" name="apellido" placeholder="Enter primer apellido" required></textarea>
						</div>	
						
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="telefono" placeholder="Enter telefono" required>
						</div>	
						
					<div class="form-group">
							<label>Correo</label>
							<input type="email" class="form-control" name="correo" placeholder="Enter correo" required>
						</div>
						<div class="form-group">
							<label>Cedula</label>
							<input type="text" class="form-control" name="cedula" placeholder="Enter cedula" required>
						</div>
						<div class="form-group">
							<label>Edad</label>
							<input type="text" class="form-control" name="edad" placeholder="Enter edad" required>
						</div>							
						<div class="form-group">
							<label>Contraseña</label>
							<input type="password" class="form-control" name="contrasena" placeholder="Enter contraseña" required>
						</div>
												
									
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" name = "Editar" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="eliminar_usuario.php" >
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Seguro de eliminar ese empleado?</p>
						<div class="form-group">
							<label>Cedula</label>
							<input type="text" class="form-control" name="cedula" placeholder="Ingrese la cedula para confirmar" required>
						</div>
						<p class="text-warning"><small>Esta accion no se puede devolver.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" name = "Eliminar" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#message').hide();
            },3000);
        });
    </script>

<script src="javascript.js"></script>
	  </section>

</div>

</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>




</body>
</html>  