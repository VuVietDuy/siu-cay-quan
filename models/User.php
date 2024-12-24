<?php
require 'config/mysql.php';

class User {
    private $id;
    private $name;
    private $username;
    private $password;
    private $role;
    private $created_at;
    private $updated_at;

    function __construct($name, $username, $password, $role) {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function setId($id) {
        $this->id = $id;
    }

    static public function findOne($username) {
        global $conn;
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $user = new User($user['name'], $user['username'], $user['password'], $user['role']);
        } else {
            $user = null;
        }

        $stmt->close();
        $conn->close();
        return $user;
    }

    static function findAll($role = null) {
        global $conn;
        $sql = "SELECT * FROM users";
        if ($role) {
            $role = $conn->real_escape_string($role);
            $sql .= " WHERE role = '$role'";
        }
        $result = $conn->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tmp = new User($row['name'], $row['username'], $row['password'], $row['role']);
                $tmp->setId($row['user_id']);
                $users[] = $tmp;
            }
        }
        $conn->close();
        return $users;
    }

    function save() {
        global $conn;
        $sql = "INSERT INTO users (name, username, password, role) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssss", $this->name, $this->username, $this->password, $this->role);
        return $stmt->execute();
    }

    public function findByIdAndUpdate() {
        global $conn;
        $sql = "UPDATE users SET name = ?, username = ?, password = ?, role = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("ssssi", $this->name, $this->username, $this->password, $this->role, $this->id);
        return $stmt->execute();
    }

    static public function findByIdAndDelete($id) {
        global $conn;
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("i", $id);
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

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }
}
?>