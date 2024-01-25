
<?php

// class Login_model{
//     private $db;
//     public function __construct(){
//         $this->db = new Database;
//     }
//     public function getUser($username, $password){
//         $this->db->query("SELECT * FROM mst_user WHERE username = :username AND password = :password");
//         $this->db->bind(":username", $username);
//         $this->db->bind(":password", $password);
//         return $this->db->single(); // Menggunakan metode single() untuk mendapatkan satu baris hasil
//     }
    
// }

class Login_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserByUsername($username) {
        $this->db->query("SELECT * FROM mst_user WHERE username = :username");
        $this->db->bind(":username", $username);
        // $this->db->bind(":password", $password);
        return $this->db->single();
    }
}

