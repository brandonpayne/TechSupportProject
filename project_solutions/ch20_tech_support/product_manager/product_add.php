<?php include '../view/header.php'; ?>
<div id="main">
    <h1>Add Product</h1>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="add_product" />

        <label>Code:</label>
        <input type="input" name="code" />
        <br />

        <label>Name:</label>
        <input type="input" name="name" />
        <br />

        <label>Version:</label>
        <input type="input" name="version" />
        <br />

        <label>Release Date:</label>
        <input type="input" name="release_date" />&nbsp;<span>Use any valid date format</span>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br />
    </form>
    <p><a href="?action=list_products">View Product List</a></p>

</div>
<?php include '../view/footer.php'; ?>