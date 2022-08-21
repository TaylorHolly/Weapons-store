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

    <!-- Search Weapons Form -->
    <h2>Search Weapons:</h2>

    <form action="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
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
            While ($row = mysqli_fetch_array($query)) {
                echo "<p>", $row ['Weapon_Name'];
                echo "<br>";
            }
        }
    }
    ?>

    <!--Filter Weapons-->
    <h2>Filter Weapons</h2>

    <form action="" method="post">
        <select name="filter_options">
            <option value="NF">No Filter</option>
            <option value="LtH">Price: Low to High</option>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['LtH'])) {
        $filter = $_POST['LtH'];
        $query2 = "SELECT Weapon_Name, Price FROM weapons ORDER BY Price ASC";
        $LtH_query = mysqli_query($con, $query2);
        $count = mysqli_num_rows($LtH_query);

        While ($row = mysqli_fetch_array($LtH_query)) {
            echo "<p>", ['Weapon_Name'];
            echo "<p>", ['Price'];
            echo "<br>";
        }
    }
    ?>

    <li> <a href='axe.php'> AXE </a></li>
    <li> <a href='update_store.php'> UPDATE STORE </a> </li>

</main>
</body>
</html>
