<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/private/lib/model.php";

final class SheetModel extends Model {

    public final function collection() {
        return "sheets";
    }

}