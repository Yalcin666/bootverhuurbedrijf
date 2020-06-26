<?php
abstract class Model {

    private $pdo;

    public final function __construct() {
        $this->pdo = new PDO("sqlite:" . $_SERVER["DOCUMENT_ROOT"] . "/private/data/data");
    }

    public abstract function collection();

    public final function getAll() {
        return $this->pdo->query("SELECT * FROM " . $this->collection())->fetchAll();
    }

    public final function getById($id) {
        return $this->pdo->query("SELECT * FROM " . $this->collection() . " where id = " . $id)->fetch();
    }

}