<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class register {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new Book($this->db);
    }

    public function createBook() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);
            $password = htmlspecialchars($_POST['password']);
            $auth = htmlspecialchars($_POST['auth']);

            if ($this->userModel->create($username, $email, $name, $surname, $password, $auth)) {
                header("Location: ../views/books/auth/register.php");
                exit();
            } else {
                echo "Chyba při registraci.";
            }
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new register();
$controller->createBook();