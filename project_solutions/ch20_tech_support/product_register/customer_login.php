<?php include '../view/header.php'; ?>
<div id="main">

    <h2>Customer Login</h2>
    <p>You must login before you can register a product.</p>
    <div id="content">
        <!-- display a search form -->
        <form action="" method="post">
            <input type="hidden" name="action" value="display_register" />
            <label>Email:</label>
            <input type="input" name="email" value="<?php echo $email; ?>" />
            <input type="submit" value="Login" />
        </form>
    </div>

</div>
<?php include '../view/footer.php'; ?>