<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chatbot</title>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"
    />
  </head>
  <body>
    
    <div class="container">
      <button class="chatbot-toggler">
        <span class="material-symbols-rounded">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
      </button>
      <div class="chatbot">
        <header>
          <h2>Chatbot</h2>
          <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
          <li class="chat incoming">
            <span class="material-symbols-outlined">smart_toy</span>
            <p>Hello &#128079; <br />How can I assist you today?</p>
          </li>
        </ul>

        <div class="chat-input">
          <textarea
            placeholder="Send a Message"
            spellcheck="false"
            required
          ></textarea>
          <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
      </div>
    </div>
  </body>
</html>


