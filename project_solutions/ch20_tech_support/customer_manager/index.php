<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/country_db.php');

require('../model/fields.php');
require('../model/validate.php');

// Create Validate object
$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('postal_code');
$fields->addField('phone');
$fields->addField('email');
$fields->addField('password');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'search_customers';
}

switch ($action) {
    case 'search_customers':
        include('customer_search.php');
        break;    
    case 'display_customers':
        $last_name = $_POST['last_name'];
        if (empty($last_name)) {
            $message = 'You must enter a last name.';
        } else {
            $customers = get_customers_by_last_name($last_name);
        }
        include('customer_search.php');
        break;
    case 'display_customer':
        $customer_id = $_POST['customer_id'];
        $customer = get_customer($customer_id);

        // Get data from $customer array
        $customer_id = $customer['customerID'];
        $first_name = $customer['firstName'];
        $last_name = $customer['lastName'];
        $address = $customer['address'];
        $city = $customer['city'];
        $state = $customer['state'];
        $postal_code = $customer['postalCode'];
        $country_code = $customer['countryCode'];
        $phone = $customer['phone'];
        $email = $customer['email'];
        $password = $customer['password'];

        // Get countries
        $countries = get_countries();

        // Set action and button text for form
        $action = 'update_customer';
        $button_text = 'Update Customer';

        include('customer_display.php');
        break;
    case 'display_add':
        $password = '';         // don't display db connect password
        $country_code = 'US';   // set default country code

        $countries = get_countries();
        $action = 'add_customer';
        $button_text = 'Add Customer';

        include('customer_display.php');
        break;
    case 'add_customer':
        // Get data from POST request
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal_code = $_POST['postal_code'];
        $country_code = $_POST['country_code'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate form data
        $validate->text('first_name', $first_name, true, 1, 50);
        $validate->text('last_name', $last_name, true, 1, 50);
        $validate->text('address', $address, true, 1, 50);
        $validate->text('city', $city, true, 1, 50);
        $validate->text('state', $state, true, 1, 50);
        $validate->text('postal_code', $postal_code, true, 1, 20);
        $validate->phone('phone', $phone, true, 1, 20);
        $validate->email('email', $email, true, 1, 50);
        $validate->password('password', $password, true, 1, 20);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            $countries = get_countries();
            $action = 'add_customer';
            $button_text = 'Add Customer';
            include('customer_display.php');
        } else {
            add_customer($first_name, $last_name,
                    $address, $city, $state, $postal_code, $country_code,
                    $phone, $email, $password);
            include('customer_search.php');
        }       
        break;
    case 'update_customer':
        // Get data from POST request
        $customer_id = $_POST['customer_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postal_code = $_POST['postal_code'];
        $country_code = $_POST['country_code'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate form data
        $validate->text('first_name', $first_name, true, 1, 50);
        $validate->text('last_name', $last_name, true, 1, 50);
        $validate->text('address', $address, true, 1, 50);
        $validate->text('city', $city, true, 1, 50);
        $validate->text('state', $state, true, 1, 50);
        $validate->text('postal_code', $postal_code, true, 1, 20);
        $validate->phone('phone', $phone, true, 1, 20);
        $validate->email('email', $email, true, 1, 50);
        $validate->password('password', $password, true, 1, 20);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            $action = 'update_customer';
            $button_text = 'Update Customer';
            $countries = get_countries();
            include('customer_display.php');
        } else {
            update_customer($customer_id, $first_name, $last_name,
                    $address, $city, $state, $postal_code, $country_code,
                    $phone, $email, $password);
            include('customer_search.php');
        }
        break;
}
?>