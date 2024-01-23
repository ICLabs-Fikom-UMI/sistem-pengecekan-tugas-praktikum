
<?php

class Login_model{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getUser($username, $password){
        $this->db->query("SELECT * FROM mst_user WHERE username = :username AND password = :password");
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);
        // $this->db->bind("role", $role);

        return $this->db->single(); 
    }  
}