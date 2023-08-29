<?php
// mark_paid.php

session_start();
include 'common/connect.php';

// Check if the appointment ID is provided
if (isset($_GET['p_id'])) {
    $appointment_id = $_GET['p_id'];

    // Assuming you have a database connection already established
    // Here, we will use the $obj connection from the included 'common/connect.php'
    $sql = "UPDATE appoinment SET payment_status = 'completed' WHERE b_id = '$appointment_id'";

    if ($obj->query($sql)) {
        // The payment_status column is updated successfully
        header("Location: m_appoinment.php");
        exit;
    } else {
        echo "Error updating record: " . $obj->error;
    }
} else {
    echo "Invalid appointment ID.";
}
?>
