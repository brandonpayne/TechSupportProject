<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY name';
    $products = $db->query($query);
    return $products;
}

function get_products_by_customer($email) {
    global $db;
    $query = "SELECT products.productCode, products.name 
              FROM products
                INNER JOIN registrations ON products.productCode = registrations.productCode
                INNER JOIN customers ON registrations.customerID = customers.customerID
              WHERE customers.email = '$email'";
    $products = $db->query($query);
    return $products;
}

function get_product($product_code) {
    global $db;
    $query = "SELECT * FROM products
              WHERE productCode = '$product_code'";
    $product = $db->query($query);
    $product = $product->fetch();
    return $product;
}

function delete_product($product_code) {
    global $db;
    $query = "DELETE FROM products
              WHERE productCode = '$product_code'";
    $db->exec($query);
}

function add_product($code, $name, $version, $release_date) {
    global $db;
    $query = "INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 ('$code', '$name', '$version', '$release_date')";
    $db->exec($query);
}

function update_product($code, $name, $version, $release_date) {
    global $db;
    $query = "UPDATE products
              SET name = '$name',
                  version = '$version',
                  releaseDate = '$release_date'
              WHERE productCode = '$product_code'";
    $db->exec($query);
}

?>