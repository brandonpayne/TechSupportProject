<?php include '../view/header.php'; ?>
<div id="main">

    <div id="content">
        <h2>Register Product</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php else: ?>
            <form action="" method="post" id="aligned">
                <input type="hidden" name="action" value="register_product" />

                <label>Customer:</label>
                <span><?php echo $customer['firstName'] . ' ' . $customer['lastName'] ?></span>
                <br />

                <label>Product:</label>
                <select name="product_code">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['productCode']; ?>">
                        <?php echo $product['name']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Register Product" />
            </form>
        <?php endif; ?>
        <br />
        <p>You are logged in as <?php echo $customer['email']; ?></p>
        <form action="" method="post">
            <input type="hidden" name="action" value="logout" />
            <input type="submit" value="Logout" />
        </form>
    </div>

</div>
<?php include '../view/footer.php'; ?>