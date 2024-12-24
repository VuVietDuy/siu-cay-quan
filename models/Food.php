<?php
class Food {
    private $id;
    private $name;
    private $description;
    private $price;
    private $image_url;
    private $category;
    private $created_at;

    function __construct($id, $name, $description, $price, $image_url, $category, $created_at = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image_url = $image_url;
        $this->category = $category;
        $this->created_at = $created_at;
    }

    static public function create($name, $description, $price, $image_url, $category) {
        global $conn;
        $sql = "INSERT INTO foods (name, description, price, image_url, category_id) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssdsi", $name, $description, $price, $image_url, $category);
        return $stmt->execute();
    }

    public function findByIdAndUpdate() {
        global $conn;
        $sql = "UPDATE foods SET name=?, description=?, price=?, image_url=? WHERE food_id=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssdsi", $this->name, $this->description, $this->price, $this->image_url, $this->id);
        return $stmt->execute();
    }

    static public function deleteById($id) {
        global $conn;
        $sql = "DELETE FROM foods WHERE food_id=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    static public function findAll() {
        global $conn;
        $sql = "SELECT * FROM foods ORDER BY created_at DESC LIMIT 10";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $foods = [];
            while($row = $result->fetch_assoc()) {
                $food = new Food($row["food_id"], $row["name"], $row["description"], $row["price"], $row["image_url"], $row["category_id"], $row["created_at"]);
                $foods[] = $food;
            }
            return $foods;
        } else {
            return [];
        }
    }

    static function findById($id) {
        global $conn; 
        $sql = "SELECT * FROM foods WHERE food_id = ?";
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
                $food = new Food($row["food_id"], $row["name"], $row["description"], $row["price"], $row["image_url"], $row["category_id"], $row["created_at"]);
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

    public function getImageUrl() {
        return $this->image_url;
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

    public function setImageUrl($image_url) {
        $this->image_url = $image_url;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

}
?>