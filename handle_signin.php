<?php
require "AutoLoader.php";
require "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $sql = "SELECT id, email, password FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome " . htmlspecialchars($user['email']);
            session_start();
            $_SESSION['user_id'] = $user['id'];
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }
}
