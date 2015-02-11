<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{USUARIO} - Tiempo y asistencia</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Apoyo psicológico individual o de pareja. Servicios de reclutamiento y selección de personal." />
    <meta name="author" content="sincco.com" />
    <meta name="copyright" content="Algunos Derechos Reservados - apsicat.com" />
	<!-- core CSS -->
    <link href="<?= BASE_URL ?>html/css/bootstrap.min.css" rel="stylesheet">
    <?php if(APP_PROTOCOL == "https://") { ?>
    <link href="<?= BASE_URL ?>html/css/font-awesome-ssl.min.css" rel="stylesheet">
    <?php } else { ?>
    <link href="<?= BASE_URL ?>html/css/font-awesome.min.css" rel="stylesheet">
    <?php } ?>
    <link href="<?= BASE_URL ?>html/css/animate.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>html/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>html/css/main.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>html/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?= BASE_URL ?>html/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= BASE_URL ?>html/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= BASE_URL ?>html/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= BASE_URL ?>html/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= BASE_URL ?>html/images/ico/apple-touch-icon-57-precomposed.png">
    
</head><!--/head-->

<body class="homepage">

    <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Ocultar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?= BASE_URL ?>html/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= BASE_URL ?>horarios">Horarios</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Empleados <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= BASE_URL ?>departamentos">Departamentos</a></li>
                                <li><a href="<?= BASE_URL ?>empleados">Empleados</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Incidencias <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= BASE_URL ?>captura">Captura</a></li>
                                <li><a href="<?= BASE_URL ?>calificacion">Califiacion</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= BASE_URL ?>reportes">Reportes</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
