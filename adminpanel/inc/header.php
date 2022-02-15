
<?php 
ob_start();
   $filepath = realpath(dirname(__FILE__));
   include_once ($filepath.'/../../helpers/Format.php');
   include_once ($filepath.'/../../lib/Session.php');
   Session::init();
     spl_autoload_register(function ($class) {
     include '../classes/' . $class . '.php';
    });
     $ssid = session_id();
  $Menu = new Menu();
  $User = new User();
  $Medicine = new Medicine();
  $Doctors = new Doctors();
  $Order = new Order();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Hello, world!</title>
  </head>
 <body>
<?php

	if(isset($_GET['logout'])){
		session_destroy();
		header("Location: http://localhost/sifat/adminlog.php");
	}

 ?>
<div class="wrapper">
	<nav id="sidebar">
		<div class="sidebar-header">
			<img src="../images/pp.jpg" width="100" class="rounded-circle mx-auto d-block img-fluid">
			<h5 class="text-center"><b class="text-warning "><?php echo $_SESSION['f_name'] ." ". $_SESSION['l_name']; ?></b></h5>
		</div>
		<ul class="lisst-unstyled components">
			<p>Role : admin</p>
			<li class="active">
				<a href="#homesubmenu" data-toggle="collapse">home</a>
			</li>
			<li >
				<a href="#pdfmenu" data-toggle="collapse" arial-expanded="false" class="dropdown-toggle text-muted"><i class="fa fa-align-left "></i>Doctors</a>
				<ul class="collapse lisst-unstyled" id="pdfmenu">
					<li>
						<a href="#"><i class="fa fa-align-left"></i>View All question</a>
					</li>
					<li>
						<a href="#">Add Doctors</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#" class="text-muted"><i class="fa fa-align-left"></i>About</a>
			</li>
			<li >
				<a href="#pageSubmenu" data-toggle="collapse" arial-expanded="false" class="dropdown-toggle text-muted">Pages</a>
				<ul class="collapse lisst-unstyled" id="pageSubmenu">
					<li>
						<a href="#">Page 1</a>
					</li>
					<li>
						<a href="#">Page 2</a>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
	<div id="content">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<button type="button" id="sidebarCollapse" class="btn btn-info">
					<i class="fa fa-align-left"></i>
					<span>||</span>
				</button>
				<div style="float: left">
					<div class="dropdown mr-3" style="position: relative;">
				        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;padding: 2px">
				          <img class="nav-user-photo rounded-circle" width="50" src="../images/pp.jpg">
				        </button>
				        <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton" style="position: absolute;left: -90px">
				          <a class="dropdown-item position-relative" href="logout/">profile</a>
				          <a class="dropdown-item position-relative" href="?logout">Logout</a>
				        </div>
				      </div>
				</div>
			</div>
		</nav>
		<hr>