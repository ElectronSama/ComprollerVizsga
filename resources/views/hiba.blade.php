<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiba!</title>
    <style>
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #a7c7e7, #c9e1f1); /* Lágy színátmenet háttér */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 450px;
            animation: fadeIn 1s ease-out;
        }
        h1 {
            color: #097ff5; /* Élénk piros szín a főcímhez */
            font-size: 3em;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }
        p {
            color: #555;
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #097ff5;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-size: 1.1em;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .button:hover {
            background-color: #097ff5;
            transform: scale(1.1);
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<div class="container">
    <h1>Hiba történt!</h1>
    <div class="div">
        <p>A kért oldal nem található, kérjük próbáld újra később.</p>
        <p> (◕‿◕) </p> 
    </div>
</div>
</html>
