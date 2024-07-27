<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
    <style>
        b {
            color: red;
        }

        span {
            color: red;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="/">Home</a></li> <br>
        <li><a href="/create">Create</a></li> <br>
    </ul>
    {{content}}
</body>

</html>