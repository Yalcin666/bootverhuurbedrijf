<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/private/models/review.php";

$reviewModel = new ReviewModel();
$reviews = $reviewModel->getAll();
?>
<head>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/private/components/head_common.php"; ?>
	<link rel="stylesheet" type="text/css" href="/assets/styles/recensies.css">
	<title>Recensies - Muziekwinkel Opentij en de Vries</title>
</head>
<body>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/private/components/navbar.php";

	foreach($reviews as $review) {
	?>
		<div class="card">
			<h1><?= $review["name"]?></h1>
			<p><?= $review["review"]?></p>
		</div>
	<?php
	}
	?>
</body>