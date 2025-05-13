<?php
use Registration\Classes\SessionManager;
use Registration\Classes\Query;
use Registration\Classes\Database;

$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

$models = $query->getAll('models');
$vehicleTypes = $query->getAll('vehicle_type');
$fuelTypes = $query->getAll('fuel_types');
?>




<form action="/add_vehicle" method="post">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="vehicle_model_id" class="form-label">Vehicle Model</label>
            <select class="form-control bg-dark text-white" id="vehicleModel" name="vehicle_model_id" required>
                <option value="" disabled selected>Select a vehicle model</option>
                <?php foreach ($models as $model): ?>
                    <option value="<?= htmlspecialchars($model['id']) ?>"><?= htmlspecialchars($model['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="vehicle_type_id" class="form-label">Vehicle Type</label>
            <select class="form-control bg-dark text-white" id="vehicleTypevehicle_type_id" name="vehicle_type_id" required>
                <option value="" disabled selected>Select a vehicle type</option>
                <?php foreach ($vehicleTypes as $type): ?>
                    <option value="<?= htmlspecialchars($type['id']) ?>"><?= htmlspecialchars($type['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="vehicle_chassis_number" class="form-label">Vehicle Chassis Number</label>
            <input type="text" class="form-control bg-dark text-white" id="vehicle_chassis_number" placeholder="Enter vehicle chassis number" name="vehicle_chassis_number" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="vehicle_production_year" class="form-label">Vehicle Production Year</label>
            <input type="date" class="form-control bg-dark text-white" id="vehicle_production_year" name="vehicle_production_year" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="registration_number" class="form-label">Registration Number</label>
            <input type="text" class="form-control bg-dark text-white" id="registration_number" placeholder="Enter registration number" name="registration_number" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="fuel_type_id" class="form-label">Fuel Type</label>
            <select class="form-control bg-dark text-white" id="fuel_type_id" name="fuel_type_id" required>
                <option value="" disabled selected>Select a fuel type</option>
                <?php foreach ($fuelTypes as $fuel): ?>
                    <option value="<?= htmlspecialchars($fuel['id']) ?>"><?= htmlspecialchars($fuel['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="registration_to" class="form-label">Registration To</label>
            <input type="date" class="form-control bg-dark text-white" id="registration_to" name="registration_to" required>
        </div>
        <div class="col-md-6 mb-3 d-flex align-items-end">
            <button type="submit" class="btn btn-outline-light w-100" name="add">Add</button>
        </div>
    </div>
</form>
