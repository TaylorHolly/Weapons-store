<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

/*Queries*/

$all_weapons_query = "SELECT Weapon_ID, Weapon_Name, Age FROM weapons";
$all_weapons_result = mysqli_query($con, $all_weapons_query);

if(isset($_GET['weapon'])){
    $id = $_GET['weapon'];
}else{
    $id = 'AXE';
}

$this_weapon_query = "SELECT Weapon_Name, Price FROM weapons WHERE Weapon_ID = '" .$id ."'";
$this_weapon_result = mysqli_query($con, $this_weapon_query);
$this_weapon_record = mysqli_fetch_assoc($this_weapon_result);
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
                <li> <a href='index.php'> HOME </a> </li>
                <li> <a href='store.php'> STORE </a></li>
                <li> <a href='login.php'> LOG-IN </a> </li>
                <li> <a href='logout.php'> LOG-OUT </a> </li>
            </ul>
        </nav>
    </header>

<main>

    PUT STUFF HERE
    <li> <a href='axe.php'> AXE </a></li>

</main>
</body>
</html>
