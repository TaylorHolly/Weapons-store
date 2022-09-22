<?php
session_start();
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

$all_weapons_query = "SELECT Weapon_ID, Weapon_Name FROM weapons";
$all_weapons_result = mysqli_query($con, $all_weapons_query);

?>

<head>
    <title> Weapons R Us</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='Stylesheet.css'>
</head>


<body>

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
</header>


<form name='order_form' id='order_form' method="post">
    <select name="order" name="order">
        <?php
        while($all_weapons_record = mysqli_fetch_assoc($all_weapons_result)){
            echo "<option value = '" . $all_weapons_record['Weapon_ID'] . "'>";
            echo $all_weapons_record['Weapon_Name'];
            echo "</option>";
        }
        ?>
    </select>

    <br> <label for='username'>Username: </label>
    <input type='text' name='username'> <br>

    <label for='password'>Password: </label>
    <input type='password' name='password'> <br>

    <input type="submit" name="submit" value="Order">
</form>

<?php
$weapon = trim($_POST['order']);
echo $weapon;

$user = trim($_POST['username']);
$pass= trim($_POST['password']);

echo $user;
echo $pass;

//Log in queries and checking username and password

$login_query = "SELECT password FROM customers WHERE Username ='".   $user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['password'];
$verify = password_verify($pass, $hash);
if($verify) {
$_SESSION['logged_in'] = 1;
    echo "Logged In";
}
else{
    echo "Incorrect Username or Password";
}

//Customer Queries

$customer_query = "SELECT Customer_ID FROM customers WHERE USERNAME ='". $user."'";
$customer_result = mysqli_query($con, $customer_query);
$customer_record = mysqli_fetch_assoc($customer_result);

$customer = $customer_record['Customer_ID'];

$order = "INSERT INTO orders (Customer_ID, Weapon_ID) VALUES ('$customer', '$weapon')";

//Check order has been added

if(!mysqli_query($con, $order)) {
    echo 'Order Failed';
} else {
    echo 'Order Successful';
}

?>

