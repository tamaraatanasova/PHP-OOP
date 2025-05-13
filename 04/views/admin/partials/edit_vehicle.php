<?php
// edit_vehicle.php
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
        // Handle form submission to update vehicle data
        $new_name = $_POST['name'];
        $new_model = $_POST['model'];

        $update_query = "UPDATE vehicles SET name = ?, model = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("ssi", $new_name, $new_model, $vehicle_id);
        $update_stmt->execute();

        echo "Vehicle details updated successfully.";
    }
} else {
    echo "Vehicle ID not provided.";
}
?>
<!-- HTML Form to Edit Vehicle -->
<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($vehicle['name']); ?>" required>
    <input type="text" name="model" value="<?php echo htmlspecialchars($vehicle['model']); ?>" required>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
