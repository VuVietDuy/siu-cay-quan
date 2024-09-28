<?php
class Category {
    private $id;
    private $name;
    private $description;
    private $created_at;

    // function __construct( $name, $description) {
    //     $this->name = $name;
    //     $this->description = $description;
    // }

    function __construct( $id, $name, $description, $created_at) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->description = $description;
        $this->created_at = $created_at;
    }

    static public function create($name, $description) {
        global $conn;
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $name, $description);
        return $stmt->execute();
    }

    static public function find() {
        global $conn;
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        $categories = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $categories[] = new Category($row["id"], $row["name"], $row["description"], $row["created_at"]);
            }
        }
        return $categories;
    }

    static public function findByIdAndDelete($id) {
        global $conn;
        $sql = "DELETE FROM categories WHERE id =?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    } 

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function __toString() {
        return $this->name;
    }

}
?>