<?php include '../view/header.php'; ?>
<div id="main">

    <h2>Get Customer</h2>
    <p>You must enter the customer's email address to select the customer.</p>
    <div id="content">
        <!-- display a search form -->
        <form action="" method="post">
            <input type="hidden" name="action" value="get_customer" />
            <label>Email:</label>&nbsp;
            <input type="input" name="email" value="<?php echo $email; ?>" />&nbsp;
            <input type="submit" value="Get Customer" />
        </form>
    </div>

</div>
<?php include '../view/footer.php'; ?>