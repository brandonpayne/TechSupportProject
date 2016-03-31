<?php
require('../model/database.php');
require('../model/technician_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_technicians';
}

if ($action == 'list_technicians') {
    // Get technician data
    $technicians = get_technicians();

    // Display the technician list
    include('technician_list.php');
} else if ($action == 'delete_technician') {
    $technician_id = $_POST['technician_id'];
    delete_technician($technician_id);
    header("Location: .");
} else if ($action == 'show_add_form') {
    include('technician_add.php');
} else if ($action == 'add_technician') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Validate the inputs
    if (empty($first_name) || empty($last_name) ||
        empty($email) || empty($phone) || empty($password)) {
            $error = "Invalid technician data. Check all fields and try again.";
            include('../errors/error.php');
    } else {
        add_technician($first_name, $last_name, $email, $phone, $password);
        header("Location: .");
    }
}
?>