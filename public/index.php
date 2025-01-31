<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">To Do list</div>
        <div class="chat-messages" id="chat-messages">

            <?php
                require_once("../config/config.php");
                $query = $pdo->query("SELECT * FROM `messages` ORDER BY `id` ASC");
                while($fetch = $query->fetch()) {
            ?>
            <div class="message">
                <span><?php echo htmlspecialchars($fetch['message']); ?></span>
                <button class="delete-button"><a href="../queries_SQL/delete_query.php?task_id=<?php echo $fetch['id']?>" style="color: white; text-decoration: none;">&times;</a></button>
            </div>
            <?php } ?>
        </div>
        <form method="POST" action="../queries_SQL/add_query.php" class="chat-input">
            <input type="text" placeholder="Add a new message..." name="task" required />
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
