<!DOCTYPE html>
<html lang="en">

<head>
    <title> Weapons R Us</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='Stylesheet.css'>
</head>

<body>
<div id="header-container">
<header>
    <h1>Weapons R Us</h1>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME </a> </li>
            <li> <a href='store.php'> STORE </a> </li>
        </ul>
    </nav>
</header>

<main>

    <!-- Log In form -->
    <p> Log In Here </p>

    <form name='login_form' id='login_form' method='post' action ='process_login.php'>
        <label for='username'>Username:</label>
        <input id='username' type='text' name='username'> <br>

        <label for='password'>Password: </label>
        <input id='password' type='password' name='password'> <br>

        <input type='submit' name='submit' id='submit' value='Log In'>
    </form>

</main>
</div>
</body>
</html>