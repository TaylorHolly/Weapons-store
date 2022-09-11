<?php
session_start();
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] !=1){
    header("Location: error_page.php");
}

/*Queries*/
$weapon_query = "SELECT Weapon_Name, Age, Price, Stock, Type_ID, Weapon_Img FROM weapons WHERE Weapon_ID = '1'";
$weapon_result = mysqli_query($con, $weapon_query);
$weapon_record = mysqli_fetch_assoc($weapon_result);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title> ---SHOP NAME---</title>       <meta charset="utf-8">
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

    <?php
        echo " " . $weapon_record['Weapon_Name'] . " Information: <br>";
        echo "<p> Age Requirement: " .$weapon_record['Age'] . "<br>";
        echo "<p> Price: $" .$weapon_record['Price'] . "<br>";

        if('Type_ID'=='TH'){
            echo "<p> Handedness: Two Handed <br>";
    } else {
            echo "<p> Handedness: One Handed <br>";
        }

        echo "<p> In Stock: " .$weapon_record['Stock'] . "<br>";
    ?>

</main>
</body>
</html>
