<?php
require 'config/mysql.php';

class User {
    private $name;
    private $email;
    private $password;
    private $role;
    
    function __construct($name, $email, $password, $role) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    static public function findOne($email) {
        global $conn;
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $user = new User($user['name'], $user['email'], $user['password'], $user['role']);
        } else {
            $user = null;
        }

        $stmt->close();
        $conn->close();
        return $user;
    }

    static function findAll() {
        global $conn;
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $users[] = new User($row['name'], $row['email'], $row['password'], $row['role']);
            }
        }
        $conn->close();
        return $users;
    }

    function save() {
        global $conn;
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssss", $this->name, $this->email, $this->password, $this->role);
        return $stmt->execute();
    }

    public function verifyPassword($password) {
        return $password == $this->password;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }
}
?>