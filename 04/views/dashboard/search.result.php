<?php
use Registration\Classes\SessionManager;
use Registration\Classes\Query;
use Registration\Classes\Database;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

$result = SessionManager::has("search") ? SessionManager::get("search") : [];

SessionManager::destroy();
?>

<?php require_once 'partials/top.partial.html';?>

<?php require_once 'partials/navbar.php';?>

    <div class="container mt-5">
        <h2 class="mb-4 text-white">Results</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Vehicle Model</th>
                <th>Vehicle Type</th>
                <th>Vehicle Chassis Number</th>
                <th>Vehicle Production Year</th>
                <th>Registration number</th>
                <th>Fuel Type</th>
                <th>Registration To</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $index => $result): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td>
                            <?php
                            $model = $query->find('models', $result->vehicle_model_id, 'id', true);
                            echo htmlspecialchars($model->name);
                            ?>
                        </td>
                        <td>
                            <?php
                            $vehicleType = $query->find('vehicle_type', $result->vehicle_type_id, 'id', true);
                            echo htmlspecialchars($vehicleType->name);
                            ?>
                        </td>
                        <td><?= htmlspecialchars($result->vehicle_chassis_number); ?></td>
                        <td><?= htmlspecialchars($result->vehicle_production_year); ?></td>
                        <td><?= htmlspecialchars($result->registration_number); ?></td>
                        <td>
                            <?php
                            $fuelType = $query->find('fuel_types', $result->fuel_type_id, 'id', true);
                            echo htmlspecialchars($fuelType->name);
                            ?>
                        </td>
                        <td><?= htmlspecialchars($result->registration_to); ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No results found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>


<?php require_once 'partials/bottom.partial.html';?>