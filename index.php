<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';
?>

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
                <li> <a href='login.php'> LOG-IN </a> </li>
                <li> <a href='logout.php'> LOG-OUT </a> </li>
            </ul>
        </nav>
        <h2><img src=logo.png alt="Weapons R Us Logo" title="Weapons R Us Logo" width='350' height='250'></h2>
    </header>
<main>
    <p>At Weapons R Us, you can rest easy knowing that all our products are sourced sustainably.</p>
    <br>

</main>
</div>
</body>
</html>
