<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacked Page - MediCare</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #000;
            color: #0F0;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        h1 {
            font-size: 2em;
            margin: 0;
            padding: 0;
            color: #FF0000;
            text-shadow: 0 0 5px #FF0000, 0 0 10px #FF0000;
        }
        p {
            font-size: 1.2em;
            color: #0F0;
            text-shadow: 0 0 3px #0F0, 0 0 7px #0F0;
        }
        .code {
            font-size: 1em;
            color: #0F0;
            background-color: #000;
            border: 1px solid #0F0;
            padding: 10px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 0 5px #0F0;
            overflow: auto;
        }
        .blinking-cursor {
            display: inline;
            border-right: 2px solid #0F0;
            animation: blink 1s step-end infinite;
        }
        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }
        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: #0F0;
        }
        .button {
            background-color: #FF0000;
            color: #0F0;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 20px;
            text-shadow: 0 0 3px #0F0, 0 0 7px #0F0;
        }
        .button:hover {
            background-color: #FF5722;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>WARNING: SYSTEM COMPROMISED</h1>
        <p>Unauthorized access detected!</p>
        <div class="code">
            <p>System Log:</p>
            <pre>*** HACK ATTEMPT DETECTED ***
User: <span class="blinking-cursor"></span>
Time: <span class="blinking-cursor"></span>
Actions: <span class="blinking-cursor"></span>
*** SYSTEM REBOOTING ***</pre>
        </div>
        <button class="button" onclick="window.location.href='login.php'">Return to Login</button>
    </div>
    <div class="footer">
        <p>Powered by <a href="https://www.instagram.com/safaap0/" style="color: #0F0;" target="_blank">Safaa Systems</a></p>
    </div>
</body>
</html>
