<!DOCTYPE html>
<html>
<head>
    <title>PHP AI Chatbot (Free API)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="chat-container">
    <h2>AI Chatbot (Free API)</h2>

    <div id="chat-box"></div>

    <form id="chat-form">
        <input type="text" id="question" placeholder="Ask something..." required>
        <button type="submit" id="send-btn">
            <span class="btn-text">Send</span>
            <span class="loader" style="display: none;"></span>
        </button>
    </form>
</div>

<script>
document.getElementById("chat-form").addEventListener("submit", function(e) {
    e.preventDefault();

    let question = document.getElementById("question").value;
    let sendBtn = document.getElementById("send-btn");
    let btnText = sendBtn.querySelector(".btn-text");
    let loader = sendBtn.querySelector(".loader");

    // Show loader
    btnText.style.display = "none";
    loader.style.display = "inline-block";
    sendBtn.disabled = true;

    // Add user message immediately
    document.getElementById("chat-box").innerHTML +=
        "<div class='message user-message'>" +
        "<div class='message-content'>" + question + "</div>" +
        "</div>";

    // Scroll to bottom
    let chatBox = document.getElementById("chat-box");
    chatBox.scrollTop = chatBox.scrollHeight;

    fetch("chat.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "question=" + encodeURIComponent(question)
    })
    .then(res => res.text())
    .then(data => {
        // Add AI message
        document.getElementById("chat-box").innerHTML +=
            "<div class='message ai-message'>" +
            "<div class='message-content'>" + data + "</div>" +
            "</div>";

        document.getElementById("question").value = "";
        
        // Scroll to bottom
        chatBox.scrollTop = chatBox.scrollHeight;
        
        // Hide loader
        btnText.style.display = "inline";
        loader.style.display = "none";
        sendBtn.disabled = false;
    })
    .catch(error => {
        console.error("Error:", error);
        // Hide loader on error
        btnText.style.display = "inline";
        loader.style.display = "none";
        sendBtn.disabled = false;
    });
});
</script>

</body>
</html>