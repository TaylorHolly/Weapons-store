<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

/*Queries*/
$axe_weapon_query = "SELECT Weapon_Name, Age, Price, Stock, Type_ID, Weapon_Img FROM weapons WHERE Weapon_ID = 'AXE'";
$axe_weapon_query = mysqli_query($con, $axe_weapon_query);
?>

<!DOCTYPE html>
<html lang="en">

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
                <li> <a href='index.php'> HOME </a></li>
                <li> <a href='store.php'> STORE </a></li>
                <li> <a href='login.php'> LOG-IN </a></li>
                <li> <a href='logout.php'> LOG-OUT </a></li>
            </ul>
        </nav>
    </header>

<main>

    ---

</main>
</body>
</html>
