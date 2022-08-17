<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$update_weapon = "UPDATE weapons SET Weapon_ID='$_POST[Weapon_ID]', Weapon_Name='$_POST[Weapon_Name]', Type_ID='$_POST[Weapon_Type]', Age='$_POST[Age]', Stock='$_POST[Stock]', Price='$_POST[Price]',";

if(!mysqli_query($con, $update_weapon)) {
    echo 'Update Failed';
} else {
    echo 'Update Successful';
}

header("refresh:2; url=store.php");