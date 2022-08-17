<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$Weapon_ID = $_POST['weapon_id'];
$Weapon_Name = $_POST['weapon'];
$Type_ID = $_POST['ID'];
$Age = $_POST['Age'];
$Stock = $_POST['Stock'];
$Price = $_POST['price'];

$insert_weapon = "INSERT INTO weapons (Weapon_ID, Weapon_Name, Type_ID, Age, Stock, Price) VALUES ('$Weapon_ID', '$Weapon_Name', '$Type_ID', '$Age', '$Stock', '$Price')";

/*Check the data has been added*/
if(!mysqli_query($con, $insert_weapon)) {
    echo 'Insert Failed';
} else {
    echo 'Insert Successful';
}

/* Refresh the page after 2 seconds and return to the store page*/
header("refresh:2; url=store.php");

?>