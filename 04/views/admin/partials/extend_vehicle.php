<?php
// extend_vehicle.php
if (isset($_GET['id'])) {
    $vehicle_id = $_GET['id'];

    // Fetch vehicle data from the database
    $conn = new mysqli("localhost", "username", "password", "database");
    $query = "SELECT * FROM vehicles WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $vehicle_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $vehicle = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extend vehicle details, such as an extension date or status
        $new_extension = $_POST['extension'];

        $update_query = "UPDATE vehicles SET extension = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $new_extension, $vehicle_id);
        $update_stmt->execute();

        echo "Vehicle extended successfully.";
    }
} else {
    echo "Vehicle ID not provided.";
}
?>
<!-- HTML Form to Extend Vehicle -->
<form method="POST">
    <input type="text" name="extension" value="<?php echo htmlspecialchars($vehicle['extension']); ?>" required>
    <button type="submit" class="btn btn-warning">Extend</button>
</form>
