<?php
$login = $_POST['email'];
$password = $_POST['password'];
$connection = new mysqli('localhost', 'root', '', 'joystick');
$result = $connection->query('SELECT email, `password`,`name`,`role` FROM `login` WHERE email LIKE \'' . $login . '\'');
$arr = $result->fetch_array();
if ($arr == null  || $arr[1] != $password) {
    header("Location: login.php?try=1");
    die();
}
$connection->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehomepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" media="(prefers-color-scheme:dark)" href="assests/joystick.png" type="image/x-icon">
    <link rel="shortcut icon" media="(prefers-color-scheme:light)" href="assests/joystick-black.png" type="image/x-icon">
    <script src="homepage.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="desktop">
        <nav>

        </nav>
        <main>
            <section id="Myaccount"></section>
            <section id="Media"></section>
            <section id="Games"></section>
        </main>
    </div>
    <div class="mobile"></div>
</body>
</html>