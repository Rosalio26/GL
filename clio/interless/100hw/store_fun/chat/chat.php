<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    $friend_id = isset($_GET['friend_id']) ? (int)$_GET['friend_id'] : 0;
?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Janela de Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .chat-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .chat-header {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }
        .chat-messages {
            height: 400px;
            overflow-y: scroll;
            padding: 10px;
        }
        .chat-messages div {
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            max-width: 70%;
        }
        .message-sent {
            background-color: #e1ffc7;
            margin-left: auto;
            text-align: right;
        }
        .message-received {
            background-color: #f1f0f0;
            margin-right: auto;
        }
        .chat-input {
            display: flex;
            border-top: 1px solid #ccc;
            padding: 10px;
        }
        .chat-input textarea {
            flex: 1;
            resize: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            height: 50px;
        }
        .chat-input button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <!-- <div class="chat-header">
            <h2>Chat</h2>
        </div> -->
        <div class="chat-messages" id="chatMessages"></div>
        <div class="chat-input">
            <textarea id="messageText" placeholder="Digite sua mensagem..."></textarea>
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </div>

    <script>
        const friend_id = <?php echo $friend_id; ?>

        function sendMessage() {
            const messageText = document.getElementById('messageText').value;
            const receiverId = friend_id;
            if (messageText.trim() === '') return;

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "send_message.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('messageText').value = '';
                    fetchMessages();
                }
            }
            xhr.send(`receiver_id=${receiverId}&message_text=${messageText}`);
        }

        function fetchMessages() {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `get_message.php?friend_id=${friend_id}`, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    try {
                        const messages = JSON.parse(xhr.responseText);
                        const chatMessages = document.getElementById('chatMessages');
                        chatMessages.innerHTML = '';

                        messages.forEach(msg => {
                            const div = document.createElement('div');
                            div.className = msg.from_user_id == friend_id ? 'message-received' : 'message-sent';
                            div.textContent = msg.message_text;
                            chatMessages.appendChild(div);
                        });

                        // Rolar para a última mensagem
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    } catch (e) {
                        console.error("Erro ao processar resposta JSON:", e);
                    }
                }
            }
            xhr.send();
        }

        setInterval(fetchMessages, 5000); // Buscar mensagens a cada 5 segundos
        fetchMessages(); // Buscar mensagens ao carregar a página
    </script>
</body>
</html>
