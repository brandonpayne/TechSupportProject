<?php
function add_incident($customer_id, $product_code, $title, $description) {
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        "INSERT INTO incidents
            (customerID, productCode, dateOpened, title, description)
        VALUES (
               '$customer_id', '$product_code', '$date_opened',
               '$title', '$description')";
    $db->exec($query);
}
?>