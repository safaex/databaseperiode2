<?php
class Database{
    public $pdo;
 
    public function __construct($db = "test", $user ="root", $pwd="", $host="localhost:3308") {
 
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully $db";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
       
        }
       
 
        public function insertUser($email, $password){
           $stmt = $this->pdo->prepare("insert into user(email, password) values (?, ?)");
           $password = password_hash($password, PASSWORD_DEFAULT);
           $stmt->execute([$email, $password]);
        }
   
        public function selectUser(){
            $stmt = $this->pdo->query("SELECT * FROM user");
            $resultaat = $stmt->fetchAll();
            return $resultaat;
        }
 
        public function selectOneUser($id){
            $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
            $stmt->execute([$id]);
            $resultaat = $stmt->fetch();
            return $resultaat;
        }

        public function editUser(string $email, String $password, int $id){
          $stmt = $this->pdo->prepare("UPDATE user SET email = ?, password = ? WHERE id = ?");
          $stmt->execute([$email, $password, $id]);
        }
 
        public function deleteUser(int $id){
          $stmt = $this->pdo->prepare("DELETE  from user  WHERE id = ?");
          $stmt->execute([$id]);
        }

        public function aanmelden($naam, $achternaam, $geboortedatum, $email, $password) {
          $stmt = $this->pdo->prepare("INSERT INTO users (naam,achternaam,geboortedatum,email,wachtwoord) values (?,?,?,?,?)");
          $stmt->execute([$naam, $achternaam, $geboortedatum, $email, $password]);
      }
      
    }
 
 
 
 
 
                                         
 
?>