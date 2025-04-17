<?php
require_once '../models/Database.php';
require_once '../models/User.php';

class LoginController {
    private $db;
    private $loginModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->loginModel = new Book($this->db);
    }

    public function createBook() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);


            if ($this->loginModel->create($username, $password)) {
                header("Location: ../views/books/auth/login.php");
                exit();
            } else {
                echo "Chyba při přihlášení.";
            }
        }
    }
}

// Volání metody při odeslání formuláře
$controller = new BookController();
$controller->createBook();