document
  .getElementById("sendMessageBtn")
  .addEventListener("click", function () {
    var message = document.getElementById("messageInput").value;
    var receiverId = document.getElementById("receiver_id").value;

    if (message.trim() === "") {
      alert("Please enter a message.");
      return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "send_message.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (this.status === 200) {
        loadMessages(receiverId);
        document.getElementById("messageInput").value = ""; // Clear the input field after sending
      } else {
        alert("Error sending message.");
      }
    };

    xhr.send("message=" + message + "&receiver_id=" + receiverId);
  });

function loadMessages(receiverId) {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_messages.php?receiver_id=" + receiverId, true);

  xhr.onload = function () {
    if (this.status === 200) {
      document.getElementById("chat-box").innerHTML = this.responseText;
      document.getElementById("chat-box").scrollTop =
        document.getElementById("chat-box").scrollHeight;
    }
  };

  xhr.send();
}

// Refresh messages every 3 seconds
setInterval(function () {
  var receiverId = document.getElementById("receiver_id").value;
  loadMessages(receiverId);
}, 3000);
