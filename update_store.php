<?php
session_start();
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

if((!isset($_SESSION['logged_in'])) or $_SESSION['logged_in'] !=1){
    header("Location: error_page.php");
}


$update_store = "SELECT * FROM weapons";
$update_store_record = mysqli_query($con, $update_store);

?>

<!-- Adding an insert into the database -->

<p> Add Weapon </p>
<form action="insert.php" method="post">
    <label for="weapon">Weapon Name: </label> <br>
    <input type="text" id = "weapon" name="weapon"> <br>

    <label for="type_id">Type ID: </label> <br>
    <input type="radio" name="ID" value="TH"> Two Handed<br/>
    <input type="radio" name="ID" value="OH"> One Handed<br/>

    <label for="age">Age: </label> <br>
    <input type="radio" name="Age" value="18+"> Over 18<br/>
    <input type="radio" name="Age" value="-18"> Under 18<br/>

    <label for="stock">Stock: </label> <br>
    <input type="radio" name="Stock" value="Yes"> In stock<br/>
    <input type="radio" name="Stock" value="No"> Out of stock<br/>

    <label for="price">Price: </label> <br>
    <input type="text" id="price" name="price"> <br/>

    <input type="submit" value="Submit">
</form>

<!-- Update items in the database -->
<table>
    <tr>
        <th>Weapon Name: </th>
        <th>Weapon Type: </th>
        <th>Age: </th>
        <th>Stock: </th>
        <th>Price: </th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($update_store_record))
    {
        echo "<tr><form action='update.php' method='post'>";
        echo "<input type='hidden' name='Weapon ID' value='" .$row['Weapon_ID']. "'>";
        echo "<td><input type='text' name='Weapon Name' value='" .$row['Weapon_Name']. "'> </td>";
        echo "<td><input type='text' name='Weapon Type' value='" .$row['Type_ID']. "'> </td>";
        echo "<td><input type='text' name='Age' value='" .$row['Age']. "'> </td>";
        echo "<td><input type='text' name='Stock' value='" .$row['Stock']. "'> </td>";
        echo "<td><input type='text' name='Price' value='" .$row['Price']. "'> </td>";

        echo "<td><input type='submit'> </td>";
        echo "<td><a href=delete.php?Weapon_ID="  .$row['Weapon_ID'].   ">Delete</a></td>";
        echo "</form></tr>";
    }
    ?>
</table>