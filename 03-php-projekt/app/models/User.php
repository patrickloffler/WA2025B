<?php

class Book {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($username, $email, $name, $surname, $password, $auth) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO books (nickname, email, name, surname, password, auth) 
                VALUES (:nickname, :email, :name, :surname, :password, :auth)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':name' => $name,
            ':surname' => $surname,
            ':password' => $password,
            ':auth' => $auth,
        ]);
    }
}