<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO items (type, category, description, location, item_date, contact_name, contact_email)
                            VALUES (:type, :category, :description, :location, :item_date, :contact_name, :contact_email)");

    $stmt->execute([
        'type'          => $_POST['type'],
        'category'      => $_POST['category'],
        'description'   => $_POST['description'],
        'location'      => $_POST['location'],
        'item_date'     => $_POST['item_date'],
        'contact_name'  => $_POST['contact_name'],
        'contact_email' => $_POST['contact_email'],
    ]);

    header("Location: index.php?success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report Item - Campus Lost & Found</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 300px; padding: 5px; margin-top: 3px; }
        button { margin-top: 15px; padding: 8px 20px; }
    </style>
</head>
<body>

<h1>Campus Lost & Found</h1>

<nav>
    <a href="index.php">Browse Items</a>
    <a href="report.php">Report Item</a>
</nav>

<h2>Report a Lost or Found Item</h2>

<form method="POST">

    <label>Type:
        <select name="type">
            <option value="lost">Lost</option>
            <option value="found">Found</option>
        </select>
    </label>

    <label>Category:
        <select name="category">
            <option value="Phone">Phone</option>
            <option value="Backpack">Backpack</option>
            <option value="Wallet">Wallet</option>
            <option value="Keys">Keys</option>
            <option value="Laptop">Laptop</option>
            <option value="Other">Other</option>
        </select>
    </label>

    <label>Description:
        <textarea name="description" rows="3" required></textarea>
    </label>

    <label>Location:
        <input type="text" name="location" required>
    </label>

    <label>Date:
        <input type="date" name="item_date" required>
    </label>

    <label>Your Name:
        <input type="text" name="contact_name" required>
    </label>

    <label>Your Email:
        <input type="email" name="contact_email" required>
    </label>

    <button type="submit">Submit</button>

</form>

</body>
</html>
