<?php
class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userData) {
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password) 
             VALUES (:name, :email, :password)"
        );
        
        $hashedPassword = password_hash($userData['password'], PASSWORD_ARGON2ID);
        
        $stmt->bindParam(':name', $userData['name']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':password', $hashedPassword);
        
        return $stmt->execute();
    }
}
?>