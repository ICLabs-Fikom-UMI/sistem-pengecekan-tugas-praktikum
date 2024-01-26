
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

// class Login_model {
//     private $db;

//     public function __construct() {
//         $this->db = new Database;
//     }

//     public function getUserByUsername($username) {
//         $this->db->query("SELECT * FROM mst_user WHERE username = :username");
//         $this->db->bind(":username", $username);
//         // $this->db->bind(":password", $password);
//         return $this->db->single();
//     }
// }

class Login_model {
    private $table = 'mst_user';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getRole($username) {
        $query = 'SELECT role FROM ' . $this->table . ' WHERE username = :username';
        
        $this->db->query($query);
        $this->db->bind('username', $username);
        
        return $this->db->single();
    }

    public function isDefaultPassword($password) {
        $defaultPasswords = ['administrator', 'asisten', 'praktikan'];
        
        return in_array($password, $defaultPasswords);
    }

    public function validateLogin($username, $password) {
        $query = 'SELECT id_user, password FROM mst_user WHERE username = :username and password = :password';

        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);

        $result = $this->db->single();

        if ($result) {
            return $result['id_user'];
        }
        else {
            return false;
        }
    }

}