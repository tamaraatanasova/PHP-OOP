<?php
use Registration\Classes\SessionManager;
use Registration\Classes\Query;
use Registration\Classes\Database;

SessionManager::start();
$database = new Database();
$db = $database->getConnection();
$query = new Query($db);

$models = $query->getAll('models') ?? [];
SessionManager::destroy();
?>

<table>
    <thead>
    <tr>
        <td>#</td>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($models as $model): ?>
        <tr>
            <td><?php echo htmlspecialchars($model['id']); ?></td>
            <td class="d-flex">
                <form action="/edit_model" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($model['id']); ?>">
                    <input type="text" name="model_name" value="<?php echo htmlspecialchars($model['name']); ?>" required>
                    <button type="submit" class="btn btn-outline-light" name="update">Update</button>
                </form>
                <form action="/delete_model" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($model['id']); ?>">
                    <button type="submit" class="btn btn-outline-light" onclick="return confirm('Are you sure you want to delete this model?');">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
