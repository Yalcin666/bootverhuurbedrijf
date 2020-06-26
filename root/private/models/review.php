<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/private/lib/model.php";

final class ReviewModel extends Model {

    public final function collection() {
        return "reviews";
    }

}