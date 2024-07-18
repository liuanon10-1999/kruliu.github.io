<?php
$db = new PDO('sqlite:database.sqlite');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    
    if ($stmt->execute()) {
        echo 'User registered successfully';
    } else {
        echo 'Error registering user';
    }
}
?>
