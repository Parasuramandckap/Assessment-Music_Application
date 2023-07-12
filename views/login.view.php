<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login-page" method="post" enctype="multipart/form-data">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <button type="submit">login</button>
    </form>
    <form action="/guest" method="post">
        <button type="submit">guest users</button>
    </form>
</body>
</html>