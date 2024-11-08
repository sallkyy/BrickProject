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
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        
         $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            header("Location: index.php?error=Пользователь с таким email уже существует.");
            exit();
        }

        // Проверка существования пользователя
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            header("Location: index.php?error=Пользователь с таким именем уже существует.");
            exit();
        } else {
            // Вставка нового пользователя
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $stmt->execute([$username, $password, $email]);
            header("Location: index.php?success=Вы успешно зарегистрировались!");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>