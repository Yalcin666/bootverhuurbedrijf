<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/private/models/piano.php";

$pianoModel = new PianoModel();
$pianos = $pianoModel->getAll();

if(!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}
if(!isset($_SESSION["cart"]["pianos"])) {
	$_SESSION["cart"]["pianos"] = array(); 	
} 

if(isset($_POST["piano"])) {
	if(!in_array($_POST["piano"], $_SESSION["cart"]["pianos"])) {
		array_push($_SESSION["cart"]["pianos"], $_POST["piano"]);
	} else {
		$_SESSION["cart"]["pianos"] = array_filter($_SESSION["cart"]["pianos"], function($pianoId) {
			return $pianoId !== $_POST["piano"];
		});
	}
}
?>
<head>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/private/components/head_common.php"; ?>
	<link rel="stylesheet" type="text/css" href="/assets/styles/pianos.css">
	<title>Piano's - Muziekwinkel Opentij en de Vries</title>
</head> 
<body>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/private/components/navbar.php";

	foreach($pianos as $piano) {
	?>
		<form method="post" class="card">
			<input type="hidden" name="piano" value="<?= $piano["id"] ?>">
			<img src="/assets/images/<?= $piano["image"]?>">
			<h1><?= $piano["name"]?></h1>
			<p class="price">€<?= $piano["price"]?></p>
			<p><?= $piano["description"]?></p>
			<?php if(!in_array($piano["id"], $_SESSION["cart"]["pianos"])) { ?>
				<p><button>Toevoegen aan winkelwagen</button></p>
			<?php } else { ?>
				<p><button>Verwijderen uit winkelwagen</button></p>
			<?php
			}	
			?>
		</form>
	<?php
	}
	?>
</body>