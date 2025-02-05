<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $task = trim(htmlspecialchars($_POST['task'] ?? ''));
        if (empty($task)) {
            echo "Error";
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO messages (message, created_at) VALUES (?, NOW())");

        if ($stmt) {
            $stmt->bindParam(1, $task);
            if ($stmt->execute()) {
                header("Location: ../public/index.php");
                exit;
            } else {
                echo "Error";
            }
        } else {
            echo "Error";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
