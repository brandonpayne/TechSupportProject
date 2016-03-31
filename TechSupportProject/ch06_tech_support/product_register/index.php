<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login_customer';
}

if ($action == 'login_customer') {
    include('customer_login.php');
} else if ($action == 'get_customer') {
    $email = $_POST['email'];
    $customer = get_customer_by_email($email);
    $products = get_products();
    include('product_register.php');
} else if ($action == 'register_product') {
    $customer_id = $_POST['customer_id'];
    $product_code = $_POST['product_code'];
    add_registration($customer_id, $product_code);
    $message = "Product ($product_code) was registered successfully.";
    include('product_register.php');
}
?>