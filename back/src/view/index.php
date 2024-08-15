
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
            margin-top: 50px;
        }
        a {
            cursor: pointer;
            background-color: aquamarine;
            padding: 15px;
            box-sizing: border-box;
            border-radius: 10px;
            text-decoration: none;
        }
        a:hover {
            background-color: coral;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center">La bouzinerie</h1>
    <div class="navbar">
        <ul style="display:flex; flex-direction:row; justify-content:space-around; list-style:none">
            <li><a href="./topic.php">Nos Quizz</a></li>
            <li><a href="./../create/">Créer un quizz</a></li>
            <li><a href="./../insert/">Admin - Insertion</a></li>
        </ul>
    </div>
</body>
</html>