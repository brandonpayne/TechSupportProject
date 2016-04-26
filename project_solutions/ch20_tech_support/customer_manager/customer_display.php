<?php include '../view/header.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a table of customer information -->
        <h2>Add/Update Customer</h2>
        <form action="" method="post" id="aligned">
            <input type="hidden" name="action" value="<?php echo $action; ?>" />
            <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>" />

            <label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>" />
            &nbsp;<?php echo $fields->getField('first_name')->getHTML(); ?>
            <br />

            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>" />
            &nbsp;<?php echo $fields->getField('last_name')->getHTML(); ?>
            <br />

            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $address; ?>" size="50" />
            &nbsp;<?php echo $fields->getField('address')->getHTML(); ?>
            <br />

            <label>City:</label>
            <input type="text" name="city" value="<?php echo $city; ?>" />
            &nbsp;<?php echo $fields->getField('city')->getHTML(); ?>
            <br />

            <label>State:</label>
            <input type="text" name="state" value="<?php echo $state; ?>" />
            &nbsp;<?php echo $fields->getField('state')->getHTML(); ?>
            <br />

            <label>Postal Code:</label>
            <input type="text" name="postal_code" value="<?php echo $postal_code; ?>" />
            &nbsp;<?php echo $fields->getField('postal_code')->getHTML(); ?>
            <br />

            <label>Country:</label>
            <select name="country_code">
                <?php foreach ($countries as $country) : 
                    if ($country_code == $country['countryCode']) {
                        $selected = 'selected="selected"';
                    } else {
                        $selected = '';
                    }
                ?>
                <option value="<?php echo $country['countryCode']; ?>" <?php echo $selected; ?>>
                    <?php echo $country['countryName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br />

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>" />
            &nbsp;<?php echo $fields->getField('phone')->getHTML(); ?>
            <br />

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email; ?>" size="50" />
            &nbsp;<?php echo $fields->getField('email')->getHTML(); ?>
            <br />

            <label>Password:</label>
            <input type="text" name="password" value="<?php echo $password; ?>" />
            &nbsp;<?php echo $fields->getField('password')->getHTML(); ?>
            <br />

            <label>&nbsp;</label>
            <input type="submit" value="<?php echo $button_text ?>" />
            <br />
        </form>
        <p><a href="">Search Customers</a></p>
    </div>

</div>
<?php include '../view/footer.php'; ?>