<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Referências</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
			.nav-item{
				font-size: 1.2em;
				text-transform: uppercase;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">  
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php" class="nav-link">
						Home
					</a>
				</li>				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Cadastrar
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					  <a class="dropdown-item" href="?page=cadastrar-categoria">Categoria</a>
					  <a class="dropdown-item" href="?page=cadastrar-autor">Autor</a>
					  <a class="dropdown-item" href="?page=cadastrar-livro">Livro</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Editar
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					  <a class="dropdown-item" href="?page=editar-categoria">Categoria</a>
					  <a class="dropdown-item" href="?page=editar-autor">Autor</a>
					  <a class="dropdown-item" href="?page=editar-livro">Livro</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php		
						include("config.php");
						switch(@$_REQUEST["page"]){
							case "cadastrar-categoria":
								include("cadastrar-categoria.php");
							break;
							case "cadastrar-autor":
								include("cadastrar-autor.php");
							break;
							case "cadastrar-livro":
								include("cadastrar-livro.php");
							break;
							
							case "editar-categoria":
								include("editar-categoria.php");
							break;
							case "editar-autor":
								include("editar-autor.php");
							break;
							case "editar-livro":
								include("editar-livro.php");
							break;
							
							case "form-editar-categoria":
								include("form-editar-categoria.php");
							break;
							case "form-editar-autor":
								include("form-editar-autor.php");
							break;
							case "form-editar-livro":
								include("form-editar-livro.php");
							break;
							
							case "salvar-cadastro":
								include("salvar-cadastro.php");
							break;
							case "salvar-editar":
								include("salvar-editar.php");
							break;
							default:
								include("home.php");
						}
					?>
				</div>
			</div>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>









