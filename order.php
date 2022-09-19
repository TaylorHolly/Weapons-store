<?php
session_start();
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

$all_weapons_query = "SELECT Weapon_ID, Weapon_Name FROM weapons";
$all_weapons_result = mysqli_query($con, $all_weapons_query);

?>

<head>
    <title> ---SHOP NAME---</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='Stylesheet.css'>
</head>


<body>

<header>
    SHOP NAME
    <nav>
        <ul>
            <li> <a href='index.php'> HOME </a> </li>
            <li> <a href='store.php'> STORE </a></li>
            <li> <a href='login.php'> LOG-IN </a> </li>
            <li> <a href='logout.php'> LOG-OUT </a> </li>
        </ul>
    </nav>
</header>


<form name='order_form' id='order_form' method="post">
    <select name="order" name="order">
        <?php
        while($all_weapons_record = mysqli_fetch_assoc($all_weapons_result)){
            echo "<option value = '" . $all_weapons_record['Weapon_ID'] . "'>";
            echo $all_weapons_record['Weapon_Name'];
            echo "</option>";
        }
        ?>
    </select>

    <br> <label for='username'>Username: </label>
    <input type='text' name='username'> <br>

    <label for='password'>Password: </label>
    <input type='password' name='password'> <br>

    <input type="submit" name="submit" value="Order">
</form>

<?php
$weapon = trim($_POST['order']);
echo $weapon;
?>

<form name='user_form' id='user_form' method="post">

</form>

<?php

$user = trim($_POST['username']);
$pass= trim($_POST['password']);


echo $user;
echo $pass;
?>