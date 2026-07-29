const API_KEY = "AIzaSyCBtyU3NIA3mMqZyUj1UkVraMvEXFSdi7"; // <--- Replace this

async function sendMessage() {
    const input = document.getElementById("chat-input");
    const userMessage = input.value.trim();
    if (!userMessage) return;

    // Display user message
    document.getElementById("chat-body").innerHTML += `
        <div class="user-msg">${userMessage}</div>
    `;
    input.value = "";
    scrollChat();

    try {
        const response = await fetch(
            "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=" + API_KEY,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    contents: [
                        {
                            parts: [{ text: userMessage }]
                        }
                    ]
                })
            }
        );

        const data = await response.json();

        // Extract bot reply safely
        const botReply = data.candidates?.[0]?.content?.parts?.[0]?.text || "⚠️ No reply received.";

        document.getElementById("chat-body").innerHTML += `
            <div class="bot-msg">${botReply}</div>
        `;

        scrollChat();

    } catch (err) {
        document.getElementById("chat-body").innerHTML += `
            <div class="bot-msg">⚠️ Error: ${err.message}</div>
        `;
        scrollChat();
    }
}

// Enter key support
document.getElementById("chat-input").addEventListener("keypress", function(e){
    if(e.key === "Enter") sendMessage();
});

function scrollChat(){
    const chatBody = document.getElementById("chat-body");
    chatBody.scrollTop = chatBody.scrollHeight;
}
