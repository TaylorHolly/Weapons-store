<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

function terminate_script() {
    header("refresh:2; url=store.php");
    exit();
}

$Weapon_Name = $_POST['weapon'];
$Type_ID = $_POST['ID'];
$Age = $_POST['Age'];
$Stock = $_POST['Stock'];
$Price = $_POST['price'];

/*Checking the price*/

if (!empty($Price)) {
    $number = filter_var($Price, FILTER_VALIDATE_INT);

    if ($number === false or $Price < 0) {
        echo 'Invalid Integer';
        terminate_script();

    }
}

$insert_weapon = "INSERT INTO weapons (Weapon_Name, Type_ID, Age, Stock, Price) VALUES ('$Weapon_Name', '$Type_ID', '$Age', '$Stock', '$Price')";

/*Check the data has been added*/
if(!mysqli_query($con, $insert_weapon)) {
    echo 'Insert Failed';
} else {
    echo 'Insert Successful';
}

/* Refresh the page after 2 seconds and return to the store page*/
header("refresh:2; url=store.php");

?>