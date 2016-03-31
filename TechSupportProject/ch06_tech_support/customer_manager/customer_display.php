<?php include '../view/header.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a table of customer information -->
        <h2>View/Update Customer</h2>
        <form action="" method="post" id="aligned">
            <input type="hidden" name="action" value="update_customer" />
            <input type="hidden" name="customer_id" value="<?php echo $customer['customerID']; ?>" />

            <label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo $customer['firstName']; ?>" /><br />

            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $customer['lastName']; ?>" /><br />

            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $customer['address']; ?>" size="50" /><br />

            <label>City:</label>
            <input type="text" name="city" value="<?php echo $customer['city']; ?>" /><br />

            <label>State:</label>
            <input type="text" name="state" value="<?php echo $customer['state']; ?>" /><br />

            <label>Postal Code:</label>
            <input type="text" name="postal_code" value="<?php echo $customer['postalCode']; ?>" /><br />

            <label>Country Code:</label>
            <input type="text" name="country_code" value="<?php echo $customer['countryCode']; ?>" /><br />

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $customer['phone']; ?>" /><br />

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $customer['email']; ?>" size="50" /><br />

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $customer['password']; ?>" /><br />

            <label>&nbsp;</label>
            <input type="submit" value="Update Customer" />
            <br />
        </form>
        <p><a href="">Search Customers</a></p>
    </div>

</div>
<?php include '../view/footer.php'; ?>