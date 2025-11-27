<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login demo</title>
    <script src="/assets/js/main.js" defer></script>
</head>
<body>
    <h1>Login</h1>
    <div>
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="username">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="password">
    </div>
    <div>
        <button type="button" onclick="login()">Login</button>
    </div>

    <section id="result"></section>
</body>
</html>
