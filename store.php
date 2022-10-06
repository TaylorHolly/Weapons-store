<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

/*Queries*/
$all_weapons_query = "SELECT Weapon_ID, Weapon_Name, Age FROM weapons";
$all_weapons_result = mysqli_query($con, $all_weapons_query);

if(isset($_GET['weapon'])){
    $id = $_GET['weapon'];
}else{
    $id = '1';
}

$this_weapon_query = "SELECT Weapon_Name, Price, Age, Stock, Type_ID FROM weapons WHERE Weapon_ID = '" .$id ."'";
$this_weapon_result = mysqli_query($con, $this_weapon_query);
$this_weapon_record = mysqli_fetch_assoc($this_weapon_result);

$filter = 'NF';
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
                <li> <a href='store.php'> STORE </a></li>
                <li> <a href='login.php'> LOG-IN </a> </li>
                <li> <a href='logout.php'> LOG-OUT </a> </li>
            </ul>
        </nav>

        <!-- Logo -->
        <h2><img src=logo.png alt="Weapons R Us Logo" title="Weapons R Us Logo" width='350' height='250'></h2>
    </header>

       <main>
           <!-- Weapon drop-down box -->
           <h2>Weapon Information</h2>

           <?php

           echo "<p> Weapon: " . $this_weapon_record['Weapon_Name'] . "<br>";
           echo "<p> Age Requirement: " . $this_weapon_record['Age'] . "<br>";
           echo "<p> Price: " . $this_weapon_record['Price'] . "<br>";
           echo "<p> Handedness: " . $this_weapon_record['Type_ID'] . "<br>";
           echo "<p> Stock: " . $this_weapon_record['Stock'] . "<br>";
           ?>

           <!--Food Box Form-->
           <form name='weapon_box_form' id='weapon_box_form' method = 'get' action ='store.php'>
               <select id ='weapon' name='weapon'>
                   <!--options-->
                   <?php
                   while($all_weapons_record = mysqli_fetch_assoc($all_weapons_result)){
                       echo "<option value = '" . $all_weapons_record['Weapon_ID'] . "'>";
                       echo $all_weapons_record['Weapon_Name'];
                       echo "</option>";
                   }
                   ?>
               </select>
               <input type='submit' name='weapon_button' value='Show me the weapon information'>
           </form>

           <!-- Order Link -->
           <a href='order.php'> <p> Order </p> </a>

           <!-- Search Weapons Form -->
    <h2>Search Weapons:</h2>

    <form action="store.php" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="search">
    </form>

    <?php
    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM weapons WHERE Weapon_Name LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count == 0){
            echo "<p> There were no results for your search!";
            echo "<br>";

        }else{
            while ($row = mysqli_fetch_array($query)) {
                echo "<p>", $row ['Weapon_Name'];
                echo "<br>";
            }
        }
        mysqli_data_seek($query, 0);
    }
    ?>

    <!--Filter Weapons-->

    <h2>Filter Weapons</h2>

    <form action="store.php" method="post">
        <select name="filter_options">
            <option value="NF">No Filter</option>
            <option value="LtH">Price: Low to High</option>
        </select>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php

    $filter = $_POST['filter_options'];

    if($filter == 'LtH') {

        $count = 0;
        $query2 = "SELECT Weapon_Name, Price FROM weapons ORDER BY Price ASC";
        $LtH_query = mysqli_query($con, $query2);
        $count = mysqli_num_rows($LtH_query);

        if ($count > 0) {

            while ($row = mysqli_fetch_array($LtH_query)) {
                echo "<p>Weapon: ", $row ['Weapon_Name'];
                echo "<p>Price: ", $row ['Price'];
                echo "<br>";
            }
        }

    } else {
        echo "<br>";
    }
    ?>

           <!-- Update store link -->
           <a href='update_store.php'> <p> UPDATE STORE </p> </a>
           <br>
</main>
</div>
</body>
</html>
