<?php
// delete_vehicle.php
if (isset($_GET['id'])) {
    $vehicle_id = $_GET['id'];

    // Connect to the database
    $conn = new mysqli("localhost", "username", "password", "database");

    // Delete vehicle from database
    $delete_query = "DELETE FROM vehicles WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("i", $vehicle_id);
    $delete_stmt->execute();

    echo "Vehicle deleted successfully.";
} else {
    echo "Vehicle ID not provided.";
}
?>
