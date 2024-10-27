<?php
require 'config/mysql.php';

class Table {
    public $table_id;
    public $capacity;
    public $qr;
    public $status;
    public $is_active;
    public $created_at;
    public $updated_at;

    // Getters
    public function getTableId() {
        return $this->table_id;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getQr() {
        return $this->qr;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    // Setters
    public function setTableNumber($table_number) {
        $this->table_number = $table_number;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function setQr($qr) {
        $this->qr = $qr;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    function __construct($table_id, $capacity, $qr, $status, $is_active) {
        $this->table_id = $table_id;
        $this->capacity = $capacity;
        $this->qr = $qr;
        $this->status = $status;
        $this->is_active = $is_active;
    }

    static function findAll() {
        global $conn;
        $sql = "SELECT * FROM tables";
        $result = $conn->query($sql);
        $tables = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $table = new Table($row['table_id'], $row['capacity'], $row['qr'], $row['status'], $row['is_active']);
                $table->setCreatedAt($row['created_at']);
                $tables[] = $table;
            }
        }

        $conn->close();
        return $tables;
    }

    function save() {
        global $conn;
        $sql = "INSERT INTO tables (table_id, capacity, qr, status, is_active) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssssi", $this->table_id, $this->capacity, $this->qr, $this->status, $this->is_active);
        return $stmt->execute();
    }

}
?>