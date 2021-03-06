<?php session_start(); ?>
<?php include('../../model/db.php'); ?>
<?php include('../../controller/usuario.php'); 

	$user = new Usuario($db);

?>
<?php include('../../controller/responsable.php'); 

	$responsable = new Responsable($db);

?>
<?php 
	
	if(!isset($_SESSION['nombre'])){

		header("Location:../index.php");
		printf('<script type="text/javascript">alert("Tiene que iniciar sesion.Muchas Gracias.")</script>');

	}

	if(isset($_POST['logout'])){

		$user->logout();
		printf('<script type="text/javascript">alert("Esta saliendo de la aplicacion.Muchas Gracias.")</script>');

	}


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Menu | Inventario STM</title>
	<meta charset="utf-8">
	<link rel="icon" type="img/ico" href="../../resource/img/logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../resource/css/estilo.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<style type="text/css">*{font-family: Lato;}</style>
	<style type="text/css">
		
	    #scroll{
	        height:500px;
	        width:300px;
	        overflow-y:scroll;
	        overflow-x:hidden;
	        scrollbar-face-color: black;
	    }

	    #scroll_table{
	        height:400px;
	        width:950px;
	        overflow-y:scroll;
	        overflow-x:scroll;
	        scrollbar-face-color: black;
	    }

	  ::-webkit-scrollbar {
	    width: 15px;
	    height: 10px;
	  }
	  ::-webkit-scrollbar-button {
	    width: 0px;
	    height: 0px;
	  }
	  ::-webkit-scrollbar-thumb {
	    background: #007bff;
	    border: 1px solid #e9ecef;
	    border-radius: 0px;
	  }
	  ::-webkit-scrollbar-thumb:hover {
	    background: #007bff;
	  }
	  ::-webkit-scrollbar-thumb:active {
	    background: #007bff;
	  }
	  ::-webkit-scrollbar-track {
	    background: #ffffff;
	    border: 0px none #ffffff;
	    border-radius: 0px;
	  }
	  ::-webkit-scrollbar-track:hover {
	    background: #ffffff;
	  }
	  ::-webkit-scrollbar-track:active {
	    background: #ffffff;
	  }
	  ::-webkit-scrollbar-corner {
	    background: transparent;
	  }

	</style>
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
	  <a class="navbar-brand" href="#"><img src="../../resource/img/logo.png" width="32"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">STM Technology - SI <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" method="POST">
	      <button class="btn btn-warning my-2 my-sm-0 mr-2" style="color: white;"><i class="fa fa-user-secret"></i>&nbsp; <?php if(isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; }else{ echo 'Desconocido'; } ?></button>
	      <button class="btn btn-danger my-2 my-sm-0" style="color: white;"  name="logout"><i class="fa fa-sign-out"></i>&nbsp; Salir</button>
	    </form>
	  </div>
	</nav>
</header>
<body>
	<div class="container-fluid">
	    <div class="row d-flex d-md-block flex-nowrap wrapper">
	        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
	                <div class="list-group border-0 card text-center text-md-left">
	                <a href="#menu4" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-sort-amount-desc"></i> <span class="d-none d-md-inline">Categoria</span></a>
	                <div class="collapse" id="menu4">
	                    <a href="register_categoria.php" class="list-group-item" data-parent="#menu4"><i class="fa fa-pencil-square-o"></i>Registrar</a>
	                    <a href="view_categoria.php" class="list-group-item" data-parent="#menu4"><i class="fa fa-eye"></i>Visualizar</a>
	                </div>
	                <a href="#menu5" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-shopping-cart"></i> <span class="d-none d-md-inline">Productos</span></a>
	                <div class="collapse" id="menu5">
	                    <a href="register_producto.php" class="list-group-item" data-parent="#menu5"><i class="fa fa-pencil-square-o"></i>Registrar</a>
	                    <a href="view_producto.php" class="list-group-item" data-parent="#menu5"><i class="fa fa-eye"></i>Visualizar</a>
	                </div>
	                <a href="#menu6" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-list-alt"></i> <span class="d-none d-md-inline">Inventario</span></a>
	                <div class="collapse" id="menu6">
	                    <a href="register_inventario.php" class="list-group-item" data-parent="#menu6"><i class="fa fa-pencil-square-o"></i>Registrar</a>
	                    <a href="view_inventario.php" class="list-group-item" data-parent="#menu6"><i class="fa fa-eye"></i>Visualizar</a>
	                    <a href="report.php" class="list-group-item" data-parent="#menu6"><i class="fa fa-file-pdf-o"></i>Reporte</a>
	                </div>   
	            </div>
	        </div>
	        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
	            <div class="container" style="padding: 20px;">
	            	<h1 class="display-5">Responsable. Visualizar</h1>
	            	<br>
	            	<div id="scroll_table">
	            		<table class="table table-bordered table-hover">
						  <thead>
						    <tr class="bg-primary" style="color: white;">
						      <th style="text-align: center;">#</th>
						      <th style="text-align: center;">Nombre</th>
						      <th style="text-align: center;">Cargo</th>
						      <th style="text-align: center;">DNI</th>
						      <th style="text-align: center;">Teléfono</th>
						      <th style="text-align: center;">Area</th>
						      <th style="text-align: center;">Operaciones</th>
						    </tr>
						  </thead>
						  <tbody>
						      <?php 

						      	$query = "SELECT * FROM responsable";
						      	$responsable->view_register($query);

						       ?>
						  </tbody>
						</table>
	            	</div>	
	            </div>
	        </main>
	    </div>
	</div>
</body>
<footer>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-bottom">
	<p style="color: white;width: 100%;text-align: center;padding-top: 20px;">&copy; Todos los derechos reservados. Desarrollado por Area de Tecnologias STM.</p>
	</nav>
</footer>
</html>