<?php include '../view/header.php'; ?>
<div id="main">
    <h1 class="top">Database Error</h1>
    <p>An error occurred while attempting to work with the database.</p>
    <p>Message: <?php echo $error_message; ?></p>
</div>
<?php include '../view/footer.php'; ?>