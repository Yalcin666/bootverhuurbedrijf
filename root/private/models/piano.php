<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/private/lib/model.php";

final class PianoModel extends Model {

    public final function collection() {
        return "pianos";
    }

}