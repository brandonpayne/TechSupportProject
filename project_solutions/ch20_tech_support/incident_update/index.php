<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/technician_db.php');
require('../model/incident_db.php');

session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_SESSION['technician'])) {    // Skip login if technician is in the session
    $action = 'display_incident_select';
} else {
    $action = 'display_login';
}

switch ($action) {
    case 'display_login':
        include('technician_login.php');
        break;
    case 'display_incident_select':
        // If technician is not in the session, set it in the session
        if (!isset($_SESSION['technician'])) {
            $email = $_POST['email'];
            $technician = get_technician_by_email($email);
            $_SESSION['technician'] = $technician;
        }
        $technician = $_SESSION['technician'];
        $incidents = get_incidents_by_technician($technician['techID']);
        if (count($incidents) == 0) {
            $message = 'There are no open incidents for this technician.';
        }
        include('incident_select.php');
        break;
    case 'select_incident':
        // Set incident in session
        $incident_id = $_POST['incident_id'];
        $_SESSION['incident_id'] = $incident_id;

        $incident = get_incident($incident_id);
        include('incident_update.php');
        break;
    case 'update_incident':
        $date_closed = $_POST['date_closed'];
        $description = $_POST['description'];

        $incident_id = $_SESSION['incident_id'];

        // convert date to correct format
        $ts = strtotime($date_closed);
        $date_closed = date('Y-m-d', $ts);

        $count = update_incident($incident_id, $date_closed, $description);
        if ($count == 1) {
            $message = "This incident was updated.";
        } else {
            $message = "An error occurred while attempting to update the database.";
        }
        include('incident_update.php');
        break;
    case 'logout':
        unset($_SESSION['technician']);
        include('technician_login.php');
        break;
}
?>