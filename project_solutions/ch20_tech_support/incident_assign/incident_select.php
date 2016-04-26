<?php include '../view/header.php'; ?>
<div id="main">

    <h2>Select Incident</h2>
    <div id="content">
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($incidents as $i) : ?>
            <tr>
                <td><?php echo $i['firstName'] . ' ' . $i['lastName']; ?></td>
                <td><?php echo $i['productCode']; ?></td>
                <td><?php echo $i['dateOpened']; ?></td>
                <td><?php echo $i['title']; ?></td>
                <td><?php echo $i['description']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="select_incident" />
                    <input type="hidden" name="incident_id"
                           value="<?php echo $i['incidentID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
<?php include '../view/footer.php'; ?>