<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>

		.menu-bar {
		 	position: sticky; 
			height: 100%;
			width: 100%;
			list-style-type: none;
			margin: 0;
			padding: 0;
			background: #f7f7f7;
			z-index: 10;
			box-shadow: 2px 0 18px rgba(0, 0, 0, 0.26);
		}

		

		.menu li a:before {
			font-family: FontAwesome;
			speak: none;
			text-indent: 0em;
			width: 100%;
			height: 100%;
			font-size: 1.4em;
		}

		

		.menu-bar li a:hover,
		.menu li a:hover,
		.menu li:first-child a {
			background: #267fdd;
			color: #fff;
		}


		.menu-bar li a {
			display: block;
			height: 4em;
			width: 100%;
			line-height: 4em;
			text-align: center;
			color: #72739f;
			text-decoration: none;
			/* position: relative; */
			font-family: verdana;
			border-bottom: 1px solid rgba(0, 0, 0, 0.05);
			transition: background 0.1s ease-in-out;
		}

		.menu-bar li:first-child a {
			height: 5em;
			background: #267fdd;
			color: #fff;
			line-height: 5
		}

		.menu-bar li:last-child a {
			height: 5em;
			color: #F5265F;
			line-height: 5
		}

		.menu-bar li:last-child a:hover{
			
			color: #fff;
		}


		.para {
			color: #033f72;
			padding-left: 100px;
			font-size: 3em;
			margin-bottom: 20px;
		}


	</style>
</head>

<body>
	<nav>
		
		<ul class="menu-bar">
			<li><a href="#" class="menu-button">Menu</a></li>
			<?php
			if ($_SESSION['user_type'] == 'Administrateur') { ?>
				<li><a href="index.php?page=filiere">Créer une filiere</a>
				<li><a href="index.php?page=etudiant">Ajouter un étudiant</a>
				<li><a href="index.php?page=paiement">Effectuer un paiement</a>
				<li><a href="index.php?page=cours">Ajouter un cours</a>
				<li><a href="index.php?page=inscription">Inscription</a>
				<?php ;
			} else if ($_SESSION['user_type'] == 'Sécrétaire') { ?>
				<li><a href="index.php?page=filiere">Créer une filiere</a>
				<li><a href="index.php?page=etudiant">Ajouter un étudiant</a>
				<?php ;
			} else if ($_SESSION['user_type'] == 'Econome'){ ?>
				<li><a href="index.php?page=paiement">Effectuer un paiement</a>
				<?php ;
			} ?>
				<li><a href="/esagapp/affichage/listes.php?page=listes" >Enregistrements</a>
				<li><a href="/esagapp/form-inscription/landing.php" >Mon compte</a>
				<li><a href="/esagapp/form-inscription/deconnexion.php" >Déconnexion</a></li>
		</ul>
	</nav>
	<script src="/esagapp/scripts/jquery.js"></script>
	
</body>

</html>