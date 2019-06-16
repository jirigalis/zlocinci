<?php
abstract class Mapper {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
        $sql = "SET NAMES 'UTF8'";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}