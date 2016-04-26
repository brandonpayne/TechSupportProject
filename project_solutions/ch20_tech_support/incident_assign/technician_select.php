<?php include '../view/header.php'; ?>
<div id="main">

    <h2>Select Technician</h2>
    <div id="content">
        <table>
            <tr>
                <th>Name</th>
                <th>Open Incidents</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $t) : ?>
            <tr>
                <td><?php echo $t['firstName'] . ' ' . $t['lastName']; ?></td>
                <td><?php echo $t['openIncidentCount']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="select_technician" />
                    <input type="hidden" name="technician_id"
                           value="<?php echo $t['techID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>
<?php include '../view/footer.php'; ?>