<?php
use Registration\Classes\SessionManager;
use Registration\Classes\Query;
use Registration\Classes\Database;

$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

// Handle search
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$results = SessionManager::has("search_admin") ? SessionManager::get("search_admin") : $query->getAll('registration', $searchTerm);

?>
<div class="container w-100">


    <!-- Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Vehicle Model</th>
            <th>Vehicle Type</th>
            <th>Vehicle Chassis Number</th>
            <th>Vehicle Production Year</th>
            <th>Registration Number</th>
            <th>Fuel Type</th>
            <th>Registration To</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $index => $result): ?>
                <?php
                // Get registration_to date and calculate expiration status
                $registrationToDate = new DateTime($result['registration_to']);
                $currentDate = new DateTime();
                $interval = $currentDate->diff($registrationToDate);

                // Determine row color based on expiration status
                if ($registrationToDate < $currentDate) {
                    // Expired, Red
                    $rowClass = 'table-danger';
                    $canExtend = true; // Can extend expired registration
                } elseif ($interval->days <= 30) {
                    // About to expire, Yellow
                    $rowClass = 'table-warning';
                    $canExtend = true; // Can extend soon-to-expire registration
                } else {
                    // Normal status, no color change
                    $rowClass = '';
                    $canExtend = false;
                }
                ?>
                <tr class="<?= $rowClass; ?>">
                    <td><?= $index + 1; ?></td>
                    <td>
                        <?php
                        $model = $query->find('models', $result['vehicle_model_id'], 'id', true);
                        echo htmlspecialchars($model['name']);
                        ?>
                    </td>
                    <td>
                        <?php
                        $vehicleType = $query->find('vehicle_type', $result['vehicle_type_id'], 'id', true);
                        echo htmlspecialchars($vehicleType['name']);
                        ?>
                    </td>
                    <td><?= htmlspecialchars($result['vehicle_chassis_number']); ?></td>
                    <td><?= htmlspecialchars($result['vehicle_production_year']); ?></td>
                    <td><?= htmlspecialchars($result['registration_number']); ?></td>
                    <td>
                        <?php
                        $fuelType = $query->find('fuel_types', $result['fuel_type_id'], 'id', true);
                        echo htmlspecialchars($fuelType['name']);
                        ?>
                    </td>
                    <td><?= htmlspecialchars($result['registration_to']); ?></td>
                    <td>
                        <a href="edit_vehicle.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm" id="edit_vehicle_btn">Edit</a>
                        <a href="delete_vehicle.php?id=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm" id="delete_vehicle_btn" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>

                        <?php if ($canExtend): ?>
                            <a href="extend_vehicle.php?id=<?php echo $result['id']; ?>" class="btn btn-warning btn-sm" id="extend_vehicle_btn">Extend</a>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">No results found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

