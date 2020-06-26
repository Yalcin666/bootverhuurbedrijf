<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/private/models/piano.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/private/models/sheet.php";

$sheetModel = new SheetModel();
$pianoModel = new PianoModel();

if(!isset($_GET["success"])) {
?>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/private/components/head_common.php"; ?>
        <link rel="stylesheet" type="text/css" href="/assets/styles/bestellen.css">
        <title>Bestellen - Muziekwinkel Opentij en de Vries</title>
    </head>
    <body>
        <table style="width:100%;background-color:#fff;text-align:left">
            <tr>
                <th colspan="2">Naam</th>
                <th>Prijs</th>
            </tr>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/private/components/navbar.php";

            $total = 0;
            foreach($_SESSION["cart"] as $categoryId => $catItems) {
                $items = array();
                foreach($catItems as $catItem) {
                    if($categoryId === "pianos") {
                        array_push($items, $pianoModel->getById($catItem));
                    } else if ($categoryId === "sheets") {
                        array_push($items, $sheetModel->getById($catItem));
                    }
                }
                foreach($items as $item) {
                    $total = $total + $item["price"];
            ?>
                    <tr>
                        <td colspan="2"><?= $item["name"] ?></td>
                        <td>€<?= $item["price"] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
            <tr>
                <th colspan="2">Totaal:</th>
                <th>€<?= $total ?></th>
            </tr>
        </table>
        <a href="/bestellen?success=true" style="display:block;width:100%;text-align:center;margin-top:25px">
            <button style="display:inline-block;padding:10px 25px;background-color:#fff;border:2px solid #000;font-size:48px">Bestellen</button>
        </a>
    </body>
<?php
} else {
?>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/private/components/head_common.php"; ?>
        <link rel="stylesheet" type="text/css" href="/assets/styles/bestellen.css">
        <title>Gefeliciteerd! - Muziekwinkel Opentij en de Vries</title>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/private/components/navbar.php"; ?>
        <div style="background-color:#fff;position:absolute;top:300px;padding:25px;margin:0 auto;display:inline-block">
            <h1 style="font-family:Brush Script MT, sans-serif;">Gefeliciteerd!! Uw bestelling is geplaats! Deze zal binnen 2 weken bezorgd worden. :-)</h1>
        </div>
    </body>
<?php
}