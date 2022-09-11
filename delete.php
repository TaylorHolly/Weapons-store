<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

$delete_weapon = "DELETE FROM weapons WHERE Weapon_ID='$_GET[Weapon_ID]'";

if(!mysqli_query($con, $delete_weapon)) {
    echo 'Delete Failed';
} else {
    echo 'Delete Successful';
}

header("refresh:2; url=store.php");
?>