<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=chat_app;port=3306;charset=utf8', 'root', '4289', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $pdo->query("SELECT * FROM `messages`");
    $messages = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Errore: " . $e->getMessage();
}
?>
