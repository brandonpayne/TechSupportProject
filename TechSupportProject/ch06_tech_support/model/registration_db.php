<?php
function add_registration($customer_id, $product_code) {
    global $db;
    $date = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query = "INSERT INTO registrations VALUES
            ('$customer_id', '$product_code', '$date')";
    $db->exec($query);
}
?>