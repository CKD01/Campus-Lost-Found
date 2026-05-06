<?php
require_once 'config.php';

$category = $_GET['category'] ?? '';

if ($category) {
    $stmt = $conn->prepare("SELECT * FROM items WHERE category = :category ORDER BY id DESC");
    $stmt->execute(['category' => $category]);
} else {
    $stmt = $conn->query("SELECT * FROM items ORDER BY id DESC");
}

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Lost & Found</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>

<h1>Campus Lost & Found</h1>

<nav>
    <a href="index.php">Browse Items</a>
    <a href="report.php">Report Item</a>
</nav>

<?php if (isset($_GET['success'])): ?>
    <p>Item submitted successfully!</p>
<?php endif; ?>

<h2>All Items</h2>

<form method="GET">
    <label>Filter by category:
        <select name="category" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="Phone"    <?= $category == 'Phone'    ? 'selected' : '' ?>>Phone</option>
            <option value="Backpack" <?= $category == 'Backpack' ? 'selected' : '' ?>>Backpack</option>
            <option value="Wallet"   <?= $category == 'Wallet'   ? 'selected' : '' ?>>Wallet</option>
            <option value="Keys"     <?= $category == 'Keys'     ? 'selected' : '' ?>>Keys</option>
            <option value="Laptop"   <?= $category == 'Laptop'   ? 'selected' : '' ?>>Laptop</option>
            <option value="Other"    <?= $category == 'Other'    ? 'selected' : '' ?>>Other</option>
        </select>
    </label>
</form>

<br>

<?php if (count($items) == 0): ?>
    <p>No items found.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Type</th>
            <th>Category</th>
            <th>Description</th>
            <th>Location</th>
            <th>Date</th>
            <th>Contact Name</th>
            <th>Contact Email</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['type'] ?></td>
            <td><?= $item['category'] ?></td>
            <td><?= htmlspecialchars($item['description']) ?></td>
            <td><?= htmlspecialchars($item['location']) ?></td>
            <td><?= $item['item_date'] ?></td>
            <td><?= htmlspecialchars($item['contact_name']) ?></td>
            <td><?= htmlspecialchars($item['contact_email']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>
