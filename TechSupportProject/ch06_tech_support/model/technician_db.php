<?php
function get_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians
              ORDER BY lastName';
    $technicians = $db->query($query);
    return $technicians;
}

function delete_technician($technician_id) {
    global $db;
    $query = "DELETE FROM technicians
              WHERE techID = '$technician_id'";
    $db->exec($query);
}

function add_technician($first_name, $last_name, $email, $phone, $password) {
    global $db;
    $query = "INSERT INTO technicians
                 (firstName, lastName, email, phone, password)
              VALUES
                 ('$first_name', '$last_name', '$email', '$phone', '$password')";
    $db->exec($query);
}

function update_technician($id, $first_name, $last_name, $email, $phone, $password) {
    global $db;
    $query = "UPDATE technicians
              SET firstName = '$first_name',
                  lastName = '$last_name',
                  email = '$email',
                  phone = '$phone',
                  password = '$password'
              WHERE technicianID = '$id'";
    $db->exec($query);
}

?>