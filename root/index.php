<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">

<?php
$pagesDir = $_SERVER['DOCUMENT_ROOT']. "/private/pages";

if(empty($_GET["page"])) {
    if(file_exists($pagePath = $pagesDir . "/index.php")) {
        include $pagePath;
    } else {
        die("404: Could not find index");
    }
} else if(file_exists($pagePath = $pagesDir . "/" . $_GET["page"] . (array_key_exists("extension", $pathInfo = pathinfo($_GET["page"])) ? $pathInfo["extension"] : ".php"))) {
    include $pagePath;
} else {
    die("404");
}
?>

</html>