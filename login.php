<!DOCTYPE html>

<html lang="en">

<div id="header-container">

<head>
    <title> Weapons R Us</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='Stylesheet.css'>
</head>

<body>
<header>
    <p>Weapons R Us</p>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME </a> </li>
            <li> <a href='store.php'> STORE </a> </li>
        </ul>
    </nav>
</header>

<main>

    <p> Log In Here </p>

    <form name='login_form' id='login_form' method='post' action ='process_login.php'>
        <label for='username'>Username:</label>
        <input type='text' name='username'> <br>

        <label for='password'>Password: </label>
        <input type='password' name='password'> <br>

        <input type='submit' name='submit' id='submit' value='Log In'>
    </form>

</div>
</main>
</body>
</html>