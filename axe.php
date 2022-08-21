<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

/*Queries*/
$weapon_query = "SELECT Weapon_Name, Age, Price, Stock, Type_ID, Weapon_Img FROM weapons WHERE Weapon_ID = 'AXE'";
$weapon_result = mysqli_query($con, $weapon_query);
$weapon_record = mysqli_fetch_assoc($weapon_result);
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

    <?php
        echo " " . $weapon_record['Weapon_Name'] . " Information: <br>";
        echo "<p> Age Requirement: " .$weapon_record['Age'] . "<br>";
        echo "<p> Price: " .$weapon_record['Price'] . "<br>";
        echo "<p> Handedness: " .$weapon_record['Type_ID'] . "<br>";
        echo "<p> Stock: " .$weapon_record['Stock'] . "<br>";
    ?>

</main>
</body>
</html>
