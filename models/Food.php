<?php
class Food {
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $category;
    private $created_at;

    function __construct($name, $description, $price, $category) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        // $this->image = $image;
        $this->category = $category;
    }

    public function save() {
        global $conn;
        $sql = "INSERT INTO foods (name, description, price, image, category_id) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssdii", $this->name, $this->description, $this->price, $this->image, $this->category);
        return $stmt->execute();
    }

    public function update() {
        global $conn;
        $sql = "UPDATE foods SET name=?, description=?, price=?, image=?, category_id=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssdiii", $this->name, $this->description, $this->price, $this->image, $this->category, $this->id);
        return $stmt->execute();
    }

    public function delete() {
        global $conn;
        $sql = "DELETE FROM foods WHERE id=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }

    static public function findAll() {
        global $conn;
        $sql = "SELECT * FROM foods";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $foods = [];
            while($row = $result->fetch_assoc()) {
                $food = new Food($row["name"], $row["description"], $row["price"], $row["category_id"]);
                $food->id = $row["id"];
                $food->image = $row["image"];
                $food->created_at = $row["created_at"];
                $foods[] = $food;
            }
            return $foods;
        } else {
            return [];
        }
    }

}
?>