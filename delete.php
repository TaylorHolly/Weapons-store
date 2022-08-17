<?php
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$delete_weapon = "DELETE FROM weapons WHERE Weapon_ID='$_GET[Weapon_ID]'";

if(!mysqli_query($con, $delete_weapon)) {
    echo 'Delete Failed';
} else {
    echo 'Delete Successful';
}

header("refresh:2; url=store.php");
?>