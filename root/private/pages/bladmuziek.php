<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/private/models/sheet.php";

$sheetModel = new SheetModel();
$sheets = $sheetModel->getAll();

if(!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}
if(!isset($_SESSION["cart"]["sheets"])) {
	$_SESSION["cart"]["sheets"] = array(); 	
} 

if(isset($_POST["sheet"])) {
	if(!in_array($_POST["sheet"], $_SESSION["cart"]["sheets"])) {
		array_push($_SESSION["cart"]["sheets"], $_POST["sheet"]);
	} else {
		$_SESSION["cart"]["sheets"] = array_filter($_SESSION["cart"]["sheets"], function($sheetId) {
			return $sheetId !== $_POST["sheet"];
		});
	}
}
?>
<head>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/private/components/head_common.php"; ?>
	<link rel="stylesheet" type="text/css" href="/assets/styles/pianos.css">
	<title>Bladmuziek - Muziekwinkel Opentij en de Vries</title>
</head>
<body>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/private/components/navbar.php";
	
	foreach($sheets as $sheet) {
	?>
		<form method="post" class="card">
			<input type="hidden" name="sheet" value="<?= $sheet["id"] ?>">
			<img src="/assets/images/<?= $sheet["image"] ?>">
			<h1><?= $sheet["name"] ?></h1>
			<p class="price">€<?= $sheet["price"] ?></p>
			<p><?= $sheet["description"] ?></p>
			<?php if(!in_array($sheet["id"], $_SESSION["cart"]["sheets"])) { ?>
				<p><button>Toevoegen aan winkelwagen</button></p>
			<?php } else { ?>
				<p><button>Verwijderen uit winkelwagen</button></p>
			<?php } ?>
		</form>
	<?php
	}
	?>
</body>