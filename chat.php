<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Communication Portal</title>
    <link rel="stylesheet" href="css/chat.css">
</head>
<body>

<div class="chat-container">
    <div class="chat-header">
        <h2>PG Communication Portal</h2>
    </div>
    <div class="chat-box" id="chat-box">
        <!-- Messages will be dynamically added here -->
    </div>
    <div class="chat-input">
        <textarea id="message" placeholder="Type your message..."></textarea>
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script src="js/chat.js"></script>

</body>
</html>
