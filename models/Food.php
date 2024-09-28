<?php
class Food {
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $category;
    private $created_at;

    function __construct($id, $name, $description, $price, $image, $category, $created_at) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
        $this->created_at = $created_at;
    }

    static public function create($name, $description, $price, $image, $category) {
        global $conn;
        $sql = "INSERT INTO foods (name, description, price, image, category_id) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssdsi", $name, $description, $price, $image, $category);
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
                $food = new Food($row["id"], $row["name"], $row["description"], $row["price"], $row["image"], $row["category_id"], $row["created_at"]);
                $foods[] = $food;
            }
            return $foods;
        } else {
            return [];
        }
    }

    static function findById($id) {
        global $conn; 
        $sql = "SELECT * FROM foods WHERE id=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
    
        $stmt->bind_param("i", $id);
        $stmt->execute(); 
    
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $foods = [];
    
            while ($row = $result->fetch_assoc()) {
                $food = new Food($row["id"], $row["name"], $row["description"], $row["price"], $row["image"], $row["category_id"], $row["created_at"]);
                $food->id = $row["id"];
                $food->image = $row["image"];
                $food->created_at = $row["created_at"];
    
                $foods[] = $food;
            }
    
            return $foods[0];
        } else {
            return null; 
        }
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getImage() {
        return $this->image;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

}
?>