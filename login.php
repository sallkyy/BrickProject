<?php
session_start(); 


$host = 'localhost';
$db = 'o92675ey_1'; 
$user = 'o92675ey_1'; 
$pass = 'psSQFcsoefgO+'; 


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Поиск пользователя по имени
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
           header("Location: index.php?auth=Успешный вход! Добро пожаловать.");
        } else {
            header("Location: index.php?errorAuth=Неверное имя пользователя или пароль.");
        }
    }
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>