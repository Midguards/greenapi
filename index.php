<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GREEN-API by V.S</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        /* Header and Logo styles */
        .header {
            text-align: center;
            margin-bottom: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .pixel-logo {
            display: inline-block;
            margin-bottom: 10px;
        }

        .pixel-row {
            height: 10px;
            display: flex;
            justify-content: center;
        }

        .pixel {
            width: 10px;
            height: 10px;
            display: inline-block;
        }

        .green {
            background-color: #00a884;
        }

        .white {
            background-color: transparent;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #00a884;
            margin-top: 10px;
        }

        /* Main container styles */
        .container {
            display: flex;
            gap: 20px;
        }

        .left-panel {
            flex: 1;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .right-panel {
            flex: 1;
        }

        .input-group {
            margin-bottom: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            cursor: pointer;
            background-color: #00a884;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #008f6f;
        }

        #response {
            width: 100%;
            height: 600px;
            resize: none;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            background-color: white;
            font-family: monospace;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="pixel-logo">
            <div class="pixel-row">
                <div class="pixel white"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel white"></div>
            </div>
            <div class="pixel-row">
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
            </div>
            <div class="pixel-row">
                <div class="pixel green"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel green"></div>
            </div>
            <div class="pixel-row">
                <div class="pixel green"></div>
                <div class="pixel white"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel white"></div>
                <div class="pixel green"></div>
            </div>
            <div class="pixel-row">
                <div class="pixel green"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel green"></div>
            </div>
            <div class="pixel-row">
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel white"></div>
                <div class="pixel white"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
            </div>
            <div class="pixel-row">
                <div class="pixel white"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel green"></div>
                <div class="pixel white"></div>
            </div>
        </div>
        <div class="company-name">GREEN API</div>
    </div>

    <div class="container">
        <div class="left-panel">
            <div class="input-group">
                <input type="text" id="idInstance" placeholder="IdInstance">
            </div>
            <div class="input-group">
                <input type="text" id="apiTokenInstance" placeholder="ApiTokenInstance">
            </div>
            
            <button onclick="getSettings()">getSettings</button>
            <button onclick="getStateInstance()">getStateInstance</button>
            
            <div class="input-group">
                <input type="text" id="phoneNumber" placeholder="7777234567">
                <textarea id="message" placeholder="Hello World!" rows="3"></textarea>
                <button onclick="sendMessage()">sendMessage</button>
            </div>
            
            <div class="input-group">
                <input type="text" id="phoneNumberFile" placeholder="7777234567">
                <input type="text" id="fileUrl" placeholder="https://my-site.com/img/horse.png">
                <button onclick="sendFileByUrl()">sendFileByUrl</button>
            </div>
        </div>
        
        <div class="right-panel">
            <textarea id="response" readonly placeholder="Response will appear here..."></textarea>
        </div>
    </div>

    <script>
        const BASE_URL = 'https://api.green-api.com';

        async function makeRequest(endpoint, method = 'GET', body = null) {
            const idInstance = document.getElementById('idInstance').value;
            const apiTokenInstance = document.getElementById('apiTokenInstance').value;
            
            try {
                const url = `${BASE_URL}/waInstance${idInstance}/${endpoint}/${apiTokenInstance}`;
                const options = {
                    method,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                };
                
                if (body) {
                    options.body = JSON.stringify(body);
                }
                
                const response = await fetch(url, options);
                const data = await response.json();
                document.getElementById('response').value = JSON.stringify(data, null, 2);
                return data;
            } catch (error) {
                document.getElementById('response').value = `Error: ${error.message}`;
            }
        }

        async function getSettings() {
            await makeRequest('getSettings');
        }

        async function getStateInstance() {
            await makeRequest('getStateInstance');
        }

        async function sendMessage() {
            const phoneNumber = document.getElementById('phoneNumber').value;
            const message = document.getElementById('message').value;
            
            const body = {
                chatId: `${phoneNumber}@c.us`,
                message: message
            };
            
            await makeRequest('sendMessage', 'POST', body);
        }

        async function sendFileByUrl() {
            const phoneNumber = document.getElementById('phoneNumberFile').value;
            const fileUrl = document.getElementById('fileUrl').value;
            
            const body = {
                chatId: `${phoneNumber}@c.us`,
                urlFile: fileUrl,
                fileName: 'file' + Date.now()
            };
            
            await makeRequest('sendFileByUrl', 'POST', body);
        }
    </script>
</body>
</html>
