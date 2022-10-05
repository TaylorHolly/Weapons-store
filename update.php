<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

$update_weapon = "UPDATE weapons SET Weapon_ID='$_POST[Weapon_ID]', Weapon_Name='$_POST[Weapon_Name]', Type_ID='$_POST[Weapon_Type]', Age='$_POST[Age]', Stock='$_POST[Stock]', Price='$_POST[Price]' WHERE Weapon_ID='$_POST[Weapon_ID]'";

if(!mysqli_query($con, $update_weapon)) {
    echo 'Update Failed';
} else {
    echo 'Update Successful';
}

header("refresh:2; url=store.php");
?>