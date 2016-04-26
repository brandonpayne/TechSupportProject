<?php include '../view/header.php'; ?>
<div id="main">

    <div id="content">
        <h2>Assign Incident</h2>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
            <p><a href="">Select Another Incident</a></p>
        <?php else: ?>

            <form action="" method="post" id="aligned">
                <label>Customer:</label>
                <span><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></span>
                <br />

                <label>Product:</label>
                <span><?php echo $incident['productCode']; ?></span>
                <br />

                <label>Technician:</label>
                <span><?php echo $technician['firstName'] . ' ' . $technician['lastName']; ?></span>
                <br />

                <input type="hidden" name="action" value="assign_incident" />
                <input type="submit" value="Assign Incident" />
            </form>
        <?php endif; ?>
    </div>

</div>
<?php include '../view/footer.php'; ?>